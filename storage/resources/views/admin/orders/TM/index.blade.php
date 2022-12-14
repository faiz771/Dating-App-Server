@extends('layouts.app', ['title' => 'Orders', 'cat_name' => 'trademark', 'page_name' => 'manage_orders'])

@section('content')

<style>
.layout-px-spacing {
    padding: 0 20px 0 20px !important;
    min-height: 0 !important;
}
.modal-content .modal-footer button.btn[data-dismiss="modal"] {
    background-color: #c1c1c1 !important;
    color: #4361ee;
    font-weight: 700;
    border: 1px solid #e8e8e8;
}

.modal-notification .modal-body .icon-content svg {
    width: 36px;
    height: 36px;
    color: #fff;
    fill: rgb(237 244 255 / 8%);
}

.modal-notification .modal-body .icon-content {
    margin: 0 0 20px 0px;
    display: inline-block;
    padding: 25px;
    border-radius: 50%;
    background: #f7941d;
    color: #fff;
}

</style>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                            <h3 class="float-left">Orders</h3>
                        </div>

                        <div class="col-xl-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end">
                          <form method="POST" action="{{url('/order_filter_bystate')}}" id="formformeal" enctype="multipart/form-data">
                              @csrf
                              <div class="input-group">
                                <select class="form-control" name="status">
                                    <option value="all"  @if(!empty($status)) {{ $status == 'all'  ? 'selected' : ''}} @endif>All</option>
                                   
                                  @foreach ($states as $state)
                                  <option value="{{$state->name}}"  @if(!empty($state->name)) {{ $status == $state->name  ? 'selected' : ''}} @endif>{{$state->name}}</option>
                                  @endforeach

                                  </select>
                                  <input type="hidden" name="service" value="TM"> 
                                <button type="submit" class="btn btn-success input-group-addon" style="border-radius: inherit;">Filter</button>
                              </div>
                           </form>
                      </div>

                      <div class="col-xl-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end">
                            <form method="POST" action="{{url('/order_filter_byStatus')}}" id="formformeal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="ser" value="TM">
                                <div class="input-group">
                                  <select class="form-control" name="status">
                                      <option value="all"  @if(!empty($status)) {{ $status == 'all'  ? 'selected' : ''}} @endif>All</option>
                                      <option value="pending" @if(!empty($status)) {{ $status == 'pending'  ? 'selected' : ''}} @endif>Pending</option>
                                      <option value="running" @if(!empty($status)) {{ $status == 'running'  ? 'selected' : ''}} @endif>Running</option>
                                      <option value="completed" @if(!empty($status)) {{ $status == 'completed'  ? 'selected' : ''}} @endif>Completed</option>
                                  </select>
                                  <button type="submit" class="btn btn-success input-group-addon" style="border-radius: inherit;">Filter</button>
                                </div>
                             </form>
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
                            <th>Buyer</th>
                            <th>State</th>
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Status</th>
                            <th>Order id</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                         @if(!empty($orders))
                        @foreach ($orders as $key => $val)
                         
                            @php
                                $id = Crypt::encrypt($val->id);
                            @endphp

                            @if($val->service_type == 'TM')
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if(!empty($val->user->customer_id)) {{ $val->user->customer_id }}@endif</td>
                                <td> {{ $val->user->f_state }} </td>
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
                                    @if (strtoupper($val->status) == 'PENDING')
                                        <span class="badge badge-warning"> {{ strtoupper($val->status) }} </span>
                                    @elseif (strtoupper($val->status) == 'RUNNING')
                                        <span class="badge badge-primary"> {{ strtoupper($val->status) }} </span>
                                    @elseif (strtoupper($val->status) == 'COMPLETED')
                                        <span class="badge badge-success"> {{ strtoupper($val->status) }} </span>
                                    @elseif (strtoupper($val->status) == 'REFUND')
                                        <span class="badge badge-danger"> {{ strtoupper($val->status) }} </span>
                                    @endif
                                </td>
                                <td> {{ $val->order_id }} </td>
                                <td class="text-center">
                            
                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit Order')))
                                    <a href="{{ url('/tm_edit-order/' . $id) }}" class="text-success" title="Edit"><i
                                            data-feather="edit"></i></a>
                                    @endif

                                    @if(auth()->user()->id == 1 || !empty(SF::getPermission('Delete Order')))
                                        <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                            data-id="{{ $id }}" data-action="{{ url('/delete-order/' . $id) }}"
                                            title="Delete"><i data-feather="trash"></i></a>
                                    @endif

                                     {{--  --}}
                                     <div class="dropdown d-inline-block">
                                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="pendingTask" style="will-change: transform; position: absolute; transform: translate3d(105px, 0, 0px); top: 0px; left: 0px;">
                                            @if(!empty($val->coupon->per))
                                           <a class="dropdown-item assign_coupon_detail" href="javascript:void(0);" data-id="{{$val->id}}"><i data-feather="info"></i> Assign Coupon</a>
                                            @else
                                            <a class="dropdown-item assign_cop" href="javascript:void(0);" data-id="{{$val->id}}"><i data-feather="corner-up-left"></i> Assign Coupon</a>
                                            @endif
                                            
                                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Order Refund')))
                                            @if (strtoupper($val->status) != 'REFUND')
                                            <a href="javascript:void(0)" class="dropdown-item refund" data-id="{{$val->id}}" data-text="@if(!empty($val->coupon_id)){{$val->before_assign_coupon_amount}}@else{{ $val->amount }}@endif" title="Refund"><i
                                                    data-feather="database"></i>REFUND</a>
                                            @elseif(strtoupper($val->status) == 'REFUND')    
                                            <a href="javascript:void(0)" class="dropdown-item refunded" data-id="{{$val->id}}" data-text="@if(!empty($val->coupon_id)){{$val->before_assign_coupon_amount}}@else{{ $val->amount }}@endif"><i
                                                data-feather="info"></i> REFUNDED</a>      
                                            @endif
                                        @endif

                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endif
                        @endforeach
                          @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


