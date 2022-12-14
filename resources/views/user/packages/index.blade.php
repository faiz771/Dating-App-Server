@extends('layouts.app', ['title'=>'Purchased Package Plan','cat_name' => 'purchased_pkg', 'page_name' => 'user_packages'])

@section('content')

<style>

.modal-content .modal-footer button.btn[data-dismiss="modal"] {
    background-color: #afb5c3;
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
                            <h3 class="float-left">Purchased Package Plans</h3>
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
                            <th>Services</th>
                            {{-- <th>Add On</th>
                            <th>Complementary</th> --}}
                            <th>Amount</th>
                            <th>Expense</th>
                            {{-- <th>Transaction ID</th> --}}
                            {{-- <th class="text-center">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $key => $val)
                            @php
                                $id = Crypt::encrypt($val->id);
                                $n = 1;
                                $expenses = App\Models\Expense::where('user_id',$val->user_id)->get();
                                $t_exp = 0;
                              
                            @endphp

                                @if(!empty($expenses))
                                    @foreach ($expenses as $expense)
                                       @if(!empty($expense))
                                            @php
                                                $t_exp = $expense->expense + $t_exp;
                                            @endphp
                                         @endif
                                    @endforeach
                                @endif

                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> @if($val->service_type == '') {{ isset($val->package->type) ? $val->package->type :''}} @endif 
                                     @if($val->service_type == 'EIN' || $val->service_type == 'TM' || $val->service_type == 'ETC')   {{ isset($val->service_type) ? $val->service_type :''}} @endif
                                </td>
                                <td> @if($val->service_type == '')  @if($val->service_type == '')  {!! SF::services($val->package->service_ids) !!} @endif @endif
                                    @if($val->service_type == 'EIN' || $val->service_type == 'TM' || $val->service_type == 'ETC')   {{ isset($val->service_type) ? $val->service_type :''}} @endif
                                
                                </td>

                                {{-- <td> {!! SF::Add_onservices($val->package->AddonServices) !!} </td> --}}

                                {{-- <td>
                                    @if(!empty($val->complementary))
                                        <ul>
                                            @foreach ($val->complementary as $complementary)
                                                <li>{{$complementary}}</li>
                                            @endforeach                                         
                                        </ul>
                                    @endif
                                </td> --}}

                                <td>${{ isset($val->amount) ? $val->amount :''}}</td>

                                {{-- <td> {{ $val->transaction_id }} </td> --}}

                                {{-- <td class="text-center">
                                    @if ($val->status == 1)
                                        <a href="{{ url('/deactive-customer/' . $id) }}" class="text-danger"
                                            title="Deactivate"><i data-feather="user-x"></i></a>
                                    @else
                                        <a href="{{ url('/active-customer/' . $id) }}" class="text-success"
                                            title="Activate"><i data-feather="user"></i></a>
                                    @endif
                                    <a href="{{ url('/view-user/' . $id) }}" class="text-primary" title="View"><i
                                            data-feather="eye"></i></a>
                                    <a href="{{ url('/edit-user/' . $id) }}" class="text-success" title="Edit"><i
                                            data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                        data-id="{{ $id }}" data-action="{{ url('/delete-user/' . $id) }}"
                                        title="Delete"><i data-feather="trash"></i></a>
                                </td> --}}
                                  <td>$ {{$t_exp}}  &nbsp &nbsp<i data-feather="info" data-toggle="modal" data-target="#exampleModal"></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Expense <i class="fa fa-info-circle txt16normal" style="font-size: 13px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="This model displays the list of Expense"></i></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead class="table-dark">
                            <th>#</th>
                            <th>Expense</th>
                            <th>Description</th>
                        </thead>
                        <tbody>
                        @if(!empty($expenses))
                            @foreach($expenses as $expense)
                                    @if(!empty($expense))
                                        @if(!empty($expense))
                                            <tr>
                                                <td>{{$n++}}</td>
                                                <td>${{$expense->expense}}</td>
                                                <td>{{$expense->desc}}</td>
                                            </tr>
                                        @endif
                                    @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>     
                </div>
          </div>
       </div>
    </div>


@endsection
