<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\CartProduct;
use Auth;
use Hash;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends ResponseController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);


        if (! $token = auth()->attempt($credentials)) {
            return $this->sendError(
                'Invalid credentials',
                [],
                Response::HTTP_UNAUTHORIZED,
            );
        }

        $user =  Auth::user();

        if ($request->has('session')) {
            $cartProducts = CartProduct::where(['session_id' => $request->input('session')])
                ->whereNull('user_id')
                ->get();

            foreach ($cartProducts as $cartProduct) {
                $cartProduct->update(['user_id' => $user->id]);
            }
        }

        return $this->respondWithToken($token);
    }


    public function register(AuthRequest $request)
    {
        $requestData = $request->validated();

        User::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
        ]);

        if (! $token = auth()->attempt($requestData)) {
            return $this->sendError(
                'Invalid credentials',
                [],
                Response::HTTP_UNAUTHORIZED,
            );
        }

        $user = Auth::user();

//        $user->assignRole('user');

        if ($request->has('session')) {
            $cartProducts = CartProduct::where(['session_id' => $request->input('session')])
                ->andWhereNull('user_id')
                ->get();

            foreach ($cartProducts as $cartProduct) {
                $cartProduct->update(['user_id' => $user->id]);
            }
        }

        return $this->sendResponse([], 'registered');
    }

    public function user(): JsonResponse
    {
        return $this->sendResponse(
            new UserResource(Auth::user()),
            'user',
        );
    }


    public function getSession(): JsonResponse
    {
        $sessionId = session()->getId();

        if($sessionId) {
            return $this->sendResponse(
                $sessionId,
                'sessionId'
            );
        }

        return $this->sendError(
            [],
            'error with get session'
        );
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return $this->sendResponse('', 'logout');
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
