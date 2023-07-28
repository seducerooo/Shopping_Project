<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    //
    public function AllCustomer(){
        $allCustomer = Customer::query()->latest()->get();
        return view('backend.customer.all_customer',compact('allCustomer'));
    }
    public function AddCustomer(){
        return view('backend.customer.add_customer',);
    }
    public function StoreCustomer(Request $request){

        $validateData = $request->validate([

            'name' => 'required|max:200|',
            'email' => 'required|max:200|unique:customers',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'shopname' => 'required|max:200',
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
        Image::make($image)->resize(300,300)->save('upload/customer_images/'.$name_gen);
        $save_url = 'upload/customer_images/'.$name_gen;
        $customer = new Customer();
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->phone = $request['phone'];
        $customer->address = $request['address'];
        $customer->shopname = $request['shopname'];
        $customer->account_holder = $request['account_holder'];
        $customer->account_number = $request['account_number'];
        $customer->bank_name = $request['bank_name'];
        $customer->bank_branch = $request['bank_branch'];
        $customer->image = $save_url;
        $customer->city = $request['city'];
        $customer->created_at = Carbon::now();
        $customer->save();
        $notification = array([
            'message' => 'Customer Recorde Stored Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.customer')->with($notification[0]);
    }

    public function EditCustomer(Request $request,string $id){
        $customer = Customer::query()->find($id);
        return view('backend.customer.edit_customer',compact('customer'));
    }


    public function UpdateCustomer(Request $request,string $id){
        $customer_id = $id;
        if ($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/customer_images/'.$name_gen);
            $save_url = 'upload/customer_images/'.$name_gen;

            $customer_update = Customer::query()->find($customer_id);
            $customer_update->name = $request['name'];
            $customer_update->email = $request['email'];
            $customer_update->phone = $request['phone'];
            $customer_update->address = $request['address'];
            $customer_update->shopname = $request['shopname'];
            $customer_update->account_holder = $request['account_holder'];
            $customer_update->account_number = $request['account_number'];
            $customer_update->bank_name = $request['bank_name'];
            $customer_update->bank_branch = $request['bank_branch'];
            @unlink(public_path($customer_update->image));
            $customer_update->image = $save_url;
            $customer_update->save();
            $notification = array([
                'message' => 'Customer Recorde With Image Updated Successfully',
                'alert-type' => 'success'
            ]);
            return to_route('all.customer')->with($notification[0]);
        }
        $customer_update = Customer::query()->find($customer_id);
        $customer_update->name = $request['name'];
        $customer_update->email = $request['email'];
        $customer_update->phone = $request['phone'];
        $customer_update->address = $request['address'];
        $customer_update->shopname = $request['shopname'];
        $customer_update->account_holder = $request['account_holder'];
        $customer_update->account_number = $request['account_number'];
        $customer_update->bank_name = $request['bank_name'];
        $customer_update->bank_branch = $request['bank_branch'];
        $customer_update->city = $request['city'];
        $customer_update->save();
        $notification = array([
            'message' => 'customer Recorde Without Image Updated Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.customer')->with($notification[0]);


    }


    public function DestroyCustomer(string $id){
        $emp_destroy = Customer::query()->find($id);
        @unlink(public_path($emp_destroy->image));
        $emp_destroy->delete();
        $notification = array([
            'message' => 'Customer Recorde Deleted Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.customer')->with($notification[0]);
    }
}
