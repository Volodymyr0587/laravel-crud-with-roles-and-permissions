<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Gate;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Product::class);

        $searchTerm = $request->query('search');

        $query = Product::with('categories')->searchByNameDescription($searchTerm);

        $products = $query->latest()->paginate(5)->withQueryString();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('viewAny', Product::class);

        $categories = Category::all();

        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        $product->categories()->attach($request->input('categories', []));

        return to_route('products.index')->with('message', "$product->name created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::authorize('viewAny', Product::class);

        $categories = Category::all();

        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        // Sync categories (remove old ones and attach new)
        $product->categories()->sync($request->input('categories', []));

        return to_route('products.show', $product)->with('message', "$product->name updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete', Product::class);

        $product->categories()->detach(); // Detach all categories
        $product->delete();

        return to_route('products.index')->with('message', 'Product deleted successfully.');
    }
}
