@extends('layouts.app',['title' => 'Admin Dashboard','cat_name'=>'dashboard','page_name'=>'dashboard'])
@section('content')

<style>
.footer-wrapper {
    display: none !important;
    padding: 10px 20px 10px 20px;
    display: inline-block;
    background: transparent;
    font-weight: 600;
    font-size: 12px;
    width: 100%;
    border-top-left-radius: 6px;
    display: flex;
    justify-content: space-between;
}

.component-card_1 {
    border: 1px solid #e0e6ed;
    border-radius: 6px;
    width: 21rem;
    margin: 0 auto;
    box-shadow: 4px 6px 10px -3px #bfc9d4;
}

.component-card_1 .icon-svg {
    margin-bottom: 20px;
    display: inline-block;
    background: #3b3f5c;
    padding: 12px;
    border-radius: 50%;
    color: #f1f2f3;
}
.component-card_1 .card-body {
    padding: 28px 25px;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}

/*  */

.text-primary-color {
    color: #2196F3;
}

.label-success {
    background-color: #4CAF50;
}

.text-success-color {
    color: #4CAF50;
}
.badge-success, .label-success {
    background-color: #4CAF50;
}

.text-danger-color {
    color: #ed0f0f;
}

.text-gray-color {
    color: #159581;
}

.label-gray {
    background-color: #159581;
}

.label-danger {
    background-color: #ed0f0f;
}

.dashboard-product {
    background-color: #fff;
    color: #777;
    padding: 15px;
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0 0px 8px 0 rgb(0 0 0 / 6%), 0 1px 0px 0 rgb(0 0 0 / 2%);
    box-shadow: 0 0px 8px 0 rgb(0 0 0 / 6%), 0 1px 0px 0 rgb(0 0 0 / 2%);
}
.dashboard-total-products {
    font-weight: 600;
    margin-top: 10px;
    margin-bottom: 10px;
}
.badge-primary, .label-primary {
    background-color: #2196F3;
}

.side-box {
    position: absolute;
    right: 0;
    top: 0;
    height: 50px;
    width: 60px;
    color: #fff;
    font-size: 26px;
    border-radius: 0 0 0 100px;
    text-align: center;
}
.side-box i {
    position: relative;
    top: 10px;
    left: 5px;
}

.label {
    display: inline;
    padding: 2px 7px;
    font-weight: 700;
    line-height: 1.1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25em;
    margin-right: 200px;
}

.label-secondary {
    background-color: #290188;
}

.text-gray-secondary{
    color: #290188;
}

/* order detail css  */

.widget-four {
    position: relative;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    height: auto;
    border: 1px solid #e0e6ed;
    box-shadow: 0 0 40px 0 rgb(94 92 154 / 6%);
}
.widget-four .widget-heading {
    margin-bottom: 25px;
}
.widget-four .widget-heading h5 {
    font-size: 17px;
    display: block;
    color: #0e1726;
    font-weight: 600;
    margin-bottom: 0;
}
.widget-four .widget-content {
    font-size: 17px;
}

.widget-four .widget-content .browser-list:not(:last-child) {
    margin-bottom: 30px;
}
.widget-four .widget-content .browser-list {
    display: flex;
}
.widget-four .widget-content .browser-list:nth-child(1) .w-icon {
    background: #eaf1ff;
}
.widget-four .widget-content .w-icon {
    display: inline-block;
    padding: 10px 9px;
    border-radius: 50%;
    display: inline-flex;
    align-self: center;
    height: 34px;
    width: 34px;
    margin-right: 12px;
}
.widget-four .widget-content .browser-list:nth-child(1) .w-icon svg {
    color: #4361ee;
}

.widget-four .widget-content .w-icon svg {
    display: block;
    width: 15px;
    height: 15px;
}
.widget-four .widget-content .w-browser-details {
    width: 100%;
    align-self: center;
}
.widget-four .widget-content .w-browser-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1px;
}
.widget-four .widget-content .w-browser-info h6 {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 0;
    color: #888ea8;
}
.widget-four .widget-content .w-browser-info p {
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 0;
    color: #888ea8;
}
.widget-four .widget-content .w-browser-stats .progress {
    margin-bottom: 0;
    height: 22px;
    padding: 4px;
    border-radius: 20px;
    box-shadow: 0 2px 2px rgb(224 230 237 / 46%), 1px 6px 7px rgb(224 230 237 / 46%);
}

