@extends('layouts.app', ['title' => 'Create User','cat_name'=>'users','page_name'=>'create_user'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Create Customer </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">

                    <form action="{{ route('add_customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Name</label>
                                <input type="text" name="name" class="form-control" id="userName" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="userEmail" placeholder="Enter Email">
                                <input type="hidden" class="form-control service_type" name="service_type" id="service_type">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userStatus">Services</label>
                                <select name="pkg_id" id="user_package_select" class="form-control">
                                    <option selected hidden disabled>--- Select Package ---</option>
                                        @if(!empty($packages))
                                            @foreach($packages as $pkg)
                                                <option value="{{ $pkg->id }}" data-text="{{ $pkg->type }}"> {{ $pkg->type }} </option>
                                            @endforeach
                                            @else
                                            <option disabled>Package Not Found</option>
                                        @endif
                                        @if(!empty($ein))<option value="{{ $ein->id }}"  data-text="EIN"> EIN </option> @endif
                                        @if(!empty($tm))<option value="{{ $tm->id }}"  data-text="TM"> TM </option> @endif
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Discount Coupon</label>
                                @php 
                                $coupns = App\Models\DiscountCoupn::all();
                                @endphp
                
                                    <select class="form-control" name="coupon_id">
                                        <option selected="true" disabled="disabled">Select Coupon</option>
                                        @foreach($coupns as $coupn)
                                        <option value="{{$coupn->id}}">{{$coupn->name}} {{$coupn->per}}%</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Payment Proof <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="proof"
                                            class="custom-file-container__custom-file__custom-file-input user_img" accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
