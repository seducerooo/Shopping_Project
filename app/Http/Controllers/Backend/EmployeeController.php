<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    //
    public function AllEmployee(){
        $allEmployee = Employee::query()->latest()->get();
        return view('backend.employee.all_employee',compact('allEmployee'));
    }
    public function AddEmployee(){
        return view('backend.employee.add_employee',);
    }
    public function StoreEmployee(Request $request){

        $validateData = $request->validate([

            'name' => 'required|max:200|',
            'email' => 'required|max:200|unique:employees',
            'phone' => 'required|max:200|',
            'address' => 'required|max:400|',
            'salary' => 'required|max:200|',
            'vacation' => 'required|max:200|',
            'experience' => 'required',
            'image' => 'required',
            ],
            [
                'name.required' => 'Please Enter Name Field',
                'email.required' => 'Please Enter Email Field',
                'phone.required' => 'Please Enter Phone Field',
                'address.required' => 'Please Enter Address Field',
                'salary.required' => 'Please Enter Salary Field',
                'vacation.required' => 'Please Enter Vacation Field',
                'experience.required' => 'Please Enter Experience Field',
                'image.required' => 'Please Enter Image Field'
            ]
        );

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/employee_images/'.$name_gen);
        $save_url = 'upload/employee_images/'.$name_gen;
        $employee = new Employee();
        $employee->name = $request['name'];
        $employee->email = $request['email'];
        $employee->phone = $request['phone'];
        $employee->address = $request['address'];
        $employee->experience = $request['experience'];
        $employee->salary = $request['salary'];
        $employee->vacation = $request['vacation'];
        $employee->city = $request['city'];
        $employee->image = $save_url;
        $employee->created_at = Carbon::now();
        $employee->save();
        $notification = array([
            'message' => 'Employee Recorde Stored Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.employee')->with($notification[0]);
    }

    public function EditEmployee(Request $request,string $id){
        $employee = Employee::query()->find($id);
        return view('backend.employee.edit_employee',compact('employee'));
    }


    public function UpdateEmployee(Request $request,string $id){
        $employee_id = $id;
        if ($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/employee_images/'.$name_gen);
            $save_url = 'upload/employee_images/'.$name_gen;

            $emp_update = Employee::query()->find($employee_id);
            $emp_update->name = $request['name'];
            $emp_update->email = $request['email'];
            $emp_update->phone = $request['phone'];
            $emp_update->address = $request['address'];
            $emp_update->experience = $request['experience'];
            $emp_update->salary = $request['salary'];
            $emp_update->vacation = $request['vacation'];
            $emp_update->city = $request['city'];
            @unlink(public_path($emp_update->image));
            $emp_update->image = $save_url;
            $emp_update->save();
            $notification = array([
                'message' => 'Employee Recorde With Image Updated Successfully',
                'alert-type' => 'success'
            ]);
            return to_route('all.employee')->with($notification[0]);
        }
        $emp_update = Employee::query()->find($employee_id);
        $emp_update->name = $request['name'];
        $emp_update->email = $request['email'];
        $emp_update->phone = $request['phone'];
        $emp_update->address = $request['address'];
        $emp_update->experience = $request['experience'];
        $emp_update->salary = $request['salary'];
        $emp_update->vacation = $request['vacation'];
        $emp_update->city = $request['city'];
        $emp_update->save();
        $notification = array([
            'message' => 'Employee Recorde Without Image Updated Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.employee')->with($notification[0]);


    }


    public function DestroyEmployee(string $id){
        $emp_destroy = Employee::query()->find($id);
        @unlink(public_path($emp_destroy->image));
        $emp_destroy->delete();
        $notification = array([
            'message' => 'Employee Recorde Deleted Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('all.employee')->with($notification[0]);
    }
}
