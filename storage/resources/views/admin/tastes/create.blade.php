@extends('layouts.app', ['title' => 'Create Package','cat_name'=>'packages','page_name'=>'create_package'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Create Package </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/save-package') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Package Image <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="image"
                                            class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-row">

                            {{-- <div class="form-group col-md-6">
                                <label for="pkgName">Pacakage Name</label>
                                <input type="text" name="name" class="form-control" id="pkgName"
                                    placeholder="Package Name" value="{{ old('name') }}">
                            </div> --}}

                                <div class="form-group col-md-6">
                                  <label for="inputAddress2">Package Type</label>
                                    <select class="form-control tagging" name="type">
                                        <option hidden disabled selected>--- Select Type ---</option>
                                        @foreach($package_types as $package_type)
                                            <option value="{{ $package_type->name }}">{{ $package_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Package Price</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "25" class="form-control" id="inputAddress" name="price"
                                    placeholder="Package Price" value="{{ old('price') }}">
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress2">Package Type</label>
                                <select class="form-control tagging" name="type">
                                    <option hidden disabled selected>--- SELECT Type ---</option>
                                     @foreach($package_types as $package_type)
                                        <option value="{{ $package_type->name }}">{{ $package_type->name }}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="service_ids">Select Features</label>
                                <select class="form-control tagging" name="services[]" multiple="multiple">
                                    @foreach ($services as $val)
                                        <option value="{{ $val->id }}" {{ old('services') == $val ? 'selected' : '' ; }}>{{ $val->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="service_ids">Select Add On</label>
                                <select class="form-control tagging" name="addon[]" multiple="multiple">
                                    @foreach ($AddOnsServices as $val)
                                        <option value="{{ $val->id }}" {{ old('addon') == $val ? 'selected' : '' ; }}>{{ $val->services }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-row justify-content-end d-flex text-align-right" style="text-align:right;">
                            <div class="form-group col-lg-12">
                                <button type="button" class="btn btn-primary complementary">+ Complementary</button>
                            </div>
                        </div>

                        <div class="form-row comservice_more"></div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

