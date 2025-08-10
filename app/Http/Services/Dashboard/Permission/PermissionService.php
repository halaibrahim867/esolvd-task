<?php

namespace App\Http\Services\Dashboard\Permission;

use App\Repository\PermissionRepositoryInterface;

class PermissionService
{
    public function __construct(private PermissionRepositoryInterface $permissionRepository)
    {}

    public function index()
    {
        $permissions = $this->permissionRepository->paginate();
        return view('dashboard.site.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('dashboard.site.permission.create');
    }

    public function store($request)
    {
        try {
            $data = $request->validated();
            $this->permissionRepository->create($data);
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->getById($id);
        return view('dashboard.site.permission.edit', compact('permission'));
    }

    public function update($request, $id)
    {
        try {
            $data = $request->validated();
            $this->permissionRepository->update($id, $data);
            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->permissionRepository->delete($id);
            return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
