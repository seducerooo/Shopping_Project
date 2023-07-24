<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function AdminDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.logout.page');
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
            $fileExtension = $file->getClientOriginalExtension();
            $file_name = time() . '_' . uniqid() . '.' . $fileExtension;
            $file->move( public_path('upload/admin_images'), $file_name);
            $data->photo = $file_name;
        }

        $data->save();
        return redirect()->back();

    }
}
