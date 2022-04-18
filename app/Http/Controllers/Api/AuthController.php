<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $validator = $request->validated();

        /** @var User $user */
        $user = User::whereEmail($validator['email'])->firstOrFail();

        if (!Hash::check($validator['password'], $user->password)) {
            throw new AccessDeniedHttpException();
        }

        $token = Str::random(60);
        $user->setToken($token);

        return response()->json(['token' => $token]);
    }
}
