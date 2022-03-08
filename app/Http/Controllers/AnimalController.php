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

        if (request()->ajax()) {
            return response()->json($animal, 200);
        }

        return view('animals.index', compact('animal'));
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
            'age' => 'required|max:16|numeric',
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

        if ($request->ajax()) {
            return response()->json($animal, 200);
        }

        return redirect()->route('animals.index');
    }

    public function create()
    {
        return view('animals.add_edit');
    }

    public function edit($id)
    {
        $animal = Animal::find($id);

        return view('animals.add_edit', compact('animal'));
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

        if ($request->ajax()) {
            return response()->json($animal, 200);
        }

        return redirect()->route('animals.index');
    }

    public function destroy(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        if ($request->ajax()) {
            return response()->json(null, 200);
        }

        return redirect()->route('animals.index');
    }
}