.progress {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    background-color: #ebedf2;
    margin-bottom: 1.25rem;
    height: 16px;
    box-shadow: 1px 3px 20px 3px #f1f2f3;
}
.progress {
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    line-height: 0;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: 0.25rem;
}

.widget-four .widget-content .w-browser-stats .progress .progress-bar {
    position: relative;
}

.progress .progress-bar.bg-gradient-primary {
    background-color: #2a2a72;
    background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
}
.progress .progress-bar.bg-gradient-primary {
    background-color: #4361ee;
    background: linear-gradient(to right, #0081ff 0%, #0045ff 100%);
}
.progress:not(.progress-bar-stack) .progress-bar {
    border-radius: 16px;
}
.progress .progress-bar {
    font-size: 10px;
    font-weight: 700;
    box-shadow: 0 2px 4px rgb(0 69 255 / 15%), 0 8px 16px rgb(0 69 255 / 20%);
    font-size: 12px;
    letter-spacing: 1px;
    font-weight: 100;
}
.progress-bar {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-pack: center;
    justify-content: center;
    overflow: hidden;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    background-color: #007bff;
    transition: width .6s ease;
}
*, ::after, ::before {
    box-sizing: border-box;
}

.widget-four .widget-content .w-browser-stats .progress .progress-bar:before {
    content: '';
    height: 7px;
    width: 7px;
    background: #fff;
    position: absolute;
    right: 3px;
    border-radius: 50%;
    top: 3.4px;
}
.progress .progress-bar.bg-gradient-primary {
    background-color: #2a2a72 !important;
    background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%) !important;
}
.widget-four .widget-content .browser-list:nth-child(2) .w-icon {
    background: #fff5f5;
}
.widget-four .widget-content .w-icon {
    display: inline-block;
    padding: 10px 9px;
    border-radius: 50%;
    display: inline-flex;
    align-self: center;
    height: 34px;
    width: 34px;
    margin-right: 12px;
}
.widget-four .widget-content .browser-list:nth-child(2) .w-icon svg {
    color: #e7515a;
}

.widget-four .widget-content .w-icon svg {
    display: block;
    width: 15px;
    height: 15px;
}

