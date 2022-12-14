@extends('layouts.app', ['title' => 'Orders', 'cat_name' => 'orders', 'page_name' => 'pending_orders'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Pending Orders</h3>
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
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Status</th>
                            {{-- <th class="text-center">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $val)
                        @if($val->service_type != 'TM' && $val->service_type != 'EIN')

                        @if($val->service_type == '')
                            @php
                                $id = Crypt::encrypt($val->id);
                            @endphp
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if(!empty($val->order_id)) {{ $val->order_id }} @endif</td>
                                <td> @if(!empty($val->user->customer_id)) {{ $val->user->customer_id }} @endif</td>
                                <td> @if(!empty($val->package->type)) {{ $val->package->type }} @endif</td>
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
                                    <span class="badge badge-warning"> @if(!empty($val->status)) {{ strtoupper($val->status) }} @endif</span>
                                </td>
                              
                                {{-- <td class="text-center">
                                    <a href="{{ url('/view-order/' . $id) }}" class="text-primary" title="View"><i
                                            data-feather="eye"></i></a>
                                    <a href="{{ url('/edit-order/' . $id) }}" class="text-success" title="Edit"><i
                                            data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                        data-id="{{ $id }}" data-action="{{ url('/delete-order/' . $id) }}"
                                        title="Delete"><i data-feather="trash"></i></a>
                                </td> --}}
                            </tr>

                            @endif

                            @if($val->service_type == 'EIN' || $val->service_type == 'TM' || $val->service_type == 'ETC')
                            
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if(!empty($val->order_id)) {{ $val->order_id }} @endif</td>
                                <td> @if(!empty($val->user->customer_id)) {{ $val->user->customer_id }} @endif</td>
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
                                    <span class="badge badge-warning"> @if(!empty($val->status)) {{ strtoupper($val->status) }} @endif</span>
                                </td>

                                
                                {{-- <td class="text-center">
                                    <a href="{{ url('/view-order/' . $id) }}" class="text-primary" title="View"><i
                                            data-feather="eye"></i></a>
                                    <a href="{{ url('/edit-order/' . $id) }}" class="text-success" title="Edit"><i
                                            data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                        data-id="{{ $id }}" data-action="{{ url('/delete-order/' . $id) }}"
                                        title="Delete"><i data-feather="trash"></i></a>
                                </td> --}}
                            </tr>

                              @endif
                            @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
