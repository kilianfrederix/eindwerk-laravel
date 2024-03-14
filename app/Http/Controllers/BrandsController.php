<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function show(Brand $brand) {
        return view('brands.show', ['brand' => $brand]);
    }
}
