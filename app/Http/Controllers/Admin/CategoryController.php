<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validated = $request->validated();

        $category = new Category();
        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['slug']);
        $category->description = $validated['description'];

        if ($request->hasFile('image')) {
            $category->image = $validated['image'];
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->meta_title = $validated['meta_title'];
        $category->meta_keyword = $validated['meta_keyword'];
        $category->meta_description = $validated['meta_description'];
        $category->status = $request->status == true ? 1 : 0;
        $category->save();

        return redirect('admin/category')->with('message', 'Data kategori berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $validated = $request->validated();

        $category = Category::findOrFail($category);

        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['slug']);
        $category->description = $validated['description'];

        if ($request->hasFile('image')) {
            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $category->image = $validated['image'];
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $validated['meta_title'];
        $category->meta_keyword = $validated['meta_keyword'];
        $category->meta_description = $validated['meta_description'];
        $category->status = $request->status == true ? 1 : 0;
        $category->update();

        return redirect('admin/category')->with('message', 'Data kategori berhasil diupdate');
    }
}
