<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;

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

Route::get('/',[EmployeeController::class, "getAllEmployee"] );

Route::get('/employee', [EmployeeController::class, "getAllEmployee"])->name("get_all_employee");

Route::get("/add-employee", function() {
    return view("create-employee");
});

Route::post("/add-employee", [EmployeeController::class, "createEmployee"])->name("create_employee");

Route::get("/edit-employee", [EmployeeController::class, "retrieveEmployee"])->name("edit-employee");

Route::post("/edit-employee", [EmployeeController::class, "updateEmployee"])->name("update-employee");

Route::get("/delete-employee", [EmployeeController::class, "deleteEmployee"])->name("delete-employee");

Route::post("/employee", [EmployeeController::class, "processEmployeeForm"])->name("process-form");