<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        // get all products
        $products = Product::latest()->paginate(10);

        // render view with products
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi Form
        $request->validate([
            'image' => 'required|image|mimes:jpeg, jpg, png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min: 10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName(), 'public');

        // create product
        Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data berhasil disimpan']);
    }

    public function show(string $id): View
    {
        // get product by id
        $product = Product::findOrFail($id);

        // render with view products
        return view('products.show', compact('product'));
    }
}
