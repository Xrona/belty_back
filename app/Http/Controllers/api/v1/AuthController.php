<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use Auth;
use Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends ResponseController
{
    public function register(AuthRequest $request)
    {
        $requestData = $request->validated();

        User::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->sendError(
                'Invalid credentials',
                [],
                Response::HTTP_UNAUTHORIZED,
            );
        }

        $user =  Auth::user();

        return $this->sendResponse($user->createToken('token')->plainTextToken, 'login');
    }

    public function user()
    {
        return Auth::user();
    }


    public function getSession()
    {
        return session()->getId();
    }
}
