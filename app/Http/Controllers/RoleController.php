<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('admin-access');

        $roles = Role::paginate(5);

        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('admin-access');

        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Gate::authorize('admin-access');

        $role = Role::create($request->validated());

        return to_route('roles.index')->with('message', "$role->name created successfully.");

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        Gate::authorize('admin-access');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('admin-access');

        return view('roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        Gate::authorize('admin-access');

        $role->update($request->validated());

        return to_route('roles.index')->with('message', "$role->name updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Gate::authorize('admin-access');

        $roleName = $role->name;

        $role->users()->detach();

        $role->delete();

        return to_route('roles.index')->with('message', "$roleName deleted successfully.");
    }
}