.widget-four .widget-content .w-browser-stats .progress .progress-bar {
    position: relative;
}
.progress .progress-bar.bg-gradient-danger {
    background-image: linear-gradient(315deg, #3f0d12 0%, #a71d31 74%) !important;
}
.progress .progress-bar.bg-gradient-danger {
    background-color: #4361ee;
    background-image: linear-gradient(to right, #d09693 0%, #c71d6f 100%) ;
}

.widget-four .widget-content .w-browser-stats .progress .progress-bar:before {
    content: '';
    height: 7px;
    width: 7px;
    background: #fff;
    position: absolute;
    right: 3px;
    border-radius: 50%;
    top: 3.4px;
}
*, ::after, ::before {
    box-sizing: border-box;
}

.widget-four .widget-content .browser-list:nth-child(3) .w-icon {
    background: #fff9ed;
}

.widget-four .widget-content .w-icon {
    display: inline-block;
    padding: 10px 9px;
    border-radius: 50%;
    display: inline-flex;
    align-self: center;
    height: 34px;
    width: 34px;
    margin-right: 12px;
}

.widget-four .widget-content .browser-list:nth-child(3) .w-icon svg {
    color: #e2a03f;
}

.widget-four .widget-content .w-icon svg {
    display: block;
    width: 15px;
    height: 15px;
}
.progress .progress-bar.bg-gradient-warning {
    background-color: #fc9842 !important;
    background-image: linear-gradient(315deg, #fc9842 0%, #fe5f75 74%) !important;
}

.progress .progress-bar.bg-gradient-warning {
    background-color: #4361ee;
    background-image: linear-gradient(to right, #f09819 0%, #ff5858 100%);
}

/* data table display none css */

div.dataTables_wrapper div.dataTables_info {
    padding-top: 0.85em;
    white-space: normal;
    color: #4361ee;
    font-weight: 600;
    border: 1px solid #e0e6ed;
    display: none;
    padding: 10px 16px;
    border-radius: 6px;
    font-size: 13px;
}
div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    margin: 3px 0;
    flex-wrap: wrap;
    display: none;
}
div.dataTables_wrapper div.dataTables_length label {
    font-size: 13px;
    margin-bottom: 0;
    display: none;
}

</style>

@php 


@endphp

<div class="row layout-top-spacing">
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="row pl-3 pr-3">
@php 
    $UserRole = App\Models\UserRole::where('user_id',auth()->user()->id)->first(); 
@endphp

    @if(auth()->user()->id == 1)

        @php 
            $visitors = App\Models\Statistic::all(); 
            $customers = App\Models\User::where('userType','customer/user')->where('approved',1)->get(); 
            $customers_approval_request = App\Models\User::where('userType','customer/user')->where('approved',0)->get(); 
            $complete_orders = App\Models\Order::where('status','completed')->get(); 

            $pending_orders = App\Models\Order::where('status','pending')->get(); 
            $running_orders = App\Models\Order::where('status','running')->get(); 
            $refund_orders = App\Models\Order::where('status','refund')->get(); 
            $orders = App\Models\Order::latest()->get();
            $n = 1; 

            $pending_per = (count($pending_orders) / 100) * count($orders);
            $running_per = (count($running_orders) / 100) * count($orders);
            $refund_per = (count($refund_orders) / 100) * count($orders);
           
        @endphp

        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-product">
               <h4><b class="text-primary-color">Total Artist</b></h4>
                    <h2 class="dashboard-total-products"><span>@if(!empty($visitors)) {{count($visitors)}} @else 0  @endif</span></h2>
                  <span class="label label-primary">Visitors</span>
                <div class="side-box">
                    <i class="fa fa-users text-primary-color" aria-hidden="true"></i>
                </div>
            </div>
         </div>

         <div class="col-lg-4 col-md-6">
            <div class="card dashboard-product">
               <h4><b class="text-gray-color">Total Songs</b></h4>
                    <h2 class="dashboard-total-products"><span>@if(!empty($customers)) {{count($customers)}} @else 0  @endif</span></h2>
                  <span class="label label-gray">Customers</span>
                <div class="side-box">
                    <i class=" text-gray-color fa fa-male" aria-hidden="true"></i>
                </div>
            </div>
         </div>

         <div class="col-lg-4 col-md-6">
            <div class="card dashboard-product">
               <h4><b class="text-gray-secondary">Approval Request</b></h4>
                    <h2 class="dashboard-total-products"><span>@if(!empty($customers_approval_request)) {{count($customers_approval_request)}} @else 0  @endif</span></h2>
                  <span class="label label-secondary">Customers</span>
                <div class="side-box">
                    <i class=" text-gray-secondary" data-feather="user-x" aria-hidden="true"></i>
                </div>
            </div>
         </div>

         <div class="col-lg-4 col-md-6">
            <div class="card dashboard-product">
               <h4><b class="text-danger-color">Total Taste</b></h4>
                    <h2 class="dashboard-total-products"><span>@if(!empty($orders)) {{count($orders)}} @else 0  @endif</span></h2>
                  <span class="label label-danger">Taste</span>
                <div class="side-box">
                    <i class="text-danger-color fa fa-database" aria-hidden="true"></i>
                </div>
            </div>
         </div>

         <div class="col-lg-4 col-md-6">
            <div class="card dashboard-product">
               <h4><b class="text-success-color">Streams</b></h4>
                    <h2 class="dashboard-total-products"><span>@if(!empty($complete_orders)) {{count($complete_orders)}} @else 0  @endif</span></h2>
                  <span class="label label-success">Likes</span>
                <div class="side-box">
                    <i class="text-success-color fa fa-briefcase" aria-hidden="true"></i>
                </div>
            </div>
         </div>

        

                <div class="widget-content">
                    <div class="table-responsive" style="overflow: hidden;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: left;" class="text-left" align="left"><div class="th-content">Songs ID</div></th>
                                    <th style="text-align: center;"><div class="th-content">Buyer</div></th>
                                    <th class="text-center" align="center"><div class="th-content">Package</div></th>
                                    <th><div class="th-content th-heading">Amount</div></th>
                                    <th><div class="th-content">Status</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($orderss))
                                 @foreach($orderss as $order)
                                  @if($n++ <= 5)
                                        <tr>
                                            <td><div class="td-content"> @if(!empty($order->order_id)) {{ $order->order_id }} @endif</span></div></td>
                                            <td><div class="td-content customer-name"> @if(!empty($order->user->customer_id)) <img src="{{ asset('users_imgs/' . auth()->user()->avatar1) }}" alt="avatar" class="rounded-circle"> @else <img src="{{ asset('assets/img/dumy.jpg') }}" alt="avatar" class="rounded-circle"> @endif<span> @if(!empty($order->user->name)) {{ $order->user->name }} @endif</span></div></td>
                                            <td><div class="td-content product-brand text-primary" style="text-align: center;">
                                                @if($order->service_type == '')
                                                   @if(!empty($order->package->type)) {{ $order->package->type }} @endif  
                                                @endif
                                                @if($order->service_type == 'EIN' || $order->service_type == 'TM' || $order->service_type == 'ETC')
                                                   {{$order->service_type}}
                                                @endif 
                                           </div></td>
                                            <td><div class="td-content pricing"><span class="">${{ $order->amount }}</span></div></td>
                                            <td><div class="td-content">
                                                @if (strtoupper($order->status) == 'PENDING')
                                                    <span class="badge badge-warning"> {{ strtoupper($order->status) }} </span>
                                                @elseif (strtoupper($order->status) == 'RUNNING')
                                                    <span class="badge badge-primary"> {{ strtoupper($order->status) }} </span>
                                                @elseif (strtoupper($order->status) == 'COMPLETED')
                                                    <span class="badge badge-success"> {{ strtoupper($order->status) }} </span>
                                                @elseif (strtoupper($order->status) == 'REFUND')
                                                <span class="badge badge-danger"> {{ strtoupper($order->status) }} </span>
                                                @endif
                                            </div></td>
                                        </tr>
                                    @endif
                                 @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4  layout-spacing">
                <div class="widget-four">
                    <div class="widget-heading">
                        <h5 class="">Order Summary</h5>
                    </div>
                    <div class="widget-content">
                        <div class="vistorsBrowser">
                            <div class="browser-list">
                                <div class="w-icon">
                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg> --}}
                                </div>
                                <div class="w-browser-details">
                                    <div class="w-browser-info">
                                        <h6>Running</h6>
                                        <p class="browser-count">@if(!empty($running_orders)) {{count($running_orders)}} @else 0  @endif</p>
                                    </div>
                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: {{$running_per}}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="browser-list">
                                <div class="w-icon" style="padding: 6px 9px !important;">
                                    {{-- <i data-feather="trending-down"></i> --}}
                                    <img src="{{asset('assets/img/refund.png')}}">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg> --}}
                                </div>
                                <div class="w-browser-details">
                                    
                                    <div class="w-browser-info">
                                        <h6>Refund</h6>
                                        <p class="browser-count">@if(!empty($refund_orders)) {{count($refund_orders)}} @else 0  @endif</p>
                                    </div>

                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: {{$refund_per}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="browser-list">
                                <div class="w-icon">
                                    <i data-feather="trending-down"></i>
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> --}}
                                </div>
                                <div class="w-browser-details">
                                    <div class="w-browser-info">
                                        <h6>Pending</h6>
                                        <p class="browser-count">@if(!empty($pending_orders)) {{count($pending_orders)}} @else 0  @endif</p>
                                    </div>
                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{$pending_per+10}}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