{{-- Coupon detail modal show --}}
      <!-- Modal -->
      <div class="modal fade modal-notification animated fadeInDown" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" id="standardModalLabel">
          <div class="modal-content">
            <div class="modal-body text-center">
              <div class="info-icon">
            </div>

                <div class="icon-content">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>

                    <h2 class="coupon_per"></h2>
                    <h2 class="coupon_name"></h2>
                {{-- <p class="modal-text">Vivamus vitae hendrerit neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi consequat auctor turpis, vitae dictum augue efficitur vitae. Vestibulum a risus ipsum. Quisque nec lacus dolor. Quisque ornare tempor orci id rutrum.</p> --}}

              </div>
            <div class="modal-footer justify-content-end">
              <button class="btn btn-secondary bg-dark" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
{{-- Coupon detail modal show end  --}}


{{-- Assign coupon Modal --}}
<div class="modal fade" id="assigncoupon_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Discount Coupon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('/assign_coupon')}}" method="POST">
            @csrf
          <div class="modal-body">
            <div class="form-group">
                <label for="email1"></label>

                @php 
                $coupns = App\Models\DiscountCoupn::all();
                @endphp

                    <select class="form-control" name="coupon_id">
                        <option selected="true" disabled="disabled">Select Coupon</option>
                        @foreach($coupns as $coupn)
                        <option value="{{$coupn->id}}">{{$coupn->name}} {{$coupn->per}}%</option>
                        @endforeach
                    </select>
                <input type="hidden" class="form-control" name="type" id="" aria-describedby="" value="TM">

                <input type="hidden" class="form-control order_id" name="order_id" id="order_id" aria-describedby="order_id" value="">
            </div>
          </div>
          <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Assign</button>
          </div>
        </form>
      </div>
    </div>
  </div>
{{-- Assign coupon Modal end --}}


{{-- Refunded Modal --}}
        <div class="modal fade" id="refunded_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel">Detail <i data-feather="info"></i></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <h2 class="refund_amount"></h2>
                    </div>
    
                     <div class="form-group refund_desc">
                      </div>
    
                  </div>
                  <div class="modal-footer border-top-0 d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-dismiss="modal" >CLOSE</button>
                  </div>
              </div>
            </div>
          </div>
    {{-- Refunded Modal end --}}

    {{-- Refund Modal --}}
    <div class="modal fade" id="refund_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header border-bottom-0">
              <h5 class="modal-title" id="exampleModalLabel">Refund</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{url('/refund-orders')}}" method="POST">
                @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="email1">Amount</label>
                  <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "25" type="number" class="form-control amount" name="amount" id="amount" value="" readonly>
                  <input type="hidden" class="form-control order_id" name="order_id" id="order_id" aria-describedby="order_id" value="">
                </div>

                 <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name="desc" rows="7"></textarea>
                  </div>
                  <input type="hidden" class="form-control" name="type" id="" aria-describedby="" value="TM">

              </div>
              <div class="modal-footer border-top-0 d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
{{-- Refund Modal end --}}

@endsection
