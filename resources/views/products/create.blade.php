<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Products</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Add new product</p>
    </div>

    <form class="max-w-2xl mx-auto" action="{{ route('products.store') }}" method="POST">
        @csrf

        {{-- Product Name --}}
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                placeholder="Rubik's Cube" />
            @error('name')
            <div class="mt-2 text-white text-xs p-1.5 rounded-md bg-red-500 dark:bg-red-800">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Price --}}
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                placeholder="19.99" />
            @error('price')
            <div class="mt-2 text-white text-xs p-1.5 rounded-md bg-red-500 dark:bg-red-800">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-5">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea name="description" id="description" rows="4"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                placeholder="Short description...">{{ old('description') }}</textarea>
            @error('description')
            <div class="mt-2 text-white text-xs p-1.5 rounded-md bg-red-500 dark:bg-red-800">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Image URL --}}
        {{-- <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image URL</label>
            <input type="text" name="image" id="image" value="{{ old('image') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                placeholder="https://source.unsplash.com/random/400x300" />
            @error('image')
            <div class="mt-2 text-white text-xs p-1.5 rounded-md bg-red-500 dark:bg-red-800">
                {{ $message }}
            </div>
            @enderror
        </div> --}}

        {{-- Categories --}}
        <div class="mb-5">
            <label for="categories"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($categories->chunk(5) as $categoryChunk)
                    <div>
                        @foreach ($categoryChunk as $category)
                            <label class="flex items-center space-x-2 mb-1">
                                <input
                                    type="checkbox"
                                    name="categories[]"
                                    value="{{ $category->id }}"
                                    @checked(in_array($category->id, old('categories', [])))
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                >
                                <span class="text-sm text-gray-900 dark:text-white">{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                @endforeach
            </div>
            @error('categories')
            <div class="mt-2 text-white text-xs p-1.5 rounded-md bg-red-500 dark:bg-red-800">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create Product
        </button>
    </form>



</x-layouts.app>
