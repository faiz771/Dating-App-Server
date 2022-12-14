@extends('layouts.app', ['title' => 'Create Site Services','cat_name'=>'settings','page_name'=>'create_site_service'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Create Site Services</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/save-site-service') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="serviceName">Service Name</label>
                                <input type="text" id="serviceName" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="serviceType">Service Type</label>
                                <input type="text" id="serviceType" name="type" class="form-control" value="{{ old('type') }}">
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="serviceDescription">Description</label>
                                <textarea name="description" class="form-control" id="serviceDescription" cols="30" rows="10"></textarea>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
