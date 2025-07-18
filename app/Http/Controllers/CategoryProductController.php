<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;

class CategoryProductController extends Controller
{
    public function show($id): View
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->latest()->paginate(12);

        return view('category.product', compact('category', 'products'));
    }
}
