@extends('layouts.app', ['cat_name' => 'status_of_proccess', 'page_name' => 'status_of_proccess'])

@section('content')

<style>
.modal-content .modal-footer button.btn[data-dismiss="modal"] {
    background-color: #673ab7;
    color: #4361ee;
    font-weight: 700;
    border: 1px solid #e8e8e8;
}
</style>




    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Status Of Process</h3>
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
                            {{-- <th>Services</th>
                            <th>Add On</th>
                            <th>Complementary</th> --}}
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Status Of Proccess</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $val)

                            @php
                                $id = Crypt::encrypt($val->id);
                                $amount_p = isset($val->package->price) ? $val->package->price :'0';
                                $amount_a = isset($val->package->Add_onservices->price) ? $val->package->Add_onservices->price :'0';
                            @endphp


                        @if(!empty($val->package_id))
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if($val->service_type == '') {{ isset($val->package->type) ? $val->package->type :''}} @endif 
                                    @if($val->service_type == 'EIN' || $val->service_type == 'TM' || $val->service_type == 'ETC')   {{ isset($val->service_type) ? $val->service_type :''}} @endif
                                   
                                   </td>
                               
                                {{-- <td> {!! SF::services($val->package->service_ids) !!} </td>
                                <td> {!! SF::Add_onservices($val->package->AddonServices) !!} </td>
                                    <td>
                                        @if(!empty($val->complementary))
                                            <ul>
                                                @foreach ($val->complementary as $complementary)
                                                    <li>{{$complementary}}</li>
                                                @endforeach                                         
                                            </ul>
                                        @endif
                                    </td> --}}

                                <td> ${{ isset($val->amount) ? $val->amount :''}} </td>

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
                                    @if ($val->status === 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($val->status === 'running')
                                        <span class="badge badge-primary">Running</span>
                                    @elseif($val->status === 'completed')
                                        <span class="badge badge-success">Completed</span>
                                    @elseif (strtoupper($val->status) == 'REFUND')
                                       <a href="javascript:void(0)" class="text-light btn btn-success refunded" data-id="{{$val->id}}" data-text="{{$val->amount}}"><i
                                        data-feather="info"></i> REFUNDED</a>  
                                    @endif

                                    @if (strtoupper($val->status) != 'REFUND')
                                    <a><i data-feather="info" data-toggle="modal" data-target="#exampleModal"></i></a>
                                    @endif
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


    <div class="modal fade comments_show_single" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Status <i class="fa fa-info-circle txt16normal" style="font-size: 13px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="This modal displays the status of services"></i></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
                
                    @php
                        $User_complete_services = App\Models\User_complete_services::where('user_id',auth()->user()->id)->get();
                    @endphp

                        @if(!empty($User_complete_services))
                            @foreach($User_complete_services as $User_complete_service)
                                    @if(!empty($User_complete_service))
                                        @if(!empty($User_complete_service->status))

                                            @if($User_complete_service->status == 'Complete')
                                            <div class="justify-content-between d-flex mt-3">
                                               <div><i data-feather="check-circle" class="text-success"></i>  {{ isset($User_complete_service->service_name->name) ? $User_complete_service->service_name->name :''}}</div>
                                                <div class="text-success"><b class="badge badge-success">{{$User_complete_service->status}}</b></div>
                                             </div>
                                            @else
                                            <div class="justify-content-between d-flex mt-3">
                                                <div><i data-feather="chevrons-right" class="text-secondary"></i> {{ isset($User_complete_service->service_name->name) ? $User_complete_service->service_name->name :''}}</div>
                                                <div>
                                                    @if($User_complete_service->status == 'Pending')
                                                    <b class="badge badge-danger">{{$User_complete_service->status}}</b>
                                                    @elseif($User_complete_service->status == 'In Process')
                                                    <b class="badge badge-primary">{{$User_complete_service->status}}</b>
                                                    @endif
                                                </div> 
                                            </div>
                                            @endif

                                        @endif
                                    @endif
                            @endforeach
                        @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>     
                </div>
          </div>
       </div>
    </div>


@endsection
