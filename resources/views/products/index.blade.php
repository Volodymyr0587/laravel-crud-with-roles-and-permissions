<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Products</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">All available products </p>
    </div>

    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 gap-4">
        <!-- Add New Button -->
        <a href="{{ route('products.create') }}"
            class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition dark:bg-blue-400 dark:hover:bg-blue-500">
            + Add New
        </a>

        <!-- Search Field -->
        <form method="GET" action="{{ route('products.index') }}" class="w-full sm:w-1/3">
            @csrf
            <div class="relative">
                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-200 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Categories</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium dark:text-gray-200">{{ $product->name }}</td>
                    <td class="px-6 py-4 font-medium dark:text-gray-200">${{ number_format($product->price, 2) }}</td>

                    {{-- Show categories --}}
                    <td class="px-6 py-4 font-medium dark:text-gray-200">
                        @forelse ($product->categories as $category)
                        <span
                            class="inline-block bg-gray-200 text-gray-800 text-sm px-2 py-1 rounded mr-1 dark:bg-gray-700 dark:text-gray-100">
                            {{ $category->name }}
                        </span>
                        @empty
                        <span class="text-sm text-gray-500 dark:text-gray-400">No categories</span>
                        @endforelse
                    </td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('products.show', $product) }}"
                            class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">Show</a>
                        <a href="{{ route('products.edit', $product) }}"
                            class="bg-yellow-600 text-white px-5 py-2 rounded-lg hover:bg-yellow-700 transition">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                class="bg-red-600 text-white px-5 py-1.5 rounded-lg hover:bg-red-700 hover:cursor-pointer transition">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="border-t">
                    <td class="px-6 py-4 font-medium dark:text-gray-200">There are no products yet.</td>
                </tr>
                @endforelse

            </tbody>
        </table>

        <div class="m-4 p-2">
            {{ $products->links() }}
        </div>
    </div>

</x-layouts.app>
