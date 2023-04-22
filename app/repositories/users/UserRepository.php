<?php

namespace App\repositories\users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function create(FormRequest $request): User {

        return  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function find(String $email): User|null {
        return User::where('email', $email)->first();
    }

}
