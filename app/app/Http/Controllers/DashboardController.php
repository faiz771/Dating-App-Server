<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Repositories\Dashboard;

class DashboardController extends Controller
{
    protected $dashboard,$inputs;
    
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }
   
    public function index()
    {
        $data = [
            'users' =>  $this->dashboard->allUsers(),
            'orderss' =>  Order::latest()->get(),
            'search_status' =>  '',
        ];
        
        return view('admin.index',$data);
    }

    public function searbar_filter_dashboard(Request $request)
    {
        $orders = Order::where('order_id',$request->order_id)->get();
        $data = [
            'users' =>  $this->dashboard->allUsers(),
            'orderss' =>  $orders,
            'search_status' =>  $request->order_id,
        ];
        return view('admin.index',$data);
    }

}
