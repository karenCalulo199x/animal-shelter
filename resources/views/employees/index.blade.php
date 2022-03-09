@extends('layouts.base')
@section('contents')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-3 text-center">Employees List</h1>
        <div class="my-4">
            <a href="{{ route('employees.create')}}" class="btn btn-success">Add Employee</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>Age</td>
                    <td>Address</td>
                    <td>Job Title</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->gender}}</td>
                    <td>{{$employee->age}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->job_title}}</td>
                    <td>
                        <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('employees.destroy', $employee->id)}}" method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
