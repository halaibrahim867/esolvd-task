<?php

namespace App\Http\Services\Role;

use App\Http\Resources\Role\RoleResource;
use App\Repository\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function __construct(private RoleRepositoryInterface $roleRopository)
    {

    }

    public function index()
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return  response()->json([
                    'message'=>'You can not access this page'
                ]);
            }
            $roles=$this->roleRopository->getAll();
            return response()->json([
                'roles'=>RoleResource::collection($roles)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message'=>$exception->getMessage()
            ]);
        }
    }

    public function store($request)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return  response()->json([
                    'message'=>'You can not access this page'
                ]);
            }
            $data=$request->validated();
            $this->roleRopository->create($data);
            return response()->json([
                'message'=>'Role created successfully'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message'=>$exception->getMessage()
            ]);
        }
    }

    public function update($request, $id)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return  response()->json([
                    'message'=>'You can not access this page'
                ]);
            }
            $data=$request->validated();
            $this->roleRopository->update($id,$data);
            return response()->json([
                'message'=>'Role updated successfully'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message'=>$exception->getMessage()
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            if (!auth()->user()->hasRole('manager')) {
                return  response()->json([
                    'message'=>'You can not access this page'
                ]);
            }
            $role=$this->roleRopository->getById($id);

            $role->permissions()->detach();
            $role->delete(); //TODO: roles that created using sanctum auth take sanctum guard and authenticated user's guard is manager and cannot delete role
            return response()->json([
                'message'=>'Role deleted successfully'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message'=>$exception->getMessage()
            ]);
        }
    }
}
