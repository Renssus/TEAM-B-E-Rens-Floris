<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id)
    {
        $brand = Brand::find($brand_id);
        if (!$brand) {
            abort(404, 'Brand not found');
        }

        $manual = Manual::find($manual_id);
        if (!$manual) {
            abort(404, 'Manual not found');
        }

        // Increment the views counter
        $manual->increment('views');

        return view('pages.manual_view', [
            'manual' => $manual,
            'brand' => $brand,
        ]);
    }
}