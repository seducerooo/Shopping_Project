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

    public function DestroyCategory(string $id){
        $category_delete = Category::query()->findOrFail($id);
        $category_delete->delete();
        $notification = array([
            'message' => 'Category Recorde Deleted Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.category')->with($notification);
    }


    public function EditCategory(string $id){
        $category = Category::query()->where('id',$id)->get();
        return view('backend.category.edit_category',compact('category'));

    }


    public function UpdateCategory(Request $request,string $id){
        $category_update = Category::query()->where('id',$id);
        $category_update->category_name = $request['category_name'];
        $notification = array([
            'message' => 'Category Recorde Updated Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.category')->with($notification[0]);
    }
}
