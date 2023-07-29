<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    //
    public function AddAdvanceSalary(){

        $employees = Employee::query()->latest()->get();
        return view('backend.salary.add_advance_salary',compact('employees'));
    }
}
