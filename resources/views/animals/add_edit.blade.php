@extends('layouts.base') @section('contents')
<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1 class="display-3 my-5">{{ isset($animal) ? 'Update an Animal' : 'Add an Animal'}}</h1>
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

            @if(isset($animal))
            <form method="post" action="{{ route('animals.update', $animal->id) }}">
                @else
                <form method="post" action="{{ route('animals.store')}}">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Pet's Name:</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', isset($animal) ? $animal->name : ' ' )}}" />
                    </div>

                    <div class="form-group">
                        <label for="last_name">Pet's Gender:</label>
                        <input @if(isset($animal)) {{$animal->gender== "Male" ? 'checked' : ""}}
                        @endif
                        class="ml-3" type="radio" name="gender" value="Male" /> Male
                        <input @if(isset($animal)) {{$animal->gender=="Female" ? 'checked' : ""}}
                        @endif
                        class="ml-3" type="radio" name="gender" value="Female" /> Female
                    </div>

                    <div class="form-group">
                        <label for="age">Pet's Age:</label>
                        <input min="0" type="number" class="form-control" name="age"
                            value="{{old('age', isset($animal) ? $animal->age : ' ')}}" />
                    </div>
                    <div class="form-group">
                        <label for="species">Pet's Species:</label>
                        <select class="form-control" name="species">
                            <option value="Dog" @if(isset($animal)) {{ $animal->species=="Dog" ? 'selected' :
                                ""}} @endif > Dog
                            </option>
                            <option value="Cat" @if(isset($animal)) {{ $animal->species=="Cat" ? 'selected' :
                                ""}}@endif > Cat
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="breed">Pet's Breed:</label>
                        <input type="text" class="form-control" name="breed"
                            value="{{old('breed', isset($animal) ? $animal->breed : ' ')}}" />
                    </div>
                    <div class="form-group">
                        <label for="for_adoption">For Adoption:</label>
                        <select class="form-control" name="for_adoption">
                            <option selected value="0" @if(isset($animal)) {{ $animal->for_adoption == 0 ? 'selected' :
                                ""}}
                                @endif
                                >
                                Not Ready for Adoption
                            </option>
                            <option value="1" @if(isset($animal)) {{ $animal->for_adoption == 1 ? 'selected' : ""}}
                                @endif
                                >
                                Ready for Adoption
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($animal) ? 'Update' : 'Add' }}</button>
                </form>
        </div>
    </div>
</div>
@endsection