<?php

namespace App\Http\Controllers;

use App\Http\Requests\HealthRequest;
use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healths = Health::all();

        return view('healths.index', compact('healths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthRequest $request)
    {
        $health = Health::create($request->all());

        // return redirect()->route('healths.index');
        return response()->json($health);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HealthRequest $request, $id)
    {
        $health = Health::findOrFail($id);
        $health->update($request->all());

        // return redirect()->route('healths.index');

        return response()->json($health);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $health = Health::findOrFail($id);
        $health->delete();

        return response()->json($health);
    }
}
