@extends('layouts.app', ['title' => 'User Approval Requests', 'cat_name' => 'users', 'page_name' => 'approval_requests'])

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@section('content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Approval Requests</h3>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Payment method</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $val)

                            @php
                                $id = Crypt::encrypt($val->id);
                                $order_detail = App\Models\Order::where('user_id',$val->id)->first();
                            @endphp

                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $val->name }} </td>
                                <td> 
                                    
                                     @if($val->email_verifed == 1)
                                     <a href="javascript:void(0);"  class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="Email is Verified"> <i data-feather="check-circle" class="text-success"></i></a> {{ $val->email }} 

                                     @else
                                     <a href="javascript:void(0);"  class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="Email verification is pending"> <i data-feather="x-circle" class="text-danger"></i></a> {{ $val->email }} 
                                     @endif
                                </td>

                                 <td align="center">
                                    @if(!empty($order_detail))

                                      @if($order_detail->payment_method == 'Stripe' || $order_detail->payment_method == 'PayPal')
                                            {{$order_detail->payment_method}}
                                      @else

                                            @if(!empty($order_detail->proof))
                                               <p class="imglist">
                                                {{$order_detail->payment_method}} &nbsp;
                                                  <a href="{{ asset('proofs/' . $order_detail->proof) }}" data-fancybox="group" data-caption="Payment Proof">
                                                    <img src="{{ asset('proofs/' . $order_detail->proof) }}" class="img-thumbnail" style="width: 15%;"/>
                                                  </a>
                                                </p>
                                            @endif

                                       @endif
                                    @endif
                                 </td>

                                <td>
                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Approve User/Customer')))
                                       <span class="badge badge-danger"> Pending</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('View User/Customer')))
                                    
                                    @if ($val->purchase_type == 'tm')
                                            <a href="{{ route('tm.show',$val->id) }}" class="text-primary" title="View">
                                                <i data-feather="eye"></i>
                                            </a>
                                        @elseif ($val->purchase_type == 'ein')
                                            <a href="{{ route('ein.show',$val->id) }}" class="text-primary" title="View">
                                                <i data-feather="eye"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('/view-user/' . $id) }}" class="text-primary" title="View">
                                                <i data-feather="eye"></i>
                                            </a>
                                        @endif
                                        {{-- <a href="{{ url('/view-user/' . $id) }}" class="text-primary" title="View"><i data-feather="eye"></i></a> --}}
                                    @endif

                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Approve User/Customer')))
                                        <a href="{{ url('/approve-user/' . $id) }}" class="text-danger" title="Approve"><i data-feather="user"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
