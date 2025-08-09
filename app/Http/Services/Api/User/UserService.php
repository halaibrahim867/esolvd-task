<?php

namespace App\Http\Services\Api\User;

use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Repository\UserRepositoryInterface;

class UserService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function index()
    {
        if (!auth()->user()->hasRole('manager')) {
            return response()->json([
                'message'=>'you cannot access this page'
            ]);
        }
        $users = $this->userRepository->getAll();
        return response()->json(['users'=>UserResource::collection($users)]);
    }

    public function store($request)
    {

        try {
            if (!auth()->user()->hasRole('manager')) {
                return response()->json([
                    'message'=>'you cannot access this page'
                ]);
            }
            $data = $request->validated();
            if ($request->roles){
                $data->assignRole($request->roles);
            }
            $user = $this->userRepository->create($data);
            return response()->json(['user'=>new UserResource($user)]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return response()->json([
                    'message'=>'you cannot access this page'
                ]);
            }
            $user = $this->userRepository->getById($id);
            return response()->json(['user'=>new UserResource($user)]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function update($request,string $id)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return response()->json([
                    'message'=>'you cannot access this page'
                ]);
            }
            $data = $request->validated();
            $user = $this->userRepository->update($id,$data);
            return response()->json(['message'=>'updated user']);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return response()->json([
                    'message'=>'you cannot access this page'
                ]);
            }
            $this->userRepository->delete($id);
            return response()->json([
                'message' => "User deleted successfully"
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }
    }

}
