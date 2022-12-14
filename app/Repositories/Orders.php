<?php

namespace App\Repositories;
use App\Models\Order;
use App\Models\User;

class Orders{
    public function all()
    {
        return Order::latest()->get();
    }

    public function pending()
    {
        return Order::where('status','pending')->latest()->get();
    }

    public function completed()
    {
        return Order::where('status','completed')->latest()->get();
    }

    public function running()
    {
        return Order::where('status','running')->latest()->get();
    }

    public function upsert($array)
    {
        // dd($array);
        $id             =   $array['id'];
        $arr            =   array_keys($array);
        $order          =   NULL;
        if($id != 0 || $id != NULL || !empty($id) || $id != ""){
            $order        =   Order::findOrFail($id);
        }else{
            $order        =   new Order;
        }
        foreach($arr as $key => $val){
            $order->$val = $array[$val];
        }
        $order->save();
        return true;
    }


    public function row($id)
    {
        return Order::findOrFail($id);
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return true;
    }
}

?>
