@extends('layouts.base') @section('contents')
<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1 class="display-3 my-5">{{ isset($donation) ? 'Update Donation' : 'Add Donation'}}</h1>
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

            @if(isset($donation))
            <form method="post"
                action="{{ route('donations.update' , ['id'=>$donation->id, 'type'=> $donation->type] )}}">
                @else
                <form method="post" action="{{ route('donations.store', $type)}}">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="type">Donation Type:</label>
                        <input type="text" class="form-control" name="type" readonly
                            value="{{old('type', isset($donation) ? $donation->type : $type)}}" />
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description"
                            value="{{old('description', isset($donation) ? $donation->description : '')}}" />
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input min="1" type="number" class="form-control" name="quantity"
                            value="{{old('quantity', isset($donation) ? $donation->quantity : ' ')}}" />
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($donation) ? 'Update' : 'Add' }}</button>
                </form>
        </div>
    </div>
</div>
@endsection
