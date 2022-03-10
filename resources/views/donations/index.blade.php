@extends('layouts.base')
@section('contents')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-3 text-center">{{$type}} Donations List</h1>
        <div class="my-4">
            <a href="{{route('donations.create', $type)}}" class="btn btn-success">Add Donation</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Donation Type</td>
                    <td>Description</td>
                    <td>Quantity</td>
                    <td>Date</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donation)
                <tr>
                    <td>{{$donation->id}}</td>
                    <td>{{$donation->type}}</td>
                    <td>{{$donation->description}}</td>
                    <td>{{$donation->quantity}}</td>
                    <td>{{$donation->created_at}}</td>
                    <td>
                        <a href="{{route('donations.edit', ['id'=>$donation->id, 'type'=> $donation->type])}}"
                            class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('donations.destroy', ['id'=>$donation->id, 'type'=> $donation->type])}}"
                            method="post">
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
