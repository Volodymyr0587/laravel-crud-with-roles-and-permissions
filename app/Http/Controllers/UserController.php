<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
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

        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('manage-users');

        $user->update($request->validated());

        return to_route('users.show', $user)->with('message', "$user->name updated successfully.");
    }
}
