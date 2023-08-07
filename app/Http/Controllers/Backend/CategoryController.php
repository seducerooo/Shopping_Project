<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    //
    public function AllCategory(){
        $categories = Category::query()->latest()->get();
        return view( 'backend.category.all_category',compact('categories'));
    }
    public function StoreCategory(Request $request){
        $category = new Category();
        $category->category_name = $request['category_name'];
        $category->created_at = Carbon::now();
        $category->save();
        $notification = array([
            'message' => 'Category Recorde Stored Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.category')->with($notification);
    }
}
