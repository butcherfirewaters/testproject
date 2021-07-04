<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /*public function getDepartmentByEmployees(Request $request, $id){
        dd($request);
        $department = Department::where('id', $id)->first();
        return view('employees.departmentIndex', compact('department'));
    }*/
}
