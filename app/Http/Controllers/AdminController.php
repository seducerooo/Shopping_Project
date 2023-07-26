<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function AdminDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array([
            'message' => 'User Logged out Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('admin.logout.page')->with($notification[0]);
    }
    public function AdminLogoutPage(){
        return view('admin.admin_logout');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = User::query()->find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function StoreAdminProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::query()->find($id);
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->phone = $request['phone'];

        if ($request->file('photo')){

            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $fileExtension = $file->getClientOriginalExtension();
            $file_name = time() . '_' . uniqid() . '.' . $fileExtension;
            $file->move( public_path('upload/admin_images'), $file_name);
            $data->photo = $file_name;
        }

        $data->save();

        $notification = array([
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->back()->with($notification[0]);

    }
    public function ChangePassword(){
        $id = Auth::user()->id;
        $adminData = User::query()->find($id);
        return view('admin.change_password',compact('adminData'));
    }

    public function UpdatePassword(Request $request,string $id){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request['old_password'] , auth::user()->password)){

            $notification = array([
                'message' => 'Old Password Doesnt match Successfully !!',
                'alert-type' => 'error'
            ]);

            return back()->with($notification[0]);
        }
        $update = User::query()->find($id);
        $update->password = Hash::make($request['new_password']);
        $update->save();
        $notification = array([
            'message' => 'Password Updated Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('admin.profile')->with($notification[0]);

    }
}
