<?php

namespace App\services\auth;


use App\repositories\users\UserRepository;
use Illuminate\Foundation\Http\FormRequest;

class RegisterService
{

    public function __construct(private UserRepository $userRepository)
    {
    }

    public function createUser(FormRequest $request) {
        return $this->userRepository->create($request);
    }
}
