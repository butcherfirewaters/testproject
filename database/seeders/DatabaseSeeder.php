<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public $whichDepartment;

    public function run()
    {


        // \App\Models\User::factory(10)->create();
        // Employee::factory(50)->create();
        DB::table('departments')->delete();
        DB::table('employees')->delete();

            Department::factory(10)->create();

            $this->whichDepartment = Department::all()->pluck('id')->toArray();
            //dd($this->whichDepartment);
            foreach ($this->whichDepartment as $department){
                Employee::factory()->count(10)->create([
                    'type_salary' => rand(0,1),
                    'hours' => rand(0, 160),
                    'department_id' => $department
                ]);
            }



    }
}
