<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animal = Animal::all();

        return response()->json($animal, 200);
    }
 
    public function show($id)
    {
        $animal = Animal::find($id);

        return response()->json($animal, 200);
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required|max:6',
            'age' => 'required|max:2|number',
            'gender' => 'required',
            'species' => 'required',
            'breed' => 'required'
        ], [
            'name.required' => 'Name is required',
            'age.required' => 'Age is required',
            'gender.required' => 'Gender is required',
            'species.required' => 'Species is required',
            'breed.required' => 'Breed is required'
        ]);


        $animal = Animal::create($validationData);

        return response()->json($animal, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:6',
            'age' => 'required|max:2',
            'gender' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'for_adoption' => 'required',
        ]);
        
        $animal = Animal::findOrFail($id);
        $animal->update($request->all());

        return response()->json($animal, 200);
    }

    public function delete(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return response()->json(null, 200);
    }
}
