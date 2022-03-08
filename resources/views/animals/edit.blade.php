@extends('layouts.base') @section('contents')
<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1 class="display-3 mt-5">Update an Animal</h1>
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
            <form method="post" action="{{ route('animals.update', $animal->id) }}">
                @csrf
                <div class="form-group">
                    <label for="first_name">Pet's Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$animal->name}}" />
                </div>

                <div class="form-group">
                    <label for="last_name">Pet's Gender:</label>
                    <input {{ $animal->gender == "Male" ? 'checked' : '' }}
                    class="ml-3" type="radio" name="gender" value="Male" /> Male
                    <input {{ $animal->gender == "Female" ? 'checked' : '' }}
                    class="ml-3" type="radio" name="gender" value="Female" /> Female
                </div>

                <div class="form-group">
                    <label for="age">Pet's Age:</label>
                    <input min="0" type="number" class="form-control" name="age" value="{{$animal->age}}" />
                </div>
                <div class="form-group">
                    <label for="species">Pet's Species:</label>
                    <select class="form-control" name="species">
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="breed">Pet's Breed:</label>
                    <input type="text" class="form-control" name="breed" value="{{$animal->breed}}" />
                </div>
                <div class="form-group">
                    <label for="for_adoption">For Adoption:</label>
                    <select class="form-control" name="for_adoption">
                        <option selected value="0" {{ $animal->for_adoption == 0 ? 'selected': " "}}>
                            Not Ready for Adoption
                        </option>
                        <option value="1" {{ $animal->for_adoption == 1 ? 'selected': " "}}>Ready for Adoption</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
