<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::find($brand_id);
        if (!$brand) {
            abort(404, 'Brand not found');
        }

        $manuals = Manual::where('brand_id', $brand_id)->get();

        // Get the 5 most popular manuals for this brand
        $popularManuals = Manual::where('brand_id', $brand_id)
                                ->orderBy('views', 'desc')
                                ->take(5)
                                ->get();

        return view('pages.manual_list', [
            'brand' => $brand,
            'manuals' => $manuals,
            'popularManuals' => $popularManuals
        ]);
    }
    public function showBrandsByLetter(string $letter)
    {
        $brands = Brand::where('name', 'LIKE', $letter . '%')->get();
        return view('pages.brands_by_letter', ['brands' => $brands, 'letter' => $letter]);
    }
}