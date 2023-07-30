<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SalaryController extends Controller
{
    //
    public function AddAdvanceSalary(){

        $employees = Employee::query()->latest()->get();
        return view('backend.salary.add_advance_salary',compact('employees'));
    }
    public function AdvanceSalaryStore(Request $request){

        $validateData = $request->validate([
            'month'=> 'required',
            'year'=> 'required',
            'advance_salary'=> 'required|max:255',
        ]);
        $month = $request['month'];
        $employee_id = $request['employee_id'];

        $avanced = AdvanceSalary::query()->where('month',$month)->where('employee_id',$employee_id)->first();
        if ($avanced === null){
            $insert_salary = new AdvanceSalary();
            $insert_salary->employee_id =  $request['employee_id'];
            $insert_salary->month =  $request['month'];
            $insert_salary->year =  $request['year'];
            $insert_salary->advance_salary =  $request['advance_salary'];
            $insert_salary->created_at =  Carbon::now();
            $insert_salary->save();
            $notification = array(
                'message' => 'advance Salary paid successfully',
                'alert-type' => 'success'
            );
        }
        else
        $notification = array(
            'message' => 'advance Already paid ',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function AllAdvanceSalary(){
        $salaries = AdvanceSalary::query()->latest()->get();
        return view('backend.salary.all_advance_salary',compact('salaries'));
    }


    public function AdvanceSalaryEdit(string $id){
        $employees = Employee::query()->latest()->get();
        $salary = AdvanceSalary::query()->findOrFail($id);
        return view('backend.salary.edit_advance_salary',compact('salary','employees'));
    }

    public function AdvanceSalaryUpdate(Request $request, string $id){

        $update_advance_salary = AdvanceSalary::query()->findOrFail($id);
        $update_advance_salary->employee_id = $request['employee_id'];
        $update_advance_salary->month = $request['month'];
        $update_advance_salary->year = $request['year'];
        $update_advance_salary->advance_salary = $request['advance_salary'];
        $update_advance_salary->updated_at = Carbon::now();
        $update_advance_salary->save();
        $notification = array(
            'message' => 'advance Salary Updated Successfully ',
            'alert-type' => 'success'
        );
        return to_route('all.advance.salary')->with($notification);

    }

    public function AdvanceSalaryDestroy(string $id){
        $update_advance_salary = AdvanceSalary::query()->findOrFail($id);
        $update_advance_salary->delete();
        $notification = array(
            'message' => 'advance Salary Deleted Successfully ',
            'alert-type' => 'success'
        );
        return to_route('all.advance.salary')->with($notification);
    }
}
