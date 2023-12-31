<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use App\Models\PaySalary;
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
    public function PaySalary(){
        $employees = Employee::query()->latest()->get();
        return view('backend.salary.pay_salary',compact('employees'));
    }
    public function PayNowSalary(string $id){
        $paysalary = Employee::query()->findOrFail($id);
        return view('backend.salary.paid_salary',compact('paysalary'));
    }
    public function PaySalaryStore(Request $request,string $id){

        $paySalary = new PaySalary();
        $paySalary->employee_id = $request['id'];
        $paySalary->salary_month = $request['salary_month'];
        $paySalary->advance_salary = $request['advance_salary'];
        $paySalary->paid_amount = $request['paid_amount'];
        $paySalary->due_salary = $request['due_salary'];
        $paySalary->save();
        $notification = array(
            'message' => 'advance Salary Deleted Successfully ',
            'alert-type' => 'success'
        );
        return to_route('pay.salary')->with($notification);
    }
    public function MonthSalary(){
        $paidSalaries = PaySalary::query()->latest()->get();
        return view('backend.salary.month_salary',compact('paidSalaries'));
    }
    public function HistorySalary(string $id){
        $paysalary = PaySalary::query()->findOrFail($id);
        return view('backend.salary.history_salary',['paysalary' => $paysalary]);
    }
}
