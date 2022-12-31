<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\SentraBibit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = Category::all();
        $sentra_bibit = SentraBibit::all();
        return view('admin.products.create', compact('categories', 'sentra_bibit'));
    }

    public function store(ProductFormRequest $request)
    {
        $validated
    }
}