@elseif(!empty($UserRole->user_id) && $UserRole->user_id == auth()->user()->id)
@if (auth()->user()->id == 1 || !empty(SF::getPermission('view dashboard')))

     @php 
        $visitors = App\Models\Statistic::all(); 
        $customers = App\Models\User::where('userType','customer/user')->where('approved',1)->get(); 
        $orders = App\Models\Order::all(); 
     @endphp

     <div class="col-lg-4 col-md-6">
         <div class="card dashboard-product">
            <h4><b class="text-primary-color">Total Visitors</b></h4>
                 <h2 class="dashboard-total-products"><span>@if(!empty($visitors)) {{count($visitors)}} @else 0  @endif</span></h2>
               <span class="label label-primary">Visitors</span>
             <div class="side-box">
                 <i class="fa fa-users text-primary-color" aria-hidden="true"></i>
             </div>
         </div>
      </div>

      <div class="col-lg-4 col-md-6">
         <div class="card dashboard-product">
            <h4><b class="text-gray-color">Total Customers</b></h4>
                 <h2 class="dashboard-total-products"><span>@if(!empty($customers)) {{count($customers)}} @else 0  @endif</span></h2>
               <span class="label label-gray">Customers</span>
             <div class="side-box">
                 <i class=" text-gray-color fa fa-male" aria-hidden="true"></i>
             </div>
         </div>
      </div>

      <div class="col-lg-4 col-md-6">
         <div class="card dashboard-product">
            <h4><b class="text-danger-color">Total Sale</b></h4>
                 <h2 class="dashboard-total-products"><span>@if(!empty($orders)) {{count($orders)}} @else 0  @endif</span></h2>
               <span class="label label-danger">Sale</span>
             <div class="side-box">
                 <i class="text-danger-color fa fa-database" aria-hidden="true"></i>
             </div>
         </div>
      </div>

      <div class="col-lg-4 col-md-6">
         <div class="card dashboard-product">
            <h4><b class="text-success-color">Total Order</b></h4>
                 <h2 class="dashboard-total-products"><span>@if(!empty($orders)) {{count($orders)}} @else 0  @endif</span></h2>
               <span class="label label-success">Order</span>
             <div class="side-box">
                 <i class="text-success-color fa fa-briefcase" aria-hidden="true"></i>
             </div>
         </div>
      </div>

      <div class="col-lg-8 col-md-6">
         <div class="widget widget-table-two">

             <div class="widget-heading">
                 <h5 class="">Pending Orders</h5>
             </div>

             <div class="widget-content">
                 <div class="table-responsive" style="overflow: hidden;">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th style="text-align: center;"><div class="th-content">Order ID</div></th>
                                 <th style="text-align: center;"><div class="th-content">Buyer</div></th>
                                 <th class="text-center" align="center"><div class="th-content">Package</div></th>
                                 <th><div class="th-content">Package Type</div></th>
                                 <th><div class="th-content th-heading">Amount</div></th>
                                 <th><div class="th-content">Status</div></th>
                             </tr>
                         </thead>
                         <tbody>
                             @if(!empty($orders))
                              @foreach($orders as $order)
                               @if($order->status == 'pending')
                                     <tr>
                                         <td><div class="td-content customer-name"> @if(!empty($order->order_id))  {{$order->order_id}} @endif<span> </span></div></td>
                                         <td><div class="td-content customer-name"> @if(!empty($order->user->avatar1)) <img src="{{ asset('users_imgs/' . auth()->user()->avatar1) }}" alt="avatar" class="rounded-circle"> @else <img src="{{ asset('assets/img/dumy.jpg') }}" alt="avatar" class="rounded-circle"> @endif<span> @if(!empty($order->user->name)) {{ $order->user->name }} @endif</span></div></td>
                                         <td><div class="td-content product-brand text-primary" style="text-align: center;">@if(!empty($order->package->type)) {{ $order->package->type }} @endif</div></td>
                                         <td><div class="td-content product-invoice" style="text-align: center;">@if(!empty($order->package->type)) {{ $order->package->type }} @endif</div></td>
                                         <td><div class="td-content pricing"><span class="">${{ $order->amount }}</span></div></td>
                                         <td><div class="td-content"><span class="badge badge-danger">{{$order->status}}</span></div></td>
                                     </tr>
                                 @endif
                              @endforeach
                             @endif
                            
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
      </div>

    @endif
