<?php

namespace App\Http\Controllers;

use App\Models\Rescuer;
use Illuminate\Http\Request;

class RescuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rescuers = Rescuer::all();

        return view('rescuers.index', compact('rescuers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rescuers.add_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Name is required',
            'age.required' => 'Age is required',
            'gender.required' => 'Gender is required',
            'address.required' => 'Address is required'

        ]);

        $recuers = Rescuer::create($validationData);

        return redirect()->route('rescuers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rescuers = Rescuer::findOrFail($id);

        return view('rescuers.add_edit', compact('rescuers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
        ]);

        $rescuers = Rescuer::findOrFail($id);

        $rescuers->update($request->all());

        return redirect()->route('rescuers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rescuers = Rescuer::findOrFail($id);

        $rescuers->delete();

        return redirect()->route('rescuers.index');
    }
}
