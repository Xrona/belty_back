<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
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

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            $user->assignRole('user');

            return $this->sendResponse([
                'token' => $user->createToken('token')->plainTextToken,
                'user' => new UserResource($user),
            ], 'registered');
        }
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

        return $this->sendResponse([
            'token' => $user->createToken('token')->plainTextToken,
            'user' => new UserResource($user),
        ], 'login');
    }

    public function user()
    {
        return $this->sendResponse(
            new UserResource(Auth::user()),
            'user',
        );
    }


    public function getSession()
    {
        return session()->getId();
    }

    public function logout()
    {
        Auth::user()->logout();

        return $this->sendResponse('', 'logout');
    }
}