@endif


@if(auth()->user()->userType =='customer/user')

@php 
$visitors = App\Models\Statistic::all(); 
$customers = App\Models\User::where('userType','customer/user')->where('approved',1)->get(); 
$Testimonial = App\Models\Testimonial::where('user_id',auth()->user()->id)->get(); 
$orders = App\Models\Order::where('user_id',auth()->user()->id)->get(); 
@endphp

<div class="col-lg-4 col-md-6">
 <div class="card dashboard-product">
    <h4><b class="text-primary-color">Site Testimonial </b></h4>
         <h2 class="dashboard-total-products"><span>@if(!empty($Testimonial)) {{count($Testimonial)}} @else 0  @endif</span></h2>
       <span class="label label-primary">Testimonial</span>
     <div class="side-box">
         <i class="fa fa-comments text-primary-color" aria-hidden="true"></i>
     </div>
 </div>
</div>

<div class="col-lg-4 col-md-6">
 <div class="card dashboard-product">
    <h4><b class="text-gray-color">Payment Status</b></h4>
         {{-- <h2 class="dashboard-total-products"><span>@if(!empty($customers)) {{count($customers)}} @else 0  @endif</span></h2> --}}
         <br>
         <br>
         <br>
         <span class="label label-gray">Paid</span>
     <div class="side-box">
        <i class="text-gray-color fa fa-database" aria-hidden="true"></i>
     </div>
 </div>
