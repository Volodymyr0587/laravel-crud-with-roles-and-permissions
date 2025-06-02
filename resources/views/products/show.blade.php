<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $product->name }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Product details</p>
    </div>


    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Product Details</h1>
            <a href="{{ route('products.index') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                ← Back to Products
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            @if($product->image)
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
            @else
            <div class="w-full h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400">
                No image
            </div>
            @endif

            <div class="p-6 space-y-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $product->name }}</h2>

                <p class="text-gray-700 dark:text-gray-300 text-lg">
                    <span class="font-medium">Price:</span> ${{ number_format($product->price, 2) }}
                </p>

                <p class="text-gray-700 dark:text-gray-300">
                    <span class="font-medium">Description:</span>
                    {{ $product->description ?? 'No description provided.' }}
                </p>

                <div>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Categories:</span>
                    <div class="mt-1 space-x-2">
                        @forelse ($product->categories as $category)
                        <span
                            class="inline-block bg-gray-200 text-gray-800 text-sm px-2 py-1 rounded dark:bg-gray-700 dark:text-gray-100">
                            {{ $category->name }}
                        </span>
                        @empty
                        <span class="text-sm text-gray-500 dark:text-gray-400">No categories</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
