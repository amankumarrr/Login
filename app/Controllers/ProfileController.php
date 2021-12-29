<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{

    public function profile()
    {
        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
            ];

            if ($this->request->getPost('password') != '') {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }


            if (!$this->validate($rules)) {

                $data['validation'] = $this->validator;
                $validation = $this->validator;
                $err =  $validation->getErrors();
                $errInString = "" . implode(" \n", $err) . "";
                $session = session();
                $updateError = [
                    'User' =>  session()->get('id'),
                    'error' => $errInString
                ];

                log_message('error', 'Wrong Update Attempt by {User} and Error is {error}', $updateError);
            } else {

                $newData = [
                    'id' => session()->get('id'),
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                ];
                if ($this->request->getPost('password') != '') {
                    $newData['password'] = $this->request->getPost('password');
                }
                $model->save($newData);

                session()->setFlashdata('success', 'Successfuly Updated');
                return redirect()->to(base_url() . '/admin/profile');
            }
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();

        return view('pages/profile', $data);
    }
}
