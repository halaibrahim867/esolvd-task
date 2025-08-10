<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Permission\PermissionRequest;
use App\Http\Services\Dashboard\Permission\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct(private PermissionService $permissionService)
    {

    }
    public function index()
    {
        return $this->permissionService->index();
    }

    public function create()
    {
        return $this->permissionService->create();
    }

    public function store(PermissionRequest $request)
    {
        return $this->permissionService->store($request);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        return $this->permissionService->edit($id);
    }

    public function update(PermissionRequest $request, $id)
    {
        return $this->permissionService->update($request,$id);
    }

    public function destroy($id)
    {
        return $this->permissionService->destroy($id);
    }
}
