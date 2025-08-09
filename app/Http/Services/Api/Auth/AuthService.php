<?php

namespace App\Http\Services\Api\Auth;

use App\Http\Requests\Api\Auth\SignUpRequest;
use App\Http\Resources\User\UserResource;
use App\Repository\UserRepositoryInterface;

class AuthService
{

    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function signUp($request)
    {
        try {
            $data = $request->validated();
            $user=$this->userRepository->create($data);

            $token= $user->createToken('api_token')->plainTextToken;
            return  response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function signIn($request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (auth()->attempt($credentials)) {
                $user = auth()->user();
                $token = $user->createToken('api_token')->plainTextToken;
                return response()->json([
                    'token' => $token,
                    'user' => new UserResource($user)
                ]);
            }
            return response()->json([
                'error' => 'Invalid email or password'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function signOut(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
