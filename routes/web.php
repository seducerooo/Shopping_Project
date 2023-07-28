<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
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

        Route::get('/edit/employee/{id}','editEmployee')->name('employee.edit');
        Route::post('/update/employee/{id}','UpdateEmployee')->name('employee.update');
        Route::get('/delete/employee/{id}','DestroyEmployee')->name('employee.destroy');
    });


});



