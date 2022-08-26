<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\User\UserRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ResponseTrait;

    public function __construct(private UserRepository $userRepository)
    {
    }

    public function login(): JsonResponse
    {
        request()->merge([$this->username() => request()->input('user_name')]);
        $credentials = request([$this->username(), 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->userRepository->create([
            'user_name' => $request->input('user_name', ''),
            'full_name' => $request->input('full_name', ''),
            'email' => $request->input('email', ''),
            'password' => Hash::make($request->input('password', ''))
        ]);

        return $this->responseSuccess([
            'user' => $user
        ], 'Đăng ký thành công');
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
