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

        $count_employee = count($request['employee_id']);

        for ($i = 0  ; $i < $count_employee ; $i++){
            $attend_status = 'attend_status'.$i;
            $attendance_store = new Attendance();
            $attendance_store['date'] = date("y-m-d",strtotime($request['date']));
            $attendance_store['employee_id'] = $request['employee_id'][$i];
            $attendance_store['attend_status'] = $attend_status;
            $attendance_store->save();
        }
        $notification = array([
            'message' => 'Employee Attending Recorde Stored Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('employee.attend.list')->with($notification);

    }
}
