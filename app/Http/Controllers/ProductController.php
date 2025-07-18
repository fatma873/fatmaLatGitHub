<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10); // 👈 Ganti dari get() ke paginate()
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'        => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'        => 'required|min:5',
            'description'  => 'required|min:10',
            'category_id'  => 'required|exists:categories,id',
            'price'        => 'required|numeric',
            'stock'        => 'required|numeric'
        ]);

        $image = $request->file('image');
        $image->storeAs('products', $image->hashName());

        Product::create([
            'image'        => $image->hashName(),
            'title'        => $request->title,
            'description'  => $request->description,
            'category_id'  => $request->category_id,
            'price'        => $request->price,
            'stock'        => $request->stock
        ]);

        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function view()
    {
        $products = Product::with('category')->latest()->paginate(10);
        $categories = Category::all();

        return view('products.view', compact('products', 'categories'));
    }
    
    public function show(string $id): View
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image'        => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'        => 'required|min:5',
            'description'  => 'required|min:10',
            'category_id'  => 'required|exists:categories,id',
            'price'        => 'required|numeric',
            'stock'        => 'required|numeric'
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('products/' . $product->image);
            $image = $request->file('image');
            $image->storeAs('products', $image->hashName());

            $product->update([
                'image'        => $image->hashName(),
                'title'        => $request->title,
                'description'  => $request->description,
                'category_id'  => $request->category_id,
                'price'        => $request->price,
                'stock'        => $request->stock
            ]);
        } else {
            $product->update([
                'title'        => $request->title,
                'description'  => $request->description,
                'category_id'  => $request->category_id,
                'price'        => $request->price,
                'stock'        => $request->stock
            ]);
        }

        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        Storage::delete('products/' . $product->image);
        $product->delete();

        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}