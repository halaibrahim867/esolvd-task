<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\Role\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(private RoleService $roleService)
    {

    }

    public function index()
    {
        return $this->roleService->index();
    }

    public function create()
    {
        return $this->roleService->create();
    }

    public function store(Request $request)
    {
        return $this->roleService->store($request);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        return $this->roleService->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->roleService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->roleService->destroy($id);
    }
}
