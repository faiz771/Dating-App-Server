<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use Illuminate\Http\Request;
use App\Repositories\Setting;
use App\Models\User;

class RolePermissionController extends Controller
{
    protected $input, $setting;
    public function __construct(Request $r, Setting $s)
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
            'rows'  =>  $this->setting->role_permissions()
        ];

        // dd($data['rows']);
        return view('admin.role_permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role_permissions.create');
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
            'role_id'               =>  'required',
            'permission_id'       =>  'required'
        ]);
        $alert = [];
        $rp = "";
        $id     =   $this->input->post('id');

        foreach ($this->input->post('permission_id') as $key => $val) {
            $already = RolePermission::where('permission_id', $val)->first();
            if (!empty($already)) {
                return back()->with('error', 'Permission is already given to this role');
            }


            if (!empty($id)) {
                $rp = RolePermission::findOrFail($id);
                $alert = ['success', 'Role Permissions Updated Successfully'];
            } else {
                $rp = new RolePermission;
                $alert = ['success', 'Role Permissions Inserted Successfully'];
            }
            $rp->role_id            =   $this->input->post('role_id');
            $rp->permission_id      =   $val;
            $rp->save();
        }

        return redirect(url('/manage-role-permissions'))->with($alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function show(RolePermission $rolePermission)
    {
        $role_id = $this->input->role_id;
        $data = $this->setting->getPermissionsByRole($role_id);
        $output = "";

        $output .= "<ul>";
        foreach ($data as $key => $value) {
            $output .= "<li>" . $value->permission->name . "</li>";
        }
        $output .= "</ul>";

        return $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function edit(RolePermission $rolePermission, $val)
    {
        $id     =   $this->setting->decrypt($val);
        $data   =   [
            'row'   =>  $this->setting->rprow($id)
        ];
        return view('admin.role_permissions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolePermission $rolePermission)
    {
        $this->input->validate([
            'role_id'               =>  'required',
            'permission_id'         =>  'required'
        ]);

        $role_id            =   $this->input->post('role_id');
        RolePermission::where('role_id', $role_id)->delete();
        $permissions        =   $this->input->post('permission_id');
        foreach ($permissions as $key => $value) {
            $rp                 =   new RolePermission;
            $rp->role_id        =   $role_id;
            $rp->permission_id  =   $value;
            $rp->save();
        }

        return redirect(url('/manage-role-permissions'))->with('success', 'Role Permission Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolePermission $rolePermission, $val)
    {
        $id = $this->setting->decrypt($val);
        $this->setting->deleterp($id);
        return back()->with('delete', 'Role Permission Deleted Successfully');
    }

    public function saveUseTokken(Request $request)
    {
        $user = User::where('id',auth()->user()->id)->first();
        $user->device_token = $request->token;
        $user->save();
        return response()->json(['token saved successfully.']);
    }

    public function testNotif(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = '	AAAAbr2VNIA:APA91bETyQTCHboxkFFveuyAe8j5Xmt9b6PPLkfnkTjY_2PknufzCpWcqfqtACx7VV63mDBf5TdEscPq67N0U6ZOoZYZuyIbZMWEwaAthboW8AAHavawBnqifqNH8kmMhkqs0cPC0ARH';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }
}
