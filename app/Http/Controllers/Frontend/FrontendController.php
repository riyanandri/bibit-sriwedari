<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // $banners = Banner::where('status', '0')->get();
        // $categories = Category::where('status', '0')->get();
        return view('client.index');
    }
}
