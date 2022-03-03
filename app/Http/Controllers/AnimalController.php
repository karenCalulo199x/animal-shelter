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
        $animal = Animal::create($request->all());
        return response()->json($animal, 200);
    }

    public function update(Request $request, $id)
    {
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
