@extends('layouts.base') @section('contents')
<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1 class="display-3 my-5 text-center">{{ isset($rescuers) ? "Update Rescuer's Data" : "Add Rescuer's Data"}}
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
            @if(isset($rescuers))
            <form method="post" action="{{ route('rescuers.update', $rescuers->id) }}">
                @method('PUT')
                @else
                <form method="post" action="{{ route('rescuers.store')}}">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Rescuer's Name:</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', isset($rescuers) ? $rescuers->name : ' ' )}}" />
                    </div>

                    <div class="form-group">
                        <label for="last_name">Gender:</label>
                        <input @if(isset($rescuers)) {{$rescuers->gender== "Male" ? 'checked' : ""}}
                        @endif
                        class="ml-3" type="radio" name="gender" value="Male" /> Male
                        <input @if(isset($rescuers)) {{$rescuers->gender=="Female" ? 'checked' : ""}}
                        @endif
                        class="ml-3" type="radio" name="gender" value="Female" /> Female
                    </div>

                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input min="0" type="number" class="form-control" name="age"
                            value="{{old('age', isset($rescuers) ? $rescuers->age : ' ')}}" />
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address"
                            value="{{old('breed', isset($rescuers) ? $rescuers->address : ' ')}}" />
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($rescuers) ? 'Update' : 'Add' }}</button>
                </form>
        </div>
    </div>
</div>
@endsection