<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\backend\SalaryController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function (){


// Admin Controller
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout','AdminDestroy')->name('admin.logout');
        Route::get('logout','AdminLogoutPage')->name('admin.logout.page');


        Route::get('/admin/profile','AdminProfile')->name('admin.profile');
        Route::post('admin/profile/store','StoreAdminProfile')->name('update.admin.store');

        Route::get('/change/password','ChangePassword')->name('change.password');
        Route::post('/update/password/{id}','UpdatePassword')->name('update.password');
    });

// Employee Controller
    Route::controller(EmployeeController::class)->group(function(){
        Route::get('/all/employee','AllEmployee')->name('all.employee');
        Route::get('/add/employee','AddEmployee')->name('add.employee');
        Route::post('/store/employee','StoreEmployee')->name('employee.store');

        Route::get('/edit/employee/{id}','EditEmployee')->name('employee.edit');
        Route::post('/update/employee/{id}','UpdateEmployee')->name('employee.update');
        Route::get('/delete/employee/{id}','DestroyEmployee')->name('employee.destroy');
    });

// Customer Controller
    Route::controller(CustomerController::class)->group(function(){
        Route::get('/all/customer','AllCustomer')->name('all.customer');
        Route::get('/add/customer','AddCustomer')->name('add.customer');
        Route::post('/store/customer','StoreCustomer')->name('customer.store');

        Route::get('/edit/customer/{id}','EditCustomer')->name('customer.edit');
        Route::post('/update/customer/{id}','UpdateCustomer')->name('customer.update');
        Route::get('/delete/customer/{id}','DestroyCustomer')->name('customer.destroy');
    });




    // Supplier Controller
    Route::controller(SupplierController::class)->group(function(){
        Route::get('/all/supplier','AllSupplier')->name('all.supplier');
        Route::get('/add/supplier','AddSupplier')->name('add.supplier');
        Route::post('/store/supplier','StoreSupplier')->name('supplier.store');

        Route::get('/edit/supplier/{id}','EditSupplier')->name('supplier.edit');
        Route::post('/update/supplier/{id}','UpdateSupplier')->name('supplier.update');
        Route::get('/delete/supplier/{id}','DestroySupplier')->name('supplier.destroy');
        Route::get('/details/supplier/{id}','DetailSupplier')->name('details.supplier');
    });


    // Advance Salary Controller
    Route::controller(SalaryController::class)->group(function(){
        Route::get('/add/advance/salary','AddAdvanceSalary')->name('add.advance.salary');
        Route::post('/advance/salary/store','AdvanceSalaryStore')->name('advance.salary.store');
        Route::get('/all/advance/salary','AllAdvanceSalary')->name('all.advance.salary');

        Route::get('/advance/salary/edit/{id}','AdvanceSalaryEdit')->name('advance.salary.edit');
        Route::post('/advance/salary/update/{id}','AdvanceSalaryUpdate')->name('advance.salary.update');
        Route::get('/advance/salary/delete/{id}','AdvanceSalaryDestroy')->name('advance.salary.delete');
    });




    // Advance Salary Controller
    Route::controller(SalaryController::class)->group(function(){
        Route::get('/pay/salary','PaySalary')->name('pay.salary');
        Route::get('/pay/now/salary/{id}','PayNowSalary')->name('pay.now.salary');
        Route::post('/pay/salary/store/{id}','PaySalaryStore')->name('employee.salary.store');

        Route::get('/month/salary','MonthSalary')->name('month.salary');

        Route::get('/history/salary/{id}','HistorySalary')->name('history.salary');
    });

    // Attendance Controller

    Route::controller(AttendanceController::class)->group(function(){
        Route::get('/employee/attend/list','EmployeeAttendanceList')->name('employee.attend.list');
        Route::get('/add/employee/attend','AddEmployeeAttendance')->name('add.employee.attend');

        Route::post('/store/employee/attend','EmployeeAttendanceStore')->name('employee.attend.store');
        Route::get('/edit/employee/attend/{id}','EditEmployeeAttendance')->name('edit.employee.attend');
        Route::post('/update/employee/attend/{id}','UpdateEmployeeAttendance')->name('update.employee.attend');


        Route::get('/view/employee/attend/{id}','ViewEmployeeAttendance')->name('view.employee.attend');
    });


});



