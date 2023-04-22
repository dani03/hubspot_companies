<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct(private LoginService $loginService)
    {
    }
    public function __invoke(LoginRequest $request)
    {
        // TODO: Implement __invoke() method.
        $user = $this->loginService->getUserByEmail($request->email);
        if(!$user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['l\'email ou le mot de passe est incorrecte...']
            ]);

        }
        //si tout fonctionne
        $device = substr($request->userAgent() ?? '', 0, 30);
        $expireDate = $request->remenber ? null : now()->addMinutes(config('session.lifetime'));

        return Response()->json([
            'access_token' => $user->createToken($device)->plainTextToken,

        ], Response::HTTP_CREATED);


    }
}
