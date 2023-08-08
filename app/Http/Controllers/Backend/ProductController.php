<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function AllProduct(){

        $product = Product::query()->latest()->get();
        return view('backend.product.all_product',compact('product'));
    }
}
