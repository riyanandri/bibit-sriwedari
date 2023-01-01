<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SentraBibit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $sentra_bibit = SentraBibit::all();
        return view('admin.products.create', compact('categories', 'sentra_bibit'));
    }

    public function store(ProductFormRequest $request)
    {
        $validated = $request->validated();
        $category = Category::findOrFail($validated['category_id']);

        $product = $category->products()->create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['slug']),
            'sentra_bibit' => $validated['sentra_bibit'],
            'description' => $validated['description'],
            'original_price' => $validated['original_price'],
            'selling_price' => $validated['selling_price'],
            'quantity' => $validated['quantity'],
            'trending' => $request->trending == true ? 1 : 0,
            'status' => $request->status == true ? 1 : 0,
            'meta_title' => $validated['meta_title'],
            'meta_keyword' => $validated['meta_keyword'],
            'meta_description' => $validated['meta_description'],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extension;
                $imageFile->move($uploadPath, $filename);
                $savedImage = $uploadPath . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $savedImage,
                ]);
            }
        }

        return redirect('/admin/products')->with('message', 'Data produk berhasil ditambahkan');
    }
}
