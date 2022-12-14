@extends('layouts.app', ['title' => 'Orders', 'cat_name' => 'orders', 'page_name' => 'completed_orders'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Completed Orders</h3>
                            
                            <div class="col-xl-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                                <form method="POST" action="{{url('/order_filter_bystate')}}" id="formformeal" enctype="multipart/form-data" style="display: flex;width: 70%; margin-right: -60%;">
                                    @csrf
                                    <div class="input-group">
                                      <select class="form-control" name="status">
                                          <option value="all"  @if(!empty($status)) {{ $status == 'all'  ? 'selected' : ''}} @endif>All</option>
                                         
                                        @foreach ($states as $state)
                                        <option value="{{$state->name}}"  @if(!empty($state->name)) {{ $status == $state->name  ? 'selected' : ''}} @endif>{{$state->name}}</option>
                                        @endforeach

                                        </select>
                                        <input type="hidden" name="service" value="LLC"> 
                                      <button type="submit" class="btn btn-success input-group-addon" style="border-radius: inherit;">Filter</button>
                                    </div>
                                 </form>
                            </div>

                            {{-- <a href="{{ url('/add-user') }}" class="btn btn-success float-right"> Add Customer </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <table id="alter_pagination" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Id</th>
                            <th>Buyer</th>
                            <th>State</th>
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Status</th>
                            {{-- <th class="text-center">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($orders))
                        @foreach ($orders as $key => $val)
                          @if($val->service_type != 'TM' && $val->service_type != 'EIN')
                            @php
                                $id = Crypt::encrypt($val->id);
                            @endphp
                             @if($val->service_type == '')
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if(!empty($val->order_id)) {{ $val->order_id }} @endif</td>
                                <td> {{ $val->user->customer_id }} </td>
                                <td> {{ $val->user->f_state }} </td>
                                <td> {{ $val->package->type }} </td>
                                <td> ${{ $val->amount }} </td>
                                <td> 
                                    @if(!empty($val->coupon->per))
                                         {{$val->coupon->per}}%
                                    @else
                                         0%
                                    @endif
                                   </td>
                                   <td>
                                       @if(!empty($val->coupon_id))
                                         ${{$val->before_assign_coupon_amount}}
                                       @else
                                         ${{ $val->amount }}
                                       @endif
                                   </td>

                                <td>
                                    <span class="badge badge-success"> {{ strtoupper($val->status) }} </span>
                                </td>
                            </tr>
                            @endif

                            @if($val->service_type == 'EIN' || $val->service_type == 'TM' || $val->service_type == 'ETC')
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if(!empty($val->order_id)) {{ $val->order_id }} @endif</td>
                                <td> {{ $val->user->customer_id }} </td>
                                <td> @if(!empty($val->service_type)) {{ $val->service_type }} @endif</td>
                                <td> ${{ $val->amount }} </td>

                                <td> 
                                    @if(!empty($val->coupon->per))
                                         {{$val->coupon->per}}%
                                    @else
                                         0%
                                    @endif
                                   </td>
                                   <td>
                                       @if(!empty($val->coupon_id))
                                         ${{$val->before_assign_coupon_amount}}
                                       @else
                                         ${{ $val->amount }}
                                       @endif
                                   </td>

                                <td>
                                    <span class="badge badge-success"> {{ strtoupper($val->status) }} </span>
                                </td>
                            </tr>
                               @endif
                            @endif
                          @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
