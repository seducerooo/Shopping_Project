<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //
    public function AddExpense(){
        return view('backend.expense.add_expense');
    }
    public function StoreExpense(Request $request){
        $expense_store = new Expense();
        $expense_store->details = $request['details'];
        $expense_store->amount = $request['amount'];
        $expense_store->month = $request['month'];
        $expense_store->year = $request['year'];
        $expense_store->date = $request['date'];
        $expense_store->save();
        $notification = array(
            'message' => 'Employee Recorde Stored Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function TodayExpense(){

        $date = date('d-m-Y');
        $today = Expense::query()->where('date',$date)->get();

        return view('backend.expense.today_expense',compact('today'));
    }
    public function EditExpense(string $id){
        $expense = Expense::query()->findOrFail($id);
        return view('backend.expense.edit_expense',compact('expense'));
    }
    public function UpdateExpense(Request $request,string $id){
        $expense_store = Expense::query()->findOrFail($id);
        $expense_store->details = $request['details'];
        $expense_store->amount = $request['amount'];
        $expense_store->month = $request['month'];
        $expense_store->year = $request['year'];
        $expense_store->date = $request['date'];
        $expense_store->save();
        $notification = array(
            'message' => 'Expense Recorde Updated Successfully',
            'alert-type' => 'success'
        );
        return to_route('today.expense')->with($notification);

    }
    public function MonthExpense(){
        $month = date('F');
        $expense = Expense::query()->where('month',$month)->get();

        return view('backend.expense.month_expense',compact('expense'));
    }

    public function YearExpense(){
        $month = date('Y');
        $expense = Expense::query()->where('year',$month)->get();

        return view('backend.expense.year_expense',compact('expense'));
    }
}
