<?php

namespace App\Controllers;

use App\Models\UserModel;



class AuthenticationController extends BaseController
{
    public function index()  // Login Page 
    {
        $data = [];
        helper(['form']);

        $session = session();

        if ($this->request->getMethod() == 'post') { // /authenticate 
            //let's do the validation here
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]',
                'password' => 'required|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {

                $data['validation'] = $this->validator;
                $validation = $this->validator;
                $err =  $validation->getErrors();
                $errInString = "" . implode(" \n", $err) . "";

                $wrongAttempt = [
                    'User' => $this->request->getVar('email'),
                    'error' => $errInString
                ];
                log_message('error', 'Wrong Login Attempt by {User} and Error is {error}', $wrongAttempt);
            } else {

                $model = new UserModel();


                $user = $model->where('email', $this->request->getVar('email'))
                    ->orWhere('phone_number', $this->request->getVar('email'))
                    ->first();



                $this->setUserSession($user);

                $loginInfo = [
                    'User' => $user->id,
                    'Customer' => $user->role
                ];

                log_message('info', 'Login by {User} and Role is {Customer}', $loginInfo);


                return redirect()->to(base_url() . '/admin');
            }
        }

        return view('pages/login');
    }

    private function setUserSession($user)
    {

        $data = [
            'id' => $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'role' => $user->role,
            'isLoggedIn' => true,
        ];

        session()->set($data, 30);
        return true;
    }

    public function logout()
    {

        $session = session();
        $id = session()->get('id');
        $logoutInfo = [
            'User' => $id
        ];

        log_message('info', 'Signout by {User}', $logoutInfo);

        session()->destroy();
        return redirect()->to(base_url() . '/');
    }
}
