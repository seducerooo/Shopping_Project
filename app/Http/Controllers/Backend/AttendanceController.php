<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    public function EmployeeAttendanceList(){
        $allData = Attendance::query()->orderBy('id','desc')->get();
        return view('backend.attendance.view_employee_attend',compact('allData'));
    }
    public function AddEmployeeAttendance(){
        $employees = Employee::query()->get()->all();
        return view('backend.attendance.add_employee_attend',compact('employees'));

    }
    public function EmployeeAttendanceStore(Request $request){


        foreach ($request['attend_status'] as $employee_id => $attendance){

            $attendance_store = new Attendance();
            $attendance_store['date'] = date("y-m-d",strtotime($request['date']));
            $attendance_store['employee_id'] = $employee_id;
            $attendance_store['attend_status'] = $attendance;
            $attendance_store->save();
        }
        $notification = array([
            'message' => 'Employee Attending Recorde Stored Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('employee.attend.list')->with($notification);

    }
    public function EditEmployeeAttendance(string $id){

        $employee =  Employee::query()->where('id',$id)->get()->first();
        return view('backend.attendance.edit_employee_attend',compact('employee'));
    }
    public function UpdateEmployeeAttendance(Request $request,string $id){
//dd($request);
        foreach ($request['attend_status'] as  $attendance){

            $attendance_update = Attendance::query()->findOrFail($id);
            $attendance_update['date'] = date('Y-m-d', strtotime($request['date']));
            $attendance_update['attend_status'] = $attendance;
            $attendance_update->save();
        }
        $notification = array([
            'message' => 'Employee Attending Recorde Stored Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('employee.attend.list')->with($notification);
    }


    public function ViewEmployeeAttendance(string $id){

        $allEmployee =  Employee::query()->where('id',$id)->get()->first();
        return view('backend.attendance.details_employee_attend',compact('allEmployee'));

    }








}
