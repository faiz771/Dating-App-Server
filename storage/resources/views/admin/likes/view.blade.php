{{-- {{ dd(json_decode($package->service_ids, true)); }} --}}
@extends('layouts.app', ['title' => 'Edit Package','cat_name'=>'packages','page_name'=>'view_package'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> View Package </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/update-package') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Package Image <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <img src="{{ asset('package_imgs/'.$package->image) }}" alt="package-img" style="width: 100%; height: 100%;">
                                </div>
                                <input readonly style="color:black; font-weight:bold;" type="hidden" name="ext_img" value="{{ $package->image }}">
                                <input readonly style="color:black; font-weight:bold;" type="hidden" name="id" value="{{ $package->id }}">
                            </div>
                        </div>

                        
                        <div class="form-row mb-4">
                            <div class="form-group col-md-12">
                                <label for="service_ids">Select Services</label>
                                <select class="form-control tagging" name="service_ids[]"  multiple="multiple" disabled>
                                    @foreach ($services as $key => $val)
                                        @php
                                            $selected = '';
                                            $services = json_decode($package->service_ids, true);
                                            foreach ($services as $s) {
                                                if ($s == $val->id) {
                                                    $selected = 'selected';
                                                }
                                            }
                                        @endphp
                                        <option value="{{ $val->id }}" {{ $selected }}>{{ $val->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pkgName">Pacakage Name</label>
                                <input readonly style="color:black; font-weight:bold;" type="text" name="name" class="form-control" id="pkgName"
                                    placeholder="Package Name" value="{{ $package->type }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Package Type</label>
                                <select class="form-control tagging" name="type" disabled>
                                    <option value="type1" selected> {{ $package->type }} </option>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Package Price</label>
                                <input readonly style="color:black; font-weight:bold;" type="number" class="form-control" id="inputAddress" name="price"
                                    placeholder="Package Price" value="{{ $package->price }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="">Discount</label>
                                <input readonly style="color:black; font-weight:bold;" type="number" name="discount" class="form-control"
                                    value="{{ $package->discount }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10" readonly style="color:black; font-weight:bold;">{{ $package->description }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
