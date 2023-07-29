<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    //
    public function AllSupplier(){
        $allSupplier = Supplier::query()->latest()->get();
        return view('backend.supplier.all_supplier',compact('allSupplier'));
    }
    public function AddSupplier(){
        return view('backend.supplier.add_supplier',);
    }
    public function StoreSupplier(Request $request){

        $validateData = $request->validate([

            'name' => 'required|max:200',
            'email' => 'required|max:200|unique:customers',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'shopname' => 'required|max:200',
            'type' => 'required',
            'account_holder' => 'required|max:200',
            'account_number' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'image' => 'required',
        ],
            [
                'name.required' => 'Please Enter Name Field',
                'email.required' => 'Please Enter Email Field',
                'phone.required' => 'Please Enter Phone Field',
                'address.required' => 'Please Enter Address Field',
                'type.required' => 'Please Enter Type Field',
                'shopname.required' => 'Please Enter Shop Name Field',
                'account_holder.required' => 'Please Enter account_holder Field',
                'account_number.required' => 'Please Enter account_number Field',
                'bank_name.required' => 'Please Enter Bank Name Field',
                'bank_branch.required' => 'Please Enter Bank Branch Field',
                'image.required' => 'Please Enter Image Field'
            ]
        );

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/supplier_images/'.$name_gen);
        $save_url = 'upload/supplier_images/'.$name_gen;
        $supplier = new Supplier();
        $supplier->name = $request['name'];
        $supplier->email = $request['email'];
        $supplier->phone = $request['phone'];
        $supplier->address = $request['address'];
        $supplier->shopname = $request['shopname'];
        $supplier->type = $request['type'];
        $supplier->account_holder = $request['account_holder'];
        $supplier->account_number = $request['account_number'];
        $supplier->bank_name = $request['bank_name'];
        $supplier->bank_branch = $request['bank_branch'];
        $supplier->image = $save_url;
        $supplier->city = $request['city'];
        $supplier->created_at = Carbon::now();
        $supplier->save();
        $notification = array([
            'message' => 'Supplier Recorde Stored Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.supplier')->with($notification[0]);
    }

    public function EditSupplier(Request $request,string $id){
        $supplier = Supplier::query()->find($id);
        return view('backend.supplier.edit_supplier',compact('supplier'));
    }


    public function UpdateSupplier(Request $request,string $id){
        $supplier_id = $id;
        if ($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/supplier_images/'.$name_gen);
            $save_url = 'upload/supplier_images/'.$name_gen;

            $supplier_update = Supplier::query()->find($supplier_id);
            $supplier_update->name = $request['name'];
            $supplier_update->email = $request['email'];
            $supplier_update->phone = $request['phone'];
            $supplier_update->address = $request['address'];
            $supplier_update->shopname = $request['shopname'];
            $supplier_update->account_holder = $request['account_holder'];
            $supplier_update->account_number = $request['account_number'];
            $supplier_update->bank_name = $request['bank_name'];
            $supplier_update->bank_branch = $request['bank_branch'];
            @unlink(public_path($supplier_update->image));
            $supplier_update->image = $save_url;
            $supplier_update->save();
            $notification = array([
                'message' => 'Supplier Recorde With Image Updated Successfully',
                'alert-type' => 'success'
            ]);
            return to_route('all.supplier')->with($notification[0]);
        }
        $supplier_update = Supplier::query()->find($supplier_id);
        $supplier_update->name = $request['name'];
        $supplier_update->email = $request['email'];
        $supplier_update->phone = $request['phone'];
        $supplier_update->address = $request['address'];
        $supplier_update->shopname = $request['shopname'];
        $supplier_update->account_holder = $request['account_holder'];
        $supplier_update->account_number = $request['account_number'];
        $supplier_update->bank_name = $request['bank_name'];
        $supplier_update->bank_branch = $request['bank_branch'];
        $supplier_update->city = $request['city'];
        $supplier_update->save();
        $notification = array([
            'message' => 'Supplier Recorde Without Image Updated Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.supplier')->with($notification[0]);


    }


    public function DestroySupplier(string $id){
        $supplier_destroy = Supplier::query()->find($id);
        @unlink(public_path($supplier_destroy->image));
        $supplier_destroy->delete();
        $notification = array([
            'message' => 'Supplier Recorde Deleted Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.supplier')->with($notification[0]);
    }

    public function DetailSupplier(Request $request,string $id){
        $supplier = Supplier::query()->findOrFail($id);
        return view('backend.supplier.details_supplier',compact('supplier'));
    }
}
