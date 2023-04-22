<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\RegisterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService)
    {

    }


    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {

        $user = $this->registerService->createUser($request);
        if (!$user) {
            return Response()->json([
                'data' => [
                    'message' => 'impossible de créer l\'utilisateur'
                ]
            ]);
        }
        //si l'insertion c'est bien passée on envoi un email de verification
        //event(New EmailVerificationEvent($user));

        $device = substr($request->userAgent() ?? '', 0, 255);

        return Response()->json([
            'access_token' => $user->createToken($device)->plainTextToken,
        ], Response::HTTP_CREATED);

    }
}
