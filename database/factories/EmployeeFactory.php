<?php

namespace Database\Factories;


use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */



    public function definition()
    {
        return [
            'fio' => $this->faker->name(),
            'birthday' => $this->faker->date('Y-m-d'),
            'position' => $this->faker->jobTitle,
            /*type_salary ( 0 or 1 )*/
            /*'hours' => function($attributes){
                if ($attributes['type_salary'] == 0){
                    return 0;
                }
                else {
                    return rand(40, 200);
                }
            },*/
            'salary' => function($attributes){
                if ($attributes['type_salary'] == 0){
                    return rand(5000, 20000);
                }
                else {
                    return $this->howMuchSalary($attributes['hours']);
                }
            },
        ];
    }

    public function howMuchSalary($hours){
        $zpPerHours = rand(200, 300);
        return $hours * $zpPerHours;
    }
}
