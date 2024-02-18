<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use App\Models\Employee;

class EmployeeController extends Controller
{
    
    private $rules = [
        "firstName" => "required|min:5|max:20",
        "lastName" => "nullable",
        "email" => "required|email",
        "age" => "required|gt:20",
        "phone" => "required|min:8|max:12|starts_with:08",
        "address" => "required|min:10|max:40",
    ];

    private $customValidationMessage = [
        "required" => "Can't be empty",
        "email" => "Invalid Email",
        "min" => "Must be more than :min characters",
        "max" => "Must be less than :max characters",
        "starts_with" => "Must start with ':values'"
    ];

    private $editUserId;
    
    public function createEmployee(Request $request) 
    {

        /*
        Validator::make() is a method that returns an instance which contains data regarding the validation step, e.g. What fields are correct, what fields are wrong, etc...
        
        When using this instance, we can then call ->fails() with returns a boolean based on whether the validation fails or succeeds.
        */
        $validator = Validator::make($request->all(), $this->rules, $this->customValidationMessage);
        
        if($validator->fails()) {
            
            /*
            1. Redirects the user to a "different" page
            2. Returns to the previous URL (current one)
            3. Contains the error, accessible through {{ $errors }}
            4. Contains the previous input through {{ old_input() }}
            */

            return redirect()->back()->withErrors($validator)->withInput();
            dd($request);
        }


        Employee::create($validator->getData());
        return redirect("/employee");
    }



    public function getAllEmployee() {
        $employees = Employee::all();

        $packagedEmployee = $employees->transform(function($employee) {
            // Remove uneccessary fields
            unset($employee->created_at, $employee->updated_at);

            // Combined firstName and lastName to name
            $employee->name = "$employee->firstName $employee->lastName";

            return $employee;
        });


        return view("employee", ["employees" => $packagedEmployee]);
    }

    public function processEmployeeForm(Request $request) {
        $action = $request->get("action");


        if($action == "delete") {
            return redirect("/delete-employee")->with("id", $request->id);
        }

        if($action == "edit") {
            return redirect("/edit-employee")->with("id", $request->id);
        } 
        

    }

    public function retrieveEmployee(Request $request) {
        $employeeId = $request->only(["id"])["id"] ?? $request->session()->get("id");

        $employee = Employee::where("id", $employeeId)->get();
        


        return view("edit-employee", ["employee" => $employee[0], "employeeId" => $employeeId]);
    }

    public function updateEmployee(Request $request) {

        $validator = Validator::make($request->all(), $this->rules, $this->customValidationMessage);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };
        

        $employee = Employee::findOrFail($request->id);
        $employee->update([
            "firstName" => $request->input("firstName"),
            "lastName" => $request->input("lastName"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "age" => $request->input("age"),
        ]);
        
        return $this->getAllEmployee();
    }

    public function deleteEmployee(Request $request) {
        $userId = $request->session()->get("id");
        
        Employee::destroy($userId);

        return redirect("/employee");
    }
};
