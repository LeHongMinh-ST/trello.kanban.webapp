<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(): JsonResponse
    {
        request()->merge([$this->username() => request()->input('user_name')]);
        $credentials = request([$this->username(), 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Đăng xuất thành công']);
    }

    public function me(): JsonResponse
    {
        $user = auth()->user();

        if (empty($user)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        };

        return response()->json($user);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    private function username(): string
    {
        return filter_var(request()->input('user_name'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
    }



}
