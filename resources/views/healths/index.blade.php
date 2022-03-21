@extends('layouts.base')
@section('contents')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-3 text-center">Healths List</h1>
        <div class="my-4">
            <a href="javascript:void(0)" class="btn btn-success" onClick="add()">Add
                health</a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="post" id="formId" action="">
                        @csrf
                        <input type="hidden" name="id" id="id" />
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Add Adopter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <div class="form-group">
                                <label for="type">Heath Type:</label>
                                <select class="form-control" name="type" id="healthType">
                                    <option value="Injury">Injury</option>
                                    <option value="Disease">Disease</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" class="form-control" id="description" name="description" value="" />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="btn-submit" onclick="">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <table class="table table-striped" id="tableID">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Type</td>
                    <td>Description</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($healths as $health)
                <tr>
                    <td>{{$health->id}}</td>
                    <td>{{$health->type}}</td>
                    <td>{{$health->description}}</td>
                    <td>
                        <button class="btn btn-primary" type="submit" id="btn-edit" data-id="{{$health->id}}"
                            data-healthtype="{{$health->type}}" data-desc="{{$health->description}}">Edit</button>
                    </td>
                    <td>
                        <form action="javascript:void(0)" method="post">
                            @csrf
                            <button class="btn btn-danger" id="btn-delete" data-id="{{$health->id}}" type="submit">
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

    var url, action;
    var row;

    function modalShow(title) {
        $('#modalTitle').html(title);
        $('#exampleModalCenter').modal('show');
    };

    //ADD
    function add() {
        $('#formId').trigger("reset");

        modalShow("Add Health Data");
        $('#id').val('');
        url = "{{route('healths.store')}}";
        action = "add";
    }

    //EDIT
    $('body').on('click', '#btn-edit[data-id]', function (e) {
        e.preventDefault();

        modalShow("Edit Health Data");

        var id = $(this).data('id')
        var hType = $(this).data('healthtype');
        var desc = $(this).data('desc');

        $('#id').val(id);
        $("#healthType").val(hType);
        $('#description').val(desc);

        url = '{{ route("healths.update", ":id")}}';
        url = url.replace(':id', id);
        action = "edit";
        row = $(this).closest('tr');
    });

    function addRRow(data) {
        console.log(data);

        $('#tableID tbody').append("<tr><td>" +
            data.id + "</td><td>" +
            data.type + "</td><td>" +
            data.description + "</td><td>" +
            "<input type='button' value='Edit' class='btn btn-primary'id='btn-edit' data-id='" + data.id + "' data-healthType='" + data.type + "' data-desc='" + data.description + "'></td><td>" +
            "<input type='button' value='Delete' class='btn btn-danger' id='btn-delete' data-id='" + data.id + "' ></td>" +
            "</tr>");
    }

    function editRow(data) {

        row.empty();

        row.append("<td>" +
            data.id + "</td><td>" +
            data.type + "</td><td>" +
            data.description + "</td><td>" +
            "<input type='button' value='Edit' class='btn btn-primary' id='btn-edit' data-id='" + data.id + "' data-healthType='" + data.type + "' data-desc='" + data.description + "'></td><td>" +
            "<input type='button' value='Delete' class='btn btn-danger' id='btn-delete' data-id='" + data.id + "' ></td>");
    }

    //SUBMIT ADD&EDIT
    $('#btn-submit').click(function (e) {
        e.preventDefault();

        var id = $('#id').val();

        $("#btn-submit").html('Please Wait...');
        $("#btn-submit").attr("disabled", true);

        // Get form
        var form = $('#formId')[0];
        // FormData object
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $('#exampleModalCenter').modal('hide');
                console.log("SUCCESS : ", data);
                $("#btn-submit").html('Submit');
                $("#btn-submit").attr("disabled", false);

                if (action == 'add') {
                    addRRow(data);
                } else {
                    editRow(data)
                }

            }, error: function (data) {
                console.log(data);
                $("#btn-submit").attr("disabled", false);

            }
        });
    });

    //DELETE
    $('#tableID').on('click', '#btn-delete[data-id]', function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        row = $(this).closest('tr'); // Find the surrounding row
        url = '{{ route("healths.destroy", ":id")}}';
        url = url.replace(':id', id);

        $.ajax({
            type: "POST",
            url: url,
            data: { id: id },
            success: function (data) {
                alert(data.type + ' - ' + data.description + ' has been deleted');
                row.remove();
            }
        });
    });

</script>
@endsection
