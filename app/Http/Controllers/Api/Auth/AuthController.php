<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\SignInRequest;
use App\Http\Requests\Api\Auth\SignUpRequest;
use App\Http\Services\Api\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {

    }

    public function signUp(SignUpRequest $request)
    {
        return $this->authService->signUp($request);
    }

    public function signIn(SignInRequest $request)
    {
        return $this->authService->signIn($request);
    }

    public function signOut()
    {
        return $this->authService->signOut();
    }
}
