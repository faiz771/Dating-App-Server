@extends('layouts.app', ['title' => 'Edit User', 'cat_name' => 'orders', 'page_name' => 'edit_order'])

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Edit Order </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/update-order') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Buyer </label>
                                <input type="text" class="form-control text-dark" disabled
                                    value="{{ $order->user->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Purchased Package Plan </label>
                                <input type="text" class="form-control text-dark" disabled
                                    value="@if($order->service_type == ''){{ $order->package->type}} @else {{ $order->service_type}} @endif ">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Amount </label>
                                <input type="text" class="form-control text-dark" disabled
                                    value="{{ $order->amount }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label> Order Status </label>
                                {{-- <input type="text" class="form-control text-dark" disabled value="{{ $order->status }}"> --}}
                                <select class="form-control tagging" name="status">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}> {{ strtoupper('Pending') }} </option>
                                    <option value="running" {{ $order->status == 'running' ? 'selected' : '' }}> {{ strtoupper('running') }} </option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                        {{ strtoupper('completed') }}
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Paid Via </label>
                                <input type="text" class="form-control text-dark" disabled
                                    value="{{ $order->payment_method }}">
                            </div>
                                   
                                <div class="form-group col-md-6">
                                    @if($order->payment_method == 'PayPal' || $order->payment_method == 'Stripe')
                                            <label> Transaction ID </label>
                                            <input type="text" class="form-control text-dark" disabled
                                                value="{{ $order->transaction_id }}">
                                    @else
                                        <label> Payment Proof </label>
                                        <br>
                                        <a href="{{ asset('proofs/' .$order->proof) }}" data-fancybox="group" data-caption="Payment Proof">
                                            <img src="{{ asset('proofs/' .$order->proof) }}" class="img-thumbnail" style="width: 35%;"/>
                                        </a>
                                    @endif
                                </div>
                        </div>

                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
