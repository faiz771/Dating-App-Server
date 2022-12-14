<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Repositories\Setting;
class ServiceController extends Controller
{
    protected $input,$setting;
    public function __construct(Setting $set, Request $req){
        $this->input        =   $req;
        $this->setting      =   $set;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'services'  =>  $this->setting->services()
        ];
        return view('admin.settings.services.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->input->validate([
            'name'  =>  'required'    
        ]);
        $data = [
            'name'          =>  $this->input->name,
            'type'          =>  $this->input->type,
            'description'   =>  $this->input->description
        ];
        
        $this->setting->storeService($data);
        return redirect(url('/site-services'))->with('success','Service Added Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service,$val)
    {
        $id = $this->setting->decrypt($val);
        $data = [
            'service'   =>  $this->setting->serviceRow($id)    
        ];
        return view('admin.settings.services.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->input->validate([
            'name'  =>  'required'    
        ]);
        $data = [
            'name'          =>  $this->input->name,
            'type'          =>  $this->input->type,
            'description'   =>  $this->input->description
        ];
        
        $this->setting->updateService($data,$this->input->id);
        return redirect(url('/site-services'))->with('success','Service Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $id = $this->setting->decrypt($this->input->id);
        $this->setting->deleteService($id);
        return back()->with('delete','Service Delete Successfully');
    }
}
