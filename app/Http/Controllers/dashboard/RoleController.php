<?php

namespace App\Http\Controllers\dashboard;

use App\Events\Backend\Role\RoleDeleted;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Repositories\backend\RoleRepository;
use App\Http\Requests\backend\role\StoreRoleRequest;
use App\Http\Requests\backend\role\UpdateRoleRequest;

class RoleController extends Controller
{
    public $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles.index', compact('roles'));
    }


    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->create($request->only(
            'name'
        ));
        session()->flash('success', __('alerts.backend.roles.created'));
        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        //return show view
        return view('dashboard.roles.show', compact('role'));
    }

    public function edit($id)
    {
       //find role
       $role = Role::findOrFail($id);
       //return edit view
       return view('dashboard.roles.edit', compact('role'));
    }


    public function update(UpdateRoleRequest $request, $id)
    {
        //find role
        $role=Role::where('id',$id)->first();
        //update role
        $this->roleRepository->update($role,$request->only(
            'name'
        ));
        session()->flash('success', __('alerts.backend.roles.updated'));
        return redirect()->route('roles.index');
    }


    public function destroy($id)
    {
         //find role
         $role=Role::findOrFail($id);
         //delete role
         $role->delete();
         //event delete role
         event(new RoleDeleted($role));
         session()->flash('success', __('alerts.backend.roles.deleted'));
         return redirect()->route('roles.index');

    }
}
