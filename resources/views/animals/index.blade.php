@extends('layouts.base')
@section('contents')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-3">Animal for Laravel 9 REST API CRUD</h1>
        <div class="my-4">
            <a href="{{ route('animals.create') }}" class="btn btn-success">Add Animal</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>Age</td>
                    <td>Breed</td>
                    <td>Species</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($animal as $pet)
                <tr>
                    <td>{{$pet->id}}</td>
                    <td>{{$pet->name}}</td>
                    <td>{{$pet->gender}}</td>
                    <td>{{$pet->age}}</td>
                    <td>{{$pet->breed}}</td>
                    <td>{{$pet->species}}</td>
                    <td>
                        <a href="{{route('animals.edit', $pet->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('animals.destroy', $pet->id)}}" method="post">
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
