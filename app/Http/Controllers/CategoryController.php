<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::all();
    return view('category.index', compact('categories'));
}

public function showProducts($id)   
{
    $category = Category::findOrFail($id);
    $products = $category->products()->latest()->paginate(10); // pastikan relasi sudah ada
    return view('category.products', compact('products', 'category'));
}

public function productView()
{
    $categories = Category::with('products')->get();
    return view('category.product', compact('categories'));
}

}