</div>

{{-- <div class="col-lg-4 col-md-6">
 <div class="card dashboard-product">
    <h4><b class="text-danger-color">Total Sale</b></h4>
         <h2 class="dashboard-total-products"><span>@if(!empty($orders)) {{count($orders)}} @else 0  @endif</span></h2>
       <span class="label label-danger">Sale</span>
     <div class="side-box">
         <i class="text-danger-color fa fa-database" aria-hidden="true"></i>
     </div>
 </div>
</div> --}}

<div class="col-lg-4 col-md-6">
 <div class="card dashboard-product">
    <h4><b class="text-success-color">Account Status</b></h4>
        {{-- <h2 class="dashboard-total-products"><span>@if(!empty($orders)) {{count($orders)}} @else 0  @endif</span></h2> --}}
      <br>
      <br>
      <br>
            @if(auth()->user()->approved == 1)
              <span class="label label-success"><i class="fa fa-check"></i> Approved</span>
            @else
               <span class="label label-danger">Pending</span>
            @endif
     <div class="side-box">
         <i class="text-success-color fa fa-briefcase" aria-hidden="true"></i>
     </div>
 </div>
</div>

<div class="col-lg-8 col-md-6">
 <div class="widget widget-table-two">

     <div class="widget-heading">
         <h5 class="">Status Of Services</h5>
     </div>

     <div class="widget-content">
         <div class="table-responsive" style="overflow: hidden;">
             <table class="table">
                 <thead>
                     <tr>
                         <th><div class="th-content text-left">Service</div></th>
                         <th align="center"><div class="th-content th-heading text-center">Status</div></th>
                     </tr>
                 </thead>
                 <tbody>
                    @php
                    $User_complete_services = App\Models\User_complete_services::where('user_id',auth()->user()->id)->get();
                @endphp

                    @if(!empty($User_complete_services))
                        @foreach($User_complete_services as $User_complete_service)
                                @if(!empty($User_complete_service))
                                    @if(!empty($User_complete_service->status))

                                    <tr>
                                  
                                         @if($User_complete_service->status == 'Complete')
                                            <td align="center">
                                                <div class="justify-content-between d-flex mt-3">
                                                   <div><i data-feather="check-circle" class="text-success"></i>  {{ isset($User_complete_service->service_name->name) ? $User_complete_service->service_name->name :''}}</div>
                                                </div>
                                            </td>
                                            <td align="center" class="text-center">
                                                <div class="text-success"><b class="badge badge-success">{{$User_complete_service->status}}</b></div>
                                            </td>
                                            @else
                                            <td>
                                            <div class="justify-content-between d-flex mt-3">
                                                <div><i data-feather="chevrons-right" class="text-secondary"></i> {{ isset($User_complete_service->service_name->name) ? $User_complete_service->service_name->name :''}}</div>
                                            </div>
                                            </td>
                                                <td align="center" class="text-center">
                                                @if($User_complete_service->status == 'Pending')
                                                <b class="badge badge-danger">{{$User_complete_service->status}}</b>
                                                @elseif($User_complete_service->status == 'In Process')
                                                <b class="badge badge-primary">{{$User_complete_service->status}}</b>
                                                @endif
                                            </td>
                                            @endif
                                        </td>
                                        </tr>
                                        {{-- <tr>
                                            <td><div class="td-content pricing"><span class=""> </span></div></td>
                                            <td><div class="td-content"><span class="badge badge-danger">{{ }}</span></div></td>
                                        </tr> --}}

                                @endif
                            @endif
                        @endforeach
                    @endif
                    
                 </tbody>
             </table>
         </div>
     </div>
 </div>
</div>

@endif

    </div>
  </div>
</div>

@endsection
