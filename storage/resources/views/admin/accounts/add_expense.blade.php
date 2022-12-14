@extends('layouts.app', ['cat_name' => 'accounts', 'page_name' => 'add_expense'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4>Add Purchase Package Expense </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/save-expenses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pkg_id" value="{{ $pkg->id }}">
                        <input type="hidden" name="service_type" value="{{ $service_type }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="package">Package</label>
                                <input type="text" name="package" class="form-control text-dark" id="package" value="{{ $service_type }}" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="purchase">Package Price</label>
                                <input type="text" name="purchase" class="form-control" id="purchase" placeholder="Enter Purchase" value="{{ $amount }}" readonly>
                            </div>


                            <input type="hidden" name="user_id" value="{{$user_id}}">

                            <div class="form-group col-md-6">
                                <label for="expense">Expense</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "20" class="form-control" id="expense" name="expense" placeholder="Enter Expense" value="{{ old('price') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="desc"> Description</label>
                                <input type="text" name="desc" class="form-control" id="desc" placeholder="Enter Description" value="{{ old('desc') }}">
                            </div>
           
                        </div>
                        <div class="form-group col-md-12" align="right">
                           <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
