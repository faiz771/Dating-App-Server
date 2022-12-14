@extends('layouts.app', ['title' => 'Edit Package Service','cat_name'=>'packages','page_name'=>'edit_package_service'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Edit Package Service  </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/update-service') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="serviceName">Service Name</label>
                                <input type="text" id="serviceName" name="name" class="form-control" value="{{ $service->name }}">
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="serviceDescription">Description</label>
                                <textarea name="description" class="form-control" id="serviceDescription" cols="30" rows="10">{{ $service->description }}</textarea>
                            </div>
                        </div> --}}
                        <input type="hidden" name="id" value="{{ $service->id }}">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
