<?php

namespace App\services\auth;

use App\Repositories\Users\UserRepository;
use Illuminate\Foundation\Http\FormRequest;

class LoginService
{

    public function __construct(private UserRepository $userRepository)
    {

    }

    public function getUserByEmail(String $userEmail){
        return  $this->userRepository->find($userEmail);
    }
}
