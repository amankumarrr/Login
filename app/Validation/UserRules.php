<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRules
{

  public function validateUser(string $str, string $fields, array $data){
    $model = new UserModel();
    $user = $model->where('email', $data['email'])
                  ->orWhere('phone_number', $data['email'])
                  ->where('isLocked','0')
                  ->first();

    if(!$user)
      return false;

    return password_verify($data['password'], $user->password);
  }
}
