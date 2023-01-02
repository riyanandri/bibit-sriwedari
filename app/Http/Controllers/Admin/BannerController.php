<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BannerFormRequest;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banners.index');
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(BannerFormRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/banner/', $filename);
            $validated['image'] = "uploads/banner/$filename";
        }

        $validated['status'] = $request->status == true ? 1 : 0;

        Banner::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $validated['image'],
            'status' => $validated['status'],
        ]);

        return redirect('admin/banners')->with('message', 'Data banner berhasil ditambahkan');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(BannerFormRequest $request, Banner $banner)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {

            $destination = $banner->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/banner/', $filename);
            $validated['image'] = "uploads/banner/$filename";
        }

        $validated['status'] = $request->status == true ? 1 : 0;

        Banner::where('id', $banner->id)->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            // 'image' => $validated['image'],
            'status' => $validated['status'],
        ]);

        return redirect('admin/banners')->with('message', 'Data banner berhasil diupdate');
    }
}
