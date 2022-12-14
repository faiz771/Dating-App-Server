<?php

namespace App\Libraries;

use App\Models\PackageService;
use App\Models\Service;
use App\Models\Draft;
use App\Models\Expense;
use App\Models\Role;
use App\Models\AddOnsServices;
use App\Models\Permission;
use App\Models\UserRole;
use App\Models\Testimonials;
use App\Models\RolePermission;
use App\Models\Package;
class SF
{
    public static function services($arr)
    {
        $array = json_decode($arr);
        $output = "";
        $data = PackageService::whereIn('id', $array)->get();
        $output .= "<ul>";
        foreach ($data as $val) {
            $output .= "<li>" . $val->name . "</li>";
        }
        $output .= "</ul>";

        return $output;
    }

    public static function Add_onservices($arr)
    {
        if(isset($arr)){
        $array = $arr;
        $output = "";
        $data = AddOnsServices::whereIn('id', $array)->get();
        $output .= "<ul>";
        foreach ($data as $val) {
            $output .= "<li>" . $val->services . "</li>";
        }
        $output .= "</ul>";

        }else{
            $output = '';
        }
        return $output;
    }

    public static function service($id)
    {
        return PackageService::findOrFail($id);
    }

    public static function front_services($type = NULL)
    {
        if ($type == NULL) {
            return Service::latest()->limit(4)->get();
        } else{
            return Service::latest()->where('type', $type)->limit(4)->get();
        }
    }

    public static function setUnique($visit_id)
    {
        // $draft = Draft::first();
        // $draft->visit_id = $visit_id;
        // $draft->save();

        if(!empty($visit_id)){
            $draft = Draft::where('visit_id',$visit_id)->first();

            if(empty($draft)){
                $Draft = new Draft;
                $Draft->visit_id = $visit_id;
                $Draft->save();
            }

        }
    }

    public static function getExpenses($id)
    {
        $total = 0;
        $expenses = Expense::where('pkg_id', $id)->latest()->get();
        // dd($expenses);
        foreach ($expenses as $key => $value) {
            $total += $value->expense;
        }
        return $total;
    }


    public static function getProfitOrLoss($revenue, $expenses)
    {
        $data = [];
        $net = $revenue - $expenses;
        if ($revenue > $expenses) {
            $data['profit']    =   $net;
        } else {
            $data['loss']    =   $net;
        }
        return $data;
    }

    public static function roles()
    {
        return Role::latest()->get();
    }


    public static function permissions()
    {
        return Permission::latest()->get();
    }

    public static function getRole($user_id)
    {
        $output = "";
        $data = UserRole::where('user_id', $user_id)->get();
        $output .= "<ul>";
        
        if($data->IsNotEmpty()){
            foreach ($data as $val) {
                $output .= "<li>" .$val->role->name. "</li>";
            }
        }else{
            $output .= "<li> Customer </li>";
        }
        $output .= "</ul>";
        return $output;
    }

    public static function getRolePermissions($user_id)
    {
        $data = [];
        $permissions = [];
        $userRoles = UserRole::where('user_id', $user_id)->get();
        if (!empty($userRoles)){
            foreach ($userRoles as $key => $val){
                $rolePerms = RolePermission::where('role_id', $val->role_id)->get();
                if (!empty($rolePerms)){ 
                    foreach ($rolePerms as $key => $rp){
                        $perm = strtolower(Permission::where('id', $rp->permission_id)->pluck('name')->first());
                        array_push($permissions, $perm);
                    }
                }
            }
        }

        $data['permissions'] = $permissions;
        return $data;
    }

    public static function getPermission($permission)
    {
        $userRole = UserRole::where('user_id', auth()->user()->id)->get();
        foreach ($userRole as $key => $value){
            $rolePerms = RolePermission::where('role_id', $value->role_id)->get();
            foreach ($rolePerms as $key => $rp) {
                $perm = Permission::where('name', $permission)->first();
                if(!empty($perm))
                {
                    $vvv = RolePermission::where('permission_id', $perm->id)->first();
                    if(!empty($vvv)){
                        return strtolower($perm->name);
                    }
                }
            }
        }
    }


    public static function printPlans($pkg_ids)
    {
      
        $ids    =   json_decode($pkg_ids);
        $data   =   Package::whereIn('id',$ids)->get();
        $output = "";

        $output .= "<ul>";
        foreach ($data as $key => $val) {
            $output .= "<li>".$val->name."</li>";
        }
        $output .= "</ul>";

        return $output;
    }
}
