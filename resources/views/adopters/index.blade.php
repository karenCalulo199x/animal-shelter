@extends('layouts.base')
@section('contents')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-3 text-center">Adopters List</h1>
        <div class="my-4">
            <a href="#" class="btn btn-success" id="btn-add" data-toggle="modal" data-target="#exampleModalCenter">Add
                adopter</a>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="post" id="formId" action="">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Adopter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <div class="form-group">
                                <label for="first_name">Adopter's Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="" />
                            </div>

                            <div class="form-group">
                                <label for="last_name">Gender:</label>
                                <input class="ml-3" type="radio" id="genderMale" name="gender" value="Male" /> Male
                                <input class="ml-3" type="radio" id="genderFemale" name="gender" value="Female" />
                                Female
                            </div>

                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input min="0" type="number" class="form-control" id="age" name="age" value="" />
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="" />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary btn-submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
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
                @foreach($adopters as $adopter)
                <tr>
                    <td>{{$adopter->id}}</td>
                    <td>{{$adopter->name}}</td>
                    <td>{{$adopter->gender}}</td>
                    <td>{{$adopter->age}}</td>
                    <td>{{$adopter->address}}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-edit" data-id="{{ $adopter->id }}"
                            data-name="{{ $adopter->name }}" data-gender="{{ $adopter->gender }}"
                            data-age="{{ $adopter->age }}" data-address="{{ $adopter->address }}" data-toggle="modal"
                            data-target="#exampleModalCenter">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('adopters.destroy', $adopter->id)}}" method="post">
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

@section('js')
<script>
    $('.btn-edit').click(function (e) {

        e.preventDefault();
        $('#exampleModalLongTitle').html("Edit Adopter");

        var id = $(this).data('id');
        var name = $(this).data('name');
        var gender = $(this).data('gender');
        var age = $(this).data('age');
        var address = $(this).data('address');
        console.log(id);

        $('#name').val(name);
        $('#genderMale').prop('checked', gender == 'Male');
        $('#genderFemale').prop('checked', gender == 'Female');
        $('#age').val(age);
        $('#address').val(address);

        var url = '{{ route("adopters.update", ":id")}}';
        url = url.replace(':id', id);
        $('#formId').attr('action', url);
    });

    $('#btn-add').click(function (e) {
        e.preventDefault();
        $('#exampleModalLongTitle').html("Add Adopter");
        $('#name').val('');
        $('#genderMale').prop('checked', false);
        $('#genderFemale').prop('checked', false);
        $('#age').val('');
        $('#address').val('');

        $('#formId').attr('action', "{{route('adopters.store')}}");
    });
</script>
@endsection
