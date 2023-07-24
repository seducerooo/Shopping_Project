<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function UpdateAdminProfile(){

    }
}
