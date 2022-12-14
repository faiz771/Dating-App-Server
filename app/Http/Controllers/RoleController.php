<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\Setting;
class RoleController extends Controller
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
            'roles' =>  $this->setting->getRoles()
        ];
        return view('admin.roles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.add_role');
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
        $alert = [];
        $id     =   $this->input->post('id');
        if(!empty($id)){
            $alert = ['success'=>'Role Updated Successfully'];
        }else{
            $alert = ['success'=>'Role Inserted Successfully'];
        }
        $data   =   [
            'name'          =>  $this->input->post('name'),
            'description'   =>  $this->input->post('description')
        ];

        $role = $this->setting->upsertRole($data,$id);
        if($role){
            return redirect(url('/roles'))->with($alert);
        }else{
            return redirect(url('/roles'))->with('error','Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role,$val)
    {
        $id = $this->setting->decrypt($val);
        $data = [
            'role'  =>  $this->setting->getRole($id)
        ];
        return view('admin.roles.edit_role',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $id = $this->setting->decrypt($this->input->id);
        $this->setting->deleteRole($id);
        return back()->with('delete','Role Deleted Successfully');
    }
}
