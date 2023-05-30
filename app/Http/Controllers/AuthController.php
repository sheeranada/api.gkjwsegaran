<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Cookie;

class AuthController extends Controller
{
    private const CREATED = Response::HTTP_CREATED;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials); //generate token if user is found

        if (!$token) throw new AuthenticationException();
        $user = Auth::user();
        return ApiHelper::sendResponse(
            message: "Selamat datang " . $user->name,
            data: $user
        )->withCookie($this->createToken($token));
    }

    public function refresh(): JsonResponse
    {
        return ApiHelper::sendResponse(
            data: Auth::user()
        )->withCookie($this->createToken(Auth::refresh()));
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return ApiHelper::sendResponse(
            status: self::CREATED,
            message: "Berhasil",
            data: $user,
        );
    }

    public function logout(): JsonResponse
    {
        Auth::logout();
        return ApiHelper::sendResponse(message: "Berhasil logout");
    }


    private function createToken(string $value): Cookie
    {
        return cookie(
            name: "token",
            value: $value,
            httpOnly: true
        );
    }
}
