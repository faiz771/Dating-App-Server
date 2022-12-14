<?php

namespace App\Libraries;


Class Pickit{
    public static function users(){
        return url('admin/users');
    }

    public static function bookings()
    {
        return url('admin/bookings');
    }

    public static function vehicles()
    {
        return url('admin/vehicles');
    }

    public static function drivers()
    {
        return url('admin/drivers');
    }

    public static function roles()
    {
        return url('admin/roles');
    }

    public static function permissions()
    {
        return url('admin/permissions');
    }

    public static function saveRole()
    {
        return url('admin/save-role');
    }

    public static function addRole()
    {
        return url('admin/add-role');
    }

    public static function editRole($id)
    {
        return url('admin/edit-role/'.$id);
    }

    public static function deleteRole($id)
    {
        return url('admin/delete-role/'.$id);
    }

    public static function updateRole()
    {
        return url('admin/update-role');
    }

    public static function addPermission()
    {
        return url('admin/add-permission');
    }

    public static function savePermission()
    {
        return url('admin/save-permission');
    }

    public static function addUser()
    {
        return url('admin/add-user');
    }

    public function saveUser()
    {
        return url('admin/save-user');
    }
}
