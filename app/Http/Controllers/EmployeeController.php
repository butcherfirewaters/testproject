<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Department $id
     * @return void
     */
    public function index(Request $request, Department $id)
    {
        $showDep = Department::where('id', $id)->first();
        if ($showDep){
            dd($showDep);
        }

        $sortBy = $request->get('sort_by', 'id');
        $orderBy = $request->get('order_by', 'asc');
        $perPage = $request->get('per_page');

        if ($perPage) {
            /*$employees = DB::table('employees')->orderBy($sortBy, $orderBy)->paginate($perPage);*/
            $employees = Employee::query()->with('department')->orderBy($sortBy, $orderBy)->paginate($perPage);
            return view('employees.index', compact('employees'));
        }
        else{
            $employees = Employee::query()->with('department')->take(10)->paginate(10);
            return view('employees.index', compact('employees'));
        }


    }

    /*Не знаю почему, но отдельным методом прописать маршрут было невозможно
        Может баг, может что-то упустил, но очень странно
    */

    /*public function getDepartmentByEmployees(Department $id){
        $department = Department::where('id', $id)->first();
        return view('employees.departmentIndex', compact('department'));
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
