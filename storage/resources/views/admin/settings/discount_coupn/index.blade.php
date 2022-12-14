@extends('layouts.app', ['title' => 'Manage Discount Coupon', 'cat_name' => 'settings', 'page_name' => 'coupon'])
@section('content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3>Manage Discount Coupon</h3>
                            <a href="{{route('discount_coupn.create')}}" class="btn btn-success float-right" style="margin-top: -40px;">+ Add Coupon</a>
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
                            <th>Coupon</th>
                              <th>Days</th>
                         
                            <th>Discount</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                     @if(!empty($coupons))
                        @foreach ($coupons as $coupon)
                          @if(!empty($coupon))
                            <tr>
                                <td> {{ $n++ }} </td>                             
                                <td> {{ $coupon->name }} </td>     
                                <td> {{ $coupon->code }} </td>     
                                 <td> {{ $coupon->days }} </td>     
                                <td> {{ $coupon->per }}% </td>     
                                                       
                                <td align="center">
                                    <a href="javascript:void(0)" class="text-secondary coupon_description_show" data-text="{{ $coupon->desc }}" title="Description"><i data-feather="eye"></i></a>
                                    <a href="{{route('discount_coupn.edit',$coupon->id)}}" class="text-success edit_cat" title="Edit"><i data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="text-danger coupon_delete" data-id="{{ $coupon->id }}" data-action="{{ url('/delete-coupon/' . $coupon->id) }}" title="Delete"><i data-feather="trash"></i></a>
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

    {{-- Coupon Description show modal--}}
  
  <!-- Modal -->
  <div class="modal fade" id="coupon_desc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Description!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="coupon_des"></p>
        </div>
      </div>
    </div>
  </div>
    {{-- Coupon Description show modal End--}}

@endsection
