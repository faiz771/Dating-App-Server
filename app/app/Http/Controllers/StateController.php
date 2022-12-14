<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        $n = 1;
        return view('admin.state.index',compact('states','n'));
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
     * @param  \App\Http\Requests\StoreStateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateRequest $request)
    {
        $State = State::create([
            'name' => $request->input('name'),                                              
            'status' => 0,                      
        ]);

        return redirect()->route('state.index')->with('success','State has been Added.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $category = State::findOrFail($request->id);
        $data['cat_name'] = $category->name;
        $data['cat_id'] = $category->id;
        return response()->json($data);  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStateRequest  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = State::findOrFail($request->id);
        $category->update([
            'name' => $request->name,
        ]);

        $data = "successfully";
        return response()->json($data);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($val)
    {
        $State = State::findorFail($val)->delete();
        return back()->with('delete','State deleted successfully');
    }
}
