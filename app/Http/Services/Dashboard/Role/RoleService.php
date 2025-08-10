<?php

namespace App\Http\Services\Dashboard\Role;

use App\Repository\PermissionRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{

    public function __construct(private RoleRepositoryInterface $roleRepository,private PermissionRepositoryInterface $permissionRepository){}

    public function index()
    {
        $roles = $this->roleRepository->paginate(relations: ['permissions']);
        return view('dashboard.site.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions=$this->permissionRepository->getAll();
        return view('dashboard.site.role.create',compact('permissions'));
    }

    public function store($request)
    {
        try {
            $data = $request->except(['permissions']);
            $data['guard_name'] = 'web';
           $role = $this->roleRepository->create($data);

            if (!empty($request['permissions'])) {
                $permissionNames = $this->permissionRepository->getNamesByIds($request['permissions']);

                $role->syncPermissions($permissionNames);
            }
            return redirect()->route('roles.index')->with('success', 'Role created successfully');
        }catch (\Exception $exception){
            return redirect()->route('roles.index')->with('error', $exception->getMessage());
        }
    }

    public function show($id)
    {

    }
    public function edit($id)
    {
        $role=$this->roleRepository->getById($id);
        $permissions=$this->permissionRepository->getAll();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('dashboard.site.role.edit', compact('role','permissions','rolePermissions'));
    }

    public function update($request, $id)
    {
        try {
            $data=$request->except(['permissions']);
            $data['guard_name'] = 'web';
            $role = $this->roleRepository->getById($id);
            $this->roleRepository->update($id, $data);

            if (!empty($request['permissions'])) {
                $permissionNames = $this->permissionRepository->getNamesByIds($request['permissions']);
                $role->syncPermissions($permissionNames);
            } else {
                $role->syncPermissions([]);
            }
            return redirect()->route('roles.index')->with('success', 'Role updated successfully');
        }catch (\Exception $exception){
            return redirect()->route('roles.index')->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
           $this->roleRepository->delete($id);
           return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
        }catch (\Exception $exception){
            dd($exception->getMessage());
            return redirect()->route('roles.index')->with('error', $exception->getMessage());
        }
    }

}
