<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function readAll()
    {
        $all = auth()->user()->unreadNotifications;
        foreach($all as $val){
            $val->markAsRead();
        }
        return back();
    }
}
