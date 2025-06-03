<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Users</h1>
        <div class="text-gray-600 dark:text-gray-400 mt-1">
            <p>Edit user <span class="font-bold">{{ $user->name }}</span></p>
            <span>{{ $user->email }}</span>
        </div>
    </div>

    <form class="max-w-2xl mx-auto" action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        {{-- User Roles --}}
        {{-- User Roles --}}
        <div class="mb-5">
            <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>

            @foreach ($roles as $role)
            <div class="flex items-center mb-2">
                <input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{
                    in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}
                class="mr-2">
                <label for="role_{{ $role->id }}" class="text-sm text-gray-900 dark:text-white">
                    {{ ucfirst($role->name) }}
                </label>
            </div>
            @endforeach

            @error('roles')
            <div class="mt-2 text-white text-xs p-1.5 rounded-md bg-red-500 dark:bg-red-800">
                {{ $message }}
            </div>
            @enderror
        </div>


        {{-- Submit Button --}}
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Update User
        </button>
    </form>


</x-layouts.app>
