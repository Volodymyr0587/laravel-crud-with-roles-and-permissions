<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('manage-users');

        $searchTerm = $request->query('search');

        $query = User::searchByNameEmail($searchTerm);

        $users = $query->latest()
                        ->where('id', '!=', auth()->id())
                        ->paginate(5)
                        ->withQueryString();

        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        Gate::authorize('manage-users');

        return view('users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        Gate::authorize('manage-users');

        $roles = Role::all();

        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        Gate::authorize('manage-users');

        $user->roles()->sync($request->roles);

        return to_route('users.show', $user)->with('message', "$user->name updated successfully.");
    }
}
