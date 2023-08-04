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
    public function EditEmployeeAttendance(string $date){
        $employees = Employee::query()->get()->all();
        $editData = Attendance::query()->where('date',$date)->get();
        return view('backend.attendance.edit_employee_attend',compact('employees','editData'));
    }
    public function UpdateEmployeeAttendance(Request $request,string $id){
        $count_employee = count($request['employee_id']);

        for ($i = 0  ; $i < $count_employee ; $i++){
            $attend_status = 'attend_status'.$i;
            $attendance_store = Attendance::query()->findOrFail($id);
            $attendance_store['date'] = date("y-m-d",strtotime($request['date']));
            $attendance_store['employee_id'] = array($request['employee_id'][$i]);
            $attendance_store['attend_status'] = $attend_status[0];
            $attendance_store->save();
        }
        $notification = array([
            'message' => 'Employee Attending Recorde Updated Successfully',
            'alert-type' => 'success'
        ]);
        return to_route('employee.attend.list')->with($notification);


    }

}
