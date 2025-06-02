<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Users</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Edit user <span class="font-bold">{{ $user->name }} {{
                $user->email }}</span></p>
    </div>

    <form class="max-w-2xl mx-auto" action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        {{-- User is_admin --}}
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Admin status</label>

            <div class="flex items-center mb-2">
                <input type="radio" id="admin_yes" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ?
                'checked' : '' }}
                class="mr-2">
                <label for="admin_yes" class="text-sm text-gray-900 dark:text-white">Yes, Admin</label>
            </div>

            <div class="flex items-center">
                <input type="radio" id="admin_no" name="is_admin" value="0" {{ !old('is_admin', $user->is_admin) ?
                'checked' : '' }}
                class="mr-2">
                <label for="admin_no" class="text-sm text-gray-900 dark:text-white">No, Regular User</label>
            </div>
        </div>

        {{-- Submit Button --}}
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Update User
        </button>
    </form>

</x-layouts.app>
