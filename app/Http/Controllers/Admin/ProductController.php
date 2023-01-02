<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SentraBibit;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = Category::all();
        $sentra_bibits = SentraBibit::all();
        return view('admin.products.create', compact('categories', 'sentra_bibits'));
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

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $sentra_bibits = SentraBibit::all();
        $product = Product::findOrFail($product_id);

        return view('admin.products.edit', compact('categories', 'sentra_bibits', 'product'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validated = $request->validated();

        $product = Category::findOrFail($validated['category_id'])->products()->where('id', $product_id)->first();
        if ($product) {
            $product->update([
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

            return redirect('/admin/products')->with('message', 'Data produk berhasil diupdate');
        } else {
            return redirect('/admin/products')->with('message', 'Data produk tidak ditemukan!');
        }
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();

        return redirect()->back()->with('message', 'Gambar produk telah dihapus!');
    }
}
