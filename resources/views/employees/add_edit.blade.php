@extends('layouts.base') @section('contents')
<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1 class="display-3 my-5 text-center">{{ isset($employees) ? "Update Employee's Data" : "Add Employee's Data"}}
        </h1>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            @endif
            @if(isset($employees))
            <form method="post" action="{{ route('employees.update', $employees->id) }}">
                @method('PUT')
                @else
                <form method="post" action="{{ route('employees.store')}}">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Employee's Name:</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', isset($employees) ? $employees->name : ' ' )}}" />
                    </div>

                    <div class="form-group">
                        <label for="last_name">Gender:</label>
                        <input @if(isset($employees)) {{$employees->gender== "Male" ? 'checked' : ""}}
                        @endif
                        class="ml-3" type="radio" name="gender" value="Male" /> Male
                        <input @if(isset($employees)) {{$employees->gender=="Female" ? 'checked' : ""}}
                        @endif
                        class="ml-3" type="radio" name="gender" value="Female" /> Female
                    </div>

                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input min="0" type="number" class="form-control" name="age"
                            value="{{old('age', isset($employees) ? $employees->age : ' ')}}" />
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address"
                            value="{{old('breed', isset($employees) ? $employees->address : ' ')}}" />
                    </div>
                    <div class="form-group">
                        <label for="job">Job Title:</label>
                        <select class="form-control" name="job_title">
                            <option value="Veterenarian" @if(isset($employee)) {{ $employee->job_title=="Veterenarian" ?
                                'selected' :
                                ""}} @endif > Veterenarian
                            </option>
                            <option value="Caretaker" @if(isset($employee)) {{ $employee->job_title=="Caretaker" ?
                                'selected'
                                :
                                ""}}@endif > Caretaker
                            </option>
                            <option value="Receptionist" @if(isset($employee)) {{ $employee->job_title=="Receptionist" ?
                                'selected' :
                                ""}} @endif > Receptionist
                            </option>
                            <option value="Others" @if(isset($employee)) {{ $employee->job_title=="Others" ? 'selected'
                                :
                                ""}}@endif > Others
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($employees) ? 'Update' : 'Add' }}</button>
                </form>
        </div>
    </div>
</div>
@endsection
