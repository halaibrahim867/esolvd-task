<?php

namespace App\Http\Services\Api\Permission;

use App\Http\Resources\Permission\PermissionResource;
use App\Repository\PermissionRepositoryInterface;

class PermissionService
{
    public function __construct(private PermissionRepositoryInterface $permissionRepository){}


    public function index()
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return response()->json([
                    'message'=>'You cannot access this page'
                ]);
            }
            $permissions=$this->permissionRepository->getAll();
            return response()->json([
                'permissions'=>PermissionResource::collection($permissions),
            ]);
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function store($request)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return response()->json([
                    'message'=>'You cannot access this page'
                ]);
            }
            $data=$request->validated();
            $this->permissionRepository->create($data);
            return response()->json([
                'message'=>'Permission added successfully'
            ]);
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return response()->json([
                    'message'=>'You cannot access this page'
                ]);
            }
            $data=$request->validated();
            $this->permissionRepository->update($id,$data);
            return response()->json([
                'message'=>'Permission updated successfully'
            ]);
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return response()->json([
                    'message'=>'You cannot access this page'
                ]);
            }
            $this->permissionRepository->delete($id);
            return response()->json([
                'message'=>'Permission deleted successfully'
            ]);
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }
}
