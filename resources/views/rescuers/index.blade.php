@extends('layouts.base')
@section('contents')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-3 text-center">Rescuers List</h1>
        <div class="my-4">
            <a href="{{ route('rescuers.create') }}" class="btn btn-success">Add Rescuer</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>Age</td>
                    <td>Address</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($rescuers as $rescuer)
                <tr>
                    <td>{{$rescuer->id}}</td>
                    <td>{{$rescuer->name}}</td>
                    <td>{{$rescuer->gender}}</td>
                    <td>{{$rescuer->age}}</td>
                    <td>{{$rescuer->address}}</td>
                    <td>
                        <a href="{{route('rescuers.edit', $rescuer->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('rescuers.destroy', $rescuer->id)}}" method="post">
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