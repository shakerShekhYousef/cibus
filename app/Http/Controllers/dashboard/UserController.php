<?php

namespace App\Http\Controllers\dashboard;

use App\Events\Backend\User\UserDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\user\StoreUserRequest;
use App\Http\Requests\backend\user\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\backend\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create',compact('roles'));
    }


    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'full_name',
            'email',
            'password',
            'mobile',
            'role_id'
        ));
        session()->flash('success', __('alerts.backend.users.created'));
        return redirect()->route('users.index');
    }


    public function show($id)
    {
        //find user
        $user = User::findOrFail($id);
        //return show view
        return view('dashboard.users.show', compact('user'));
    }


    public function edit($id)
    {
        //find user
        $user = User::findOrFail($id);
        //roles
        $roles = Role::all();
        //return edit view
        return view('dashboard.users.edit', compact('user','roles'));
    }


    public function update(UpdateUserRequest $request, $id)
    {
        //find user
        $user=User::where('id',$id)->first();
        //update user
        $this->userRepository->update($user,$request->only(
            'full_name',
            'email',
            'password',
            'mobile',
            'role_id'
        ));
        session()->flash('success', __('alerts.backend.users.updated'));
        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        //find user
        $user=User::findOrFail($id);
        //delete user
        $user->delete();
        //event delete user
        event(new UserDeleted($user));

        session()->flash('success', __('alerts.backend.users.deleted'));
        return redirect()->route('users.index');
    }
}
