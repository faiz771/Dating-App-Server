<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Repositories\Setting;

class PermissionController extends Controller
{
    protected $input,$setting;
    public function __construct(Setting $s, Request $r)
    {
        $this->input    =   $r;
        $this->setting  =   $s;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'permissions'   =>  $this->setting->permissions()
        ];
        return view('admin.permissions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
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
        $id = $this->input->post('id');
        if(!empty($id)){
            $alert = ['success'=>'Permission Updated Successfully'];
        }else{
            $alert = ['success'=>'Permission Inserted Successfully'];
        }
        $data = [
            'name'          =>  $this->input->post('name'),
            'description'   =>  $this->input->post('description')
        ];
        $permission = $this->setting->upsertPermission($data,$id);
        if($permission){
            return redirect(url('/permissions'))->with($alert);
        }else{
            return redirect(url('/permissions'))->with('error','Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission,$val)
    {
        $id =   $this->setting->decrypt($val);
        $data = [
            'row'   =>  $this->setting->getPermRow($id)
        ];
        return view('admin.permissions.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission,$val)
    {
        $id = $this->setting->decrypt($val);
        $this->setting->deletePermission($id);
        return back()->with('delete','Permission Deleted Successully');
    }
}
