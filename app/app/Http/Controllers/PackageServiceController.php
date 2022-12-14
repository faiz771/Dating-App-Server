<?php

namespace App\Http\Controllers;

use App\Models\PackageService;
use Illuminate\Http\Request;
use App\Repositories\Services;
class PackageServiceController extends Controller
{
    protected $service,$input,$mainPage;
    public function __construct(Services $service,Request $request)
    {
        $this->service  =   $service;
        $this->input    =   $request;
        $this->mainPage =   url('/services-of-packages');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'services'  =>  $this->service->all()
        ];
        return view('admin.services.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  =>  'required'
        ]);

        $service                =   new PackageService;
        $service->name          =   $this->input->name;
        $service->description   =   $this->input->description;
        $service->save();
        return redirect($this->mainPage)->with('success','Service Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageService  $packageService
     * @return \Illuminate\Http\Response
     */
    public function show(PackageService $packageService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageService  $packageService
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageService $packageService,$val)
    {
        $id = $this->service->decryptId($val);
        $data = [
            'service'   =>  $this->service->edit($id)
        ];

        return view('admin.services.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageService  $packageService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageService $packageService)
    {
        $request->validate([
            'name'  =>  'required'
        ]);

        $service                =   PackageService::findOrFail($this->input->id);
        $service->name          =   $this->input->name;
        $service->description   =   $this->input->description;
        $service->save();
        return redirect($this->mainPage)->with('success','Service Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageService  $packageService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageService $packageService,$val)
    {
        $id = $this->service->decryptId($val);
        $delete = $this->service->delete($id);
        $delete->delete();
        return back()->with('delete','Service Deleted Successfully');
    }
}
