@extends('layouts.app', ['cat_name' => 'payment_records', 'page_name' => ''])

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
                            <h3 class="float-left">Payment Records</h3>
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
                            <th>Package Type</th>
                            {{-- <th>Amount</th> --}}
                            <th>Paid Via</th>
                            <th>Transaction Proof</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($payments as $key => $val)
                        @php
                            $id = Crypt::encrypt($val->id);
                            $amount_p = isset($val->package->amount) ? $val->package->amount :'0';
                            $amount_a = isset($val->package->Add_onservices->price) ? $val->package->Add_onservices->price :'0';
                            $payment_proof = App\Models\Order::where('user_id',$val->user_id)->where('package_id',$val->pkg_id)->first();
                        @endphp

                       @if($payment_proof->service_type != 'TM' && $payment_proof->service_type != 'EIN')
                          @if(!empty($val->package->id))

                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if($val->service_type == '') {{ isset($val->package->type) ? $val->package->type :''}} @endif 
                                 @if($val->service_type == 'EIN' || $val->service_type == 'TM' || $val->service_type == 'ETC')   {{ isset($val->service_type) ? $val->service_type :''}} @endif
                                
                                </td>

                                {{-- <td>${{ isset($val->package->order->amount) ? $val->package->order->amount :''}}</td> --}}

                                <td>{{ isset($val->package->order->payment_method) ? $val->package->order->payment_method :''}}</td>
                                <td> 
                                    @if(!empty($val->package->order->transaction_id))
                                    <b>Transaction ID </b>: {{ $val->package->order->transaction_id }} 
                                    @else
                                        @if(!empty($val->package->order->payment_method))
                                        @if($val->package->order->payment_method === 'Local Bank')
                                        <div class="d-flex">
                                            <b class="mt-2">Bank Proof:</b> &nbsp;&nbsp;
                                                <p class="imglist">
                                                    <a href="{{ asset('proofs/'.$payment_proof->proof) }}" data-fancybox="group" data-caption="Payment Proof">
                                                        <button data-img="{{ asset('proofs/'.$payment_proof->proof) }}" class="btn btn-sm btn-secondary view-bank-proof">Proof</button>
                                                        {{-- <img src="{{ asset('proofs/'.$val->package->order->proof) }}" class="img-thumbnail" style="width: 100%;" /> --}}
                                                    </a>
                                                </p>
                                        </div>
                                            {{-- <button type="button" class="btn btn-sm btn-secondary view-bank-proof" data="{{ asset('proofs/'.$val->package->order->proof) }}">Proof</button>                                        --}}
                                           @endif
                                        @endif
                                    @endif
                                </td>
                                <td>

                                    <span class="badge badge-success">Paid</span>

                                        {{-- @if ($val->package->order->status === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($val->package->order->status === 'running')
                                            <span class="badge badge-primary">Running</span>
                                        @elseif($val->package->order->status === 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @endif --}}

                                </td>
                            </tr>
                              @endif
                            @endif
                            
                            <!--  TM -->
                            
                             @if($payment_proof->service_type == 'TM')

                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if($val->service_type == '') {{ isset($val->package->type) ? $val->package->type :''}} @endif 
                                 @if($val->service_type == 'EIN' || $val->service_type == 'TM' || $val->service_type == 'ETC')   {{ isset($val->service_type) ? $val->service_type :''}} @endif
                                
                                </td>

                                {{-- <td>${{ isset($val->package->order->amount) ? $val->package->order->amount :''}}</td> --}}

                                <td>{{ isset($payment_proof->payment_method) ? $payment_proof->payment_method :''}}</td>
                                <td> 
                                    @if(!empty($payment_proofr->transaction_id))
                                    <b>Transaction ID </b>: {{ $payment_proof->transaction_id }} 
                                    @else
                                        @if(!empty($payment_proof->payment_method))
                                        @if($payment_proof->payment_method === 'Local Bank')
                                        <div class="d-flex">
                                            <b class="mt-2">Bank Proof:</b> &nbsp;&nbsp;
                                                <p class="imglist">
                                                    <a href="{{ asset('proofs/'.$payment_proof->proof) }}" data-fancybox="group" data-caption="Payment Proof">
                                                        <button data-img="{{ asset('proofs/'.$payment_proof->proof) }}" class="btn btn-sm btn-secondary view-bank-proof">Proof</button>
                                                        {{-- <img src="{{ asset('proofs/'.$val->package->order->proof) }}" class="img-thumbnail" style="width: 100%;" /> --}}
                                                    </a>
                                                </p>
                                        </div>
                                            {{-- <button type="button" class="btn btn-sm btn-secondary view-bank-proof" data="{{ asset('proofs/'.$val->package->order->proof) }}">Proof</button>                                        --}}
                                           @endif
                                        @endif
                                    @endif
                                </td>
                                <td>

                                    <span class="badge badge-success">Paid</span>

                                        {{-- @if ($val->package->order->status === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($val->package->order->status === 'running')
                                            <span class="badge badge-primary">Running</span>
                                        @elseif($val->package->order->status === 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @endif --}}

                                </td>
                            </tr>
                              @endif
                           
                              <!--  EIN -->
                            
                             @if($payment_proof->service_type == 'EIN')

                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if($val->service_type == '') {{ isset($val->package->type) ? $val->package->type :''}} @endif 
                                 @if($val->service_type == 'EIN' || $val->service_type == 'TM' || $val->service_type == 'ETC')   {{ isset($val->service_type) ? $val->service_type :''}} @endif
                                
                                </td>

                                {{-- <td>${{ isset($val->package->order->amount) ? $val->package->order->amount :''}}</td> --}}

                                <td>{{ isset($payment_proof->payment_method) ? $payment_proof->payment_method :''}}</td>
                                <td> 
                                    @if(!empty($payment_proofr->transaction_id))
                                    <b>Transaction ID </b>: {{ $payment_proof->transaction_id }} 
                                    @else
                                        @if(!empty($payment_proof->payment_method))
                                        @if($payment_proof->payment_method === 'Local Bank')
                                        <div class="d-flex">
                                            <b class="mt-2">Bank Proof:</b> &nbsp;&nbsp;
                                                <p class="imglist">
                                                    <a href="{{ asset('proofs/'.$payment_proof->proof) }}" data-fancybox="group" data-caption="Payment Proof">
                                                        <button data-img="{{ asset('proofs/'.$payment_proof->proof) }}" class="btn btn-sm btn-secondary view-bank-proof">Proof</button>
                                                        {{-- <img src="{{ asset('proofs/'.$val->package->order->proof) }}" class="img-thumbnail" style="width: 100%;" /> --}}
                                                    </a>
                                                </p>
                                        </div>
                                            {{-- <button type="button" class="btn btn-sm btn-secondary view-bank-proof" data="{{ asset('proofs/'.$val->package->order->proof) }}">Proof</button>                                        --}}
                                           @endif
                                        @endif
                                    @endif
                                </td>
                                <td>

                                    <span class="badge badge-success">Paid</span>

                                        {{-- @if ($val->package->order->status === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($val->package->order->status === 'running')
                                            <span class="badge badge-primary">Running</span>
                                        @elseif($val->package->order->status === 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @endif --}}

                                </td>
                            </tr>
                              @endif
                              
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
