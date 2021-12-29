<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Online_CustomerModel;


class Users extends BaseController
{
	public function index()
	{
	}



	public function register()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'phone_number' => 'required|min_length[11]|max_length[11]|is_unique[users.phone_number]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			$errors = [
				'phone_number' => [
					'is_unique' => 'Phone Number Already Exists.',
					'min_length' => 'Phone Number doesn\'t seem legit.'
				],
				'email' => [
					'is_unique' => 'Email Address Already Exists.'
				]
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'phone_number' => $this->request->getVar('phone_number'),
					'password' => $this->request->getVar('password'),
				];
				$randomSixDigitInt = random_int(100000, 999999);
				$newData['code'] = $randomSixDigitInt;
				$newData['attempts_left'] = 3;
				$model->save($newData);

				$EncodedPhoneNumber = substr_replace($newData['phone_number'], "XXXXXX", 3, 6);
				$session = session();

				session()->set($newData, 10);
				$session->setFlashdata('success', 'Enter your verification code that you might have received at ' . $EncodedPhoneNumber . '.');
				$session->setFlashdata('attempts', 'Attempts left: <b>3</b>');
				return redirect()->to(base_url() . '/verification');
			}
		}


		echo view('templates/header', $data);
		echo view('register');
		echo view('templates/footer');
	}

	public function verification()
	{
		$data = [];
		echo view('templates/header', $data);
		echo view('verification');
		echo view('templates/footer');
	}

	public function verify()
	{
		$data = [];
		$model = new UserModel();
		helper(['form']);
		$session = session();
		$attempsCount = session()->get('attempts_left');

		if ($this->request->getMethod() == 'post' && $attempsCount - 1 > 0) {

			$givenCode = $this->request->getVar('code');
			$actualCode = session()->get('code');


			if ($actualCode == $givenCode) {

				$model->set('status', 1)
					->where('email', session()->get('email'))
					->update();

				$session->setFlashdata('success', 'Your account has been verified successfully, Please enter your credentials and Place your first order.');
				return redirect()->to(base_url() . '/login');
			} else {

				$attempsCount--;
				$model->set('attempts_left', $attempsCount)
					->where('email', session()->get('email'))
					->update();
				$_SESSION['attempts_left'] = $attempsCount;

				$EncodedPhoneNumber = substr_replace(session()->get('phone_number'), "XXXXXX", 3, 6);
				$session->setFlashdata('success', 'Enter your verification code that you might have received at ' . $EncodedPhoneNumber . '.');
				$session->setFlashdata('attempts', 'Attempts left: <b>' . session()->get('attempts_left') . '</b>');
				return redirect()->to(base_url() . '/verification');
			}
		} else {
			$model->set('isLocked', 1)
				->where('email', session()->get('email'))
				->update();
			$session->setFlashdata('locked', 'Your account has been locked, Please contact Administration!');
			return redirect()->to(base_url() . '/verification');
		}
	}





	//--------------------------------------------------------------------

}
