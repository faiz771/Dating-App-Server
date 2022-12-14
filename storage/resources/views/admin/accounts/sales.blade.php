@extends('layouts.app', ['cat_name' => 'accounts', 'page_name' => 'sales'])
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Sales Of Package</h3>
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
                            <th>Order ID</th>
                            <th>Package</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($sales))
                            @php
                                $total = 0;
                                $n= 1;
                            @endphp
                            @foreach ($sales as $key => $sale)
                               @if (strtoupper($sale->status) != 'REFUND')

                               @if(empty($sale->before_assign_coupon_amount))
                                    @php
                                        $total = $sale->amount + $total;
                                    @endphp
                               @else
                                    @php
                                        $total = $sale->before_assign_coupon_amount + $total;
                                    @endphp
                               @endif

                                @php
                                    // $total += isset($sale->amount) ? $sale->amount : $sale->before_assign_coupon_amount;
                                    $id = Crypt::encrypt($sale->id);
                                    $pkg_id = isset($sale->package->type) ? Crypt::encrypt($sale->package->id) :'';
                                    $uid = Crypt::encrypt($sale->user->id);
                                @endphp

                              @if($sale->service_type == '')
                                <tr>
                                    <td>{{ $n++ }}</td>
                                    <td>{{ isset($sale->order_id) ? $sale->order_id  :''}}</td>
                                    <td>{{ isset($sale->package->type) ? $sale->package->type :''}}</td>
                                    <td>{{ isset($sale->user->customer_id) ? $sale->user->customer_id  :''}}</td>
                                    <td>${{ $sale->amount }}</td>

                                    <td> 
                                        @if(!empty($sale->coupon->per))
                                             {{$sale->coupon->per}}%
                                        @else
                                             0%
                                        @endif
                                       </td>
                                       <td>
                                           @if(!empty($sale->coupon_id))
                                             ${{$sale->before_assign_coupon_amount}}
                                           @else
                                             ${{ $sale->amount }}
                                           @endif
                                       </td>

                                    <td>

                                    @if (strtoupper($sale->status) == 'PENDING')
                                        <span class="badge badge-warning"> {{ strtoupper($sale->status) }} </span>
                                    @elseif (strtoupper($sale->status) == 'RUNNING')
                                        <span class="badge badge-primary"> {{ strtoupper($sale->status) }} </span>
                                    @elseif (strtoupper($sale->status) == 'COMPLETED')
                                        <span class="badge badge-success"> {{ strtoupper($sale->status) }} </span>
                                    @elseif (strtoupper($sale->status) == 'REFUND')
                                    <span class="badge badge-danger"> {{ strtoupper($sale->status) }} </span>
                                    @endif

                                        {{-- @if($sale->package->order->status === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($sale->package->order->status === 'running')
                                            <span class="badge badge-primary">Running</span>
                                        @elseif($sale->package->order->status === 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @endif --}}
                                    </td>
                                    <td>

                                        @if(auth()->user()->id == 1 || !empty(SF::getPermission('Delete Sale')))
                                            <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                                data-id="{{ $id }}" data-action="{{ url('/delete-sale/' . $id) }}"
                                                title="Delete Sale">
                                                <i data-feather="trash"></i>
                                            </a>
                                        @endif

                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Add Expense')))
                                            <a href="{{ url('/accounts/expenses/' . $uid) }}" title="Add Expense">
                                                <i data-feather="shopping-bag"></i>
                                            </a>
                                        @endif

                                        @if(auth()->user()->id == 1 || !empty(SF::getPermission('Profit & Loss Sheet')))
                                            <a href="{{ url('/accounts/sheet/' . $uid) }}"
                                                title="Profit & Loss Account Sheet">
                                                <i data-feather="clipboard"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endif

                               @if($sale->service_type == 'EIN' || $sale->service_type == 'TM' || $sale->service_type == 'ETC')

                               <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ isset($sale->order_id) ? $sale->order_id  :''}}</td>
                                <td>{{ isset($sale->service_type) ? $sale->service_type :''}}</td>
                                <td>{{ isset($sale->user->name) ? $sale->user->name  :''}}</td>
                                <td>${{ $sale->amount }}</td>
                                <td> 
                                    @if(!empty($sale->coupon->per))
                                         {{$sale->coupon->per}}%
                                    @else
                                         0%
                                    @endif
                                   </td>
                                   <td>
                                       @if(!empty($sale->coupon_id))
                                         ${{$sale->before_assign_coupon_amount}}
                                       @else
                                         ${{ $sale->amount }}
                                       @endif
                                   </td>
                                <td>

                                @if (strtoupper($sale->status) == 'PENDING')
                                    <span class="badge badge-warning"> {{ strtoupper($sale->status) }} </span>
                                @elseif (strtoupper($sale->status) == 'RUNNING')
                                    <span class="badge badge-primary"> {{ strtoupper($sale->status) }} </span>
                                @elseif (strtoupper($sale->status) == 'COMPLETED')
                                    <span class="badge badge-success"> {{ strtoupper($sale->status) }} </span>
                                @elseif (strtoupper($sale->status) == 'REFUND')
                                <span class="badge badge-danger"> {{ strtoupper($sale->status) }} </span>
                                @endif

                                    {{-- @if ($sale->package->order->status === 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($sale->package->order->status === 'running')
                                        <span class="badge badge-primary">Running</span>
                                    @elseif($sale->package->order->status === 'completed')
                                        <span class="badge badge-success">Completed</span>
                                    @endif --}}
                                </td>
                                <td>

                                    @if(auth()->user()->id == 1 || !empty(SF::getPermission('Delete Sale')))
                                        <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                            data-id="{{ $id }}" data-action="{{ url('/delete-sale/' . $id) }}"
                                            title="Delete Sale">
                                            <i data-feather="trash"></i>
                                        </a>
                                    @endif

                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Add Expense')))
                                        <a href="{{ url('/accounts/expenses/'.$uid) }}" title="Add Expense">
                                            <i data-feather="shopping-bag"></i>
                                        </a>
                                    @endif

                                    @if(auth()->user()->id == 1 || !empty(SF::getPermission('Profit & Loss Sheet')))
                                        <a href="{{ url('/accounts/sheet/' . $uid) }}"
                                            title="Profit & Loss Account Sheet">
                                            <i data-feather="clipboard"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>

                                @endif
                                 @endif
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>${{ $total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
