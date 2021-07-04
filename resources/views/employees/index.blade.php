<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Employees!</title>
</head>
<body>
<h1 style="text-align: center">Employees!</h1>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="get" action="{{route('employees.index')}}" style="margin: 10px 0">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Выберите количество записей</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="per_page">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                </div>
                <button class="btn btn-info">Выбрать</button>
            </form>
            <div class="contauner"><h2>Вывыдено {{count($employees)}} работников</h2></div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">FIO</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Department_id</th>
                    <th scope="col">Position</th>
                    <th scope="col">Type_salary</th>
                    <th scope="col">Hours</th>
                    <th scope="col">Salary</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                <tr>

                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->fio}}</td>
                    <td>{{$employee->birthday}}</td>
                    <td>{{$employee->department_id}} <br> из Департамента <a href="{{route('show.department', $employee->department_id)}}">
                            {{$employee->department->name}}</a></td>
                    <td>{{$employee->position}}</td>
                    <td>{{$employee->type_salary}}</td>
                    <td>{{$employee->hours}}</td>
                    <td>{{$employee->salary}}</td>
                </tr>
                @endforeach
                </tbody>

            </table>
            {{$employees->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
