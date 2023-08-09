<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //
    public function AllProduct(){

        $product = Product::query()->latest()->get();
        return view('backend.product.all_product',compact('product'));
    }
    public function AddProduct(){
        $category = Category::query()->latest()->get();
        $supplier = Supplier::query()->latest()->get();
        return view('backend.product.add_product',compact('category','supplier'));
    }
    public function StoreProduct(Request $request){
        $request->validate(
            [
                'product_name' => 'required',
                'category_id' => 'required',
                'supplier_id' => 'required',
                'product_code' => 'required',
                'product_image' => 'required',
            ],
            [

                'required.product_name' => 'Please Fill Product Name',
                'required.category_id' => 'Please Fill Category Name',
                'required.supplier_id' => 'Please Fill Supplier Name',
                'required.product_code' => 'Please Fill Product Code',
                'required.product_image' => 'Please Fill Product Image',
            ]
        );



        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/product_images/'.$name_gen);
        $save_url = 'upload/product_images/'.$name_gen;
        $product_recorde = new Product();
        $product_recorde->product_name = $request['product_name'];
        $product_recorde->category_id = $request['category_id'];
        $product_recorde->supplier_id = $request['supplier_id'];
        $product_recorde->product_code = $request['product_code'];
        $product_recorde->product_garage = $request['product_garage'];
        $product_recorde->product_image = $save_url;
        $product_recorde->product_store = $request['product_store'];
        $product_recorde->buying_date = $request['buying_date'];
        $product_recorde->expire_date = $request['expire_date'];
        $product_recorde->buying_price = $request['buying_price'];
        $product_recorde->selling_price = $request['selling_price'];
        $product_recorde->save();
        $notification = array(
            'message' => 'product Recorde Stored Successfully',
            'alert-type' => 'success'
        );
        return to_route('all.product')->with($notification);

    }
    public function EditProduct(string $id){

        $product = product::query()->findOrFail($id);
        $category = Category::query()->latest()->get();
        $supplier = Supplier::query()->latest()->get();
        return view('backend.product.edit_product',compact('category','supplier','product'));
    }
    public function UpdateProduct(Request $request,$id){
        if ($request->file('image')) {
            $image = $request->file('product_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/product_images/' . $name_gen);
            $save_url = 'upload/product_images/' . $name_gen;
            $product_recorde = Product::query()->findOrFail($id);
            $product_recorde->product_name = $request['product_name'];
            $product_recorde->category_id = $request['category_id'];
            $product_recorde->supplier_id = $request['supplier_id'];
            $product_recorde->product_code = $request['product_code'];
            $product_recorde->product_garage = $request['product_garage'];
            @unlink(public_path($product_recorde->product_image));
            $product_recorde->product_image = $save_url;
            $product_recorde->product_store = $request['product_store'];
            $product_recorde->buying_date = $request['buying_date'];
            $product_recorde->expire_date = $request['expire_date'];
            $product_recorde->buying_price = $request['buying_price'];
            $product_recorde->selling_price = $request['selling_price'];
            $product_recorde->save();
            $notification = array(
                'message' => 'Product Recorde Updated Successfully',
                'alert-type' => 'success'
            );
            return to_route('all.product')->with($notification);
        }
        else{

            $product_recorde = Product::query()->findOrFail($id);
            $product_recorde->product_name = $request['product_name'];
            $product_recorde->category_id = $request['category_id'];
            $product_recorde->supplier_id = $request['supplier_id'];
            $product_recorde->product_code = $request['product_code'];
            $product_recorde->product_garage = $request['product_garage'];
            $product_recorde->product_store = $request['product_store'];
            $product_recorde->buying_date = $request['buying_date'];
            $product_recorde->expire_date = $request['expire_date'];
            $product_recorde->buying_price = $request['buying_price'];
            $product_recorde->selling_price = $request['selling_price'];
            $product_recorde->save();
            $notification = array(
                'message' => 'Product Recorde Updated Without Successfully',
                'alert-type' => 'success'
            );
            return to_route('all.product')->with($notification);
        }
    }


    public function DestroyProduct(string $id){
        $product_delete = Product::query()->findOrFail($id);
        $product_delete->delete();
        $notification = array(
            'message' => 'product Recorde Deleted Successfully',
            'alert-type' => 'success'
        );
        return to_route('all.product')->with($notification);
    }
}
