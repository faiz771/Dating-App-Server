@extends('layouts.app', ['cat_name' => 'settings', 'page_name' => 'coupon'])

@section('content')
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <h4>Add Discount Coupon</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <form action="{{ route('discount_coupn.update',$coupons->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="purchase">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{$coupons->name}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="purchase">Discount <span class="text-danger">*</span></label>

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">%</div>
                                </div>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "25" type="number" class="form-control" id="inlineFormInputGroup" name="per" value="{{$coupons->per}}" placeholder="">
                              </div>
                        </div>
                         <div class="form-group col-md-6">
                            <label for="purchase">Days <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="days" value="{{$coupons->days}}">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="purchase">Description <span class="text-danger">*</span></label>
                            <textarea name="desc" id="" cols="30" class="form-control" rows="10">{{$coupons->desc}}</textarea>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
