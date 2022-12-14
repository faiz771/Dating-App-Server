<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Setting;
use App\Repositories\Orders;

class OrderController extends Controller
{
    protected $setting, $input, $order;
    public function __construct(Setting $s, Orders $o, Request $r)
    {
        $this->setting      =   $s;
        $this->input        =   $r;
        $this->order        =   $o;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'orders'    =>  $this->order->all(),
            'status'    =>  ''
        ];

        return view('admin.orders.index', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, $val)
    {
        $id = $this->setting->decrypt($val);
        $data  = [
            'order' =>  $this->order->row($id)
        ];

        return view('admin.orders.edit', $data);
    }

    public function tm_edit(Order $order, $val)
    {
        $id = $this->setting->decrypt($val);
        $data  = [
            'order' =>  $this->order->row($id)
        ];

        return view('admin.orders.TM.edit', $data);
    }

    public function ein_edit(Order $order, $val)
    {
        $id = $this->setting->decrypt($val);
        $data  = [
            'order' =>  $this->order->row($id)
        ];

        return view('admin.orders.EIN.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $array = $this->input->all();
        unset($array['_token']);
        $this->order->upsert($array);

        return redirect(url('/orders'))->with('success','Order updated successfully');

    }

    public function tm_update(Request $request, Order $order)
    {
        $array = $this->input->all();
        unset($array['_token']);
        $this->order->upsert($array);

        return redirect(url('/tm_orders'))->with('success','Order updated successfully');
        
    }

    public function ein_update(Request $request, Order $order)
    {
        $array = $this->input->all();
        unset($array['_token']);
        $this->order->upsert($array);

        return redirect(url('/Ein_orders'))->with('success','Order updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function refund(Request $request)
    {
        
        
        $data = Order::findOrFail($request->order_id);

        $data->update([                                            
            'status' => 'refund',                      
            'refund_desc' => $request->desc,                      
        ]);
        return back()->with('delete','Amount Refund successfully');
    }

    public function refunded(Request $request)
    {
        $data = Order::findOrFail($request->id);

        if(!empty($data->coupon_id)){
              $data['amount'] = $data->before_assign_coupon_amount;
        }else{
              $data['amount'] = $data->amount;
        }
        
        if(!empty($data->refund_desc)){
            $data['desc'] =  "<label for='Description'><b>Description:</b></label>
            <p class='refund_desc'>".$data->refund_desc."</p>";
        }else{
            $data['desc'] =  "<label for='Description'><b>Description: </b> No Description</label>";
        }

        return response()->json($data);
    }

    public function destroy(Order $order,$val)
    {
        $id = $this->setting->decrypt($val);
        $this->order->delete($id);
        return back()->with('delete','Order deleted successfully');
    }

    public function order_filter_byStatus(Request $request)
    {
        if($request->ser == 'TM'){

            if($request->status == 'all'){
                return redirect(url('/tm_orders'));
            }else{
                $orders_fil = Order::where('status',$request->status)->where('service_type',$request->ser)->get();
                $data = [
                    'orders'    =>  $orders_fil,
                    'status'    =>  $request->status,
                    'states'    =>  State::all(),
                    
                ];
                return view('admin.orders.TM.index', $data);
            }

        }elseif($request->ser == 'EIN'){

            if($request->status == 'all'){
                return redirect(url('/Ein_orders'));
            }else{
                $orders_fil = Order::where('status',$request->status)->where('service_type',$request->ser)->get();
                $data = [
                    'orders'    =>  $orders_fil,
                    'status'    =>  $request->status,
                    'states'    =>  State::all(),
                ];
                return view('admin.orders.EIN.index', $data);
            }

        }elseif($request->ser == 'pkg'){
            if($request->status == 'all'){
                return redirect(url('/orders'));
            }else{
                $orders_fil = Order::where('status',$request->status)->get();
                $data = [
                    'orders'    =>  $orders_fil,
                    'status'    =>  $request->status,
                    'states'    =>  State::all(),
                ];
                return view('admin.orders.index', $data);
            }
        }

    }

    public function pending()
    {
        $data = [
            'orders'    =>  $this->order->pending()
        ];

        return view('admin.orders.pending', $data);
    }

    public function running()
    {
        $data = [
            'orders'    =>  $this->order->running()
        ];

        return view('admin.orders.running', $data);
    }


    public function completed()
    {
        $data = [
            'orders'    =>  $this->order->completed(),
            'states'    =>  State::all(),
            'status'    => 'all'
        ];

        return view('admin.orders.completed', $data);
    }

    public function TM_orders()
    {
        $data = [
            'orders'    =>  $this->order->all(),
            'states'    =>  State::all(),
            'status'    => 'all'
        ];

        return view('admin.orders.TM.index', $data);
    }

    public function EIN_orders()
    {
        $data = [
            'orders'    =>  $this->order->all(),
            'states'    =>  State::all(),
            'status'    => 'all'
        ];

        return view('admin.orders.EIN.index', $data);
    }

    public function order_filter_bystate(Request $request)
    {

       if($request->service == 'LLC'){
        if($request->status == 'all'){
             return redirect(url('/orders'));
        }else{

             $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->where('users.f_state','=', $request->status)
            ->select('orders.*')
            ->get();

            $data = [
                'orders'    =>  $orders,
                'states'    =>  State::all(),
                'status'    => $request->status
            ];
              return view('admin.orders.completed', $data);
        }

        }elseif($request->service == 'EIN'){
            
        if($request->status == 'all'){
              return redirect(url('/Ein_orders'));
        }else{

            $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->where('users.f_state','=', $request->status)
            ->select('orders.*')
            ->get();

            $data = [
                'orders'    =>  $orders,
                'states'    =>  State::all(),
                'status'    => $request->status
            ];
            
             return view('admin.orders.EIN.index', $data);
        }
            
        }elseif($request->service == 'TM'){
            
        if($request->status == 'all'){
              return redirect(url('/tm_orders'));
        }else{

            // $fetch_user_by_states = User::where('f_state',$request->status)->get();
           // $orders = '';
          //  foreach($fetch_user_by_states as $fetch_user_by_state){
               // $orders = Order::where('status','completed')->where('user_id',$fetch_user_by_state->id)->get();
           // }
             
             $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->where('users.f_state','=', $request->status)
            ->select('orders.*')
            ->get();
            
            $data = [
                'orders'    =>  $orders,
                'states'    =>  State::all(),
                'status'    => $request->status
            ];
            
             return view('admin.orders.TM.index', $data);
            
        }
        
           
        }

    }

}
