<?php

namespace App\Http\Services\Dashboard\User;

use App\Repository\UserRepositoryInterface;

class UserService
{

    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function index()
    {
        $users = $this->userRepository->paginate();
        return view('dashboard.site.user.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.site.user.create');
    }

    public function store($request)
    {
        try {
            $data = $request->validated();
            $this->userRepository->create($data);
            return redirect()->route('users.index')->with(['success'=>'create successfully']);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user=$this->userRepository->getById($id);
        return view('dashboard.site.user.edit',compact('user'));
    }

    public function update($request, $id)
    {
        try {
            $data = $request->validated();
            if ($data['password'] == null) {
                unset($data['password']);
            }
            $this->userRepository->update($id, $data);
            return redirect()->route('users.index')->with(['success'=>'update successfully']);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->userRepository->delete($id);
            return redirect()->route('users.index')->with(['message'=>'user has been deleted successfully']);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
