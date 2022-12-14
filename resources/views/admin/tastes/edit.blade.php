{{-- {{ dd(json_decode($package->service_ids, true)); }} --}}
@extends('layouts.app', ['title' => 'Edit Package','cat_name'=>'packages','page_name'=>'edit_package'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Edit Package </h4>
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
                            {{-- <div class="form-row mb-5">
                                <div class="form-group col-md-6">
                                    <label>Current Package Image </label>
                                    <img src="{{ asset('package_imgs/'.$package->image) }}" alt="package-img" style="width: 100%; height: 100%;">
                                </div>
                                <div class="form-group col-md-6">
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

                        <input type="hidden" name="ext_img" value="{{ $package->image }}">
                        <input type="hidden" name="id" value="{{ $package->id }}">
                        <input type="hidden" name="type" value="{{ $package->type }}">

                        <div class="form-row">
                                {{-- <div class="form-group col-md-6">
                                    <label for="pkgName">Pacakage Name</label>
                                    <input type="text" name="name" class="form-control" id="pkgName"
                                        placeholder="Package Name" value="{{ $package->type }}">
                                </div> --}}
                            {{-- <div class="form-group col-md-6">
                                <label for="inputAddress2">Package Type</label>
                                <select class="form-control tagging" name="type">
                                        @foreach($package_types as $package_type)
                                            <option value="{{ $package_type->name }}" {{ $package_type->name == $package->type ? 'selected' : '' ; }}>{{ $package_type->name }}</option>
                                        @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Package Price</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "25" type = "number" maxlength = "25" class="form-control" id="inputAddress" name="price"
                                    placeholder="Package Price" value="{{ $package->price }}">
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-row justify-content-end mt-4 d-flex text-align-right" style="text-align:right;">
                                <label for="inputAddress"></label>
                                    <div class="form-group col-lg-12">
                                        <button type="button" class="btn btn-primary complementary">+ Complementary</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="service_ids">Select Services</label>
                                <select class="form-control tagging" name="services[]" multiple="multiple">
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

                        {{-- <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="service_ids">Select Add On</label>
                                <select class="form-control tagging" name="addon[]" multiple="multiple">
                                    @foreach ($AddOnsServices as $key => $val)
                                            @php
                                                $selected = '';
                                                $add_onservices = $package->AddonServices;
                                                foreach ($add_onservices as $s) {
                                                    if ($s == $val->id) {
                                                        $selected = 'selected';
                                                    }
                                                }
                                            @endphp
                                        <option value="{{ $val->id }}" {{ $selected }}>{{ $val->services }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-row comservice_more"></div>

                        <div class="form-group">
                            @if(!empty($package->complementary))
                             @foreach($package->complementary as $complementary)
                                    <input name="comservice_more[]" type="text" class="form-control mt-3 @error('comservice_more') is-invalid @enderror" value="{{$complementary}}" placeholder="Complementary Services">
                              @endforeach
                            @endif
                        </div>

                        {{-- <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10">{{ $package->description }}</textarea>
                            </div>
                        </div> --}}

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
