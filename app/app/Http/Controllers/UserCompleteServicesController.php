<?php

namespace App\Http\Controllers;

use App\Models\User_complete_services;
use App\Models\Order;
use App\Http\Requests\StoreUser_complete_servicesRequest;
use App\Http\Requests\UpdateUser_complete_servicesRequest;
use Crypt;
class UserCompleteServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUser_complete_servicesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_complete_servicesRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_complete_services  $user_complete_services
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $User_complete_services = User_complete_services::where('user_id',$id)->get();
        return view('admin.user_update_services.create',compact('User_complete_services','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_complete_services  $user_complete_services
     * @return \Illuminate\Http\Response
     */
    public function edit(User_complete_services $user_complete_services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_complete_servicesRequest  $request
     * @param  \App\Models\User_complete_services  $user_complete_services
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_complete_servicesRequest $request)
    {
        $User_complete_services = User_complete_services::findOrFail($request->id);
        $User_complete_services->update([
            'status' => $request->status,
        ]);
        $data = "successfully";
        return response()->json($data); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_complete_services  $user_complete_services
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_complete_services $user_complete_services)
    {
        //
    }
}
