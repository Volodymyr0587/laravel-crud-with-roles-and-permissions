<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $user->name }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">User details</p>
    </div>


    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">User Details</h1>
            <a href="{{ route('users.index') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                ← Back to User
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            @if($user->image)
            <img src="{{ $user->image }}" alt="{{ $user->name }}" class="w-full h-64 object-cover">
            @else
            <div class="w-full h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400">
                No image
            </div>
            @endif


            <div class="p-6 space-y-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $user->name }}</h2>

                <p class="text-gray-700 dark:text-gray-300 text-lg">
                    <span class="font-medium">Email:</span> {{ $user->email }}
                </p>

                <div class="flex items-center justify-between">
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-medium">Role:</span>
                        {{  $user->roles->pluck('name')->join(', ') }}
                    </p>
                    <a href="{{ route('users.edit', $user) }}"
                    class="bg-yellow-600 text-white px-5 py-2 rounded-lg hover:bg-yellow-700 transition">Edit</a>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
