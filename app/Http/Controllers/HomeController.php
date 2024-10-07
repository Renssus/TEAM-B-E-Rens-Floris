<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manual;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index()
    {
        // Get the 10 most popular manuals with their associated brands
        $popularManuals = Manual::with('brand')->orderBy('views', 'desc')->take(10)->get();

        // Get all brands
        $brands = Brand::all()->sortBy('name');

        return view('pages.homepage', compact('popularManuals', 'brands'));
    }
}