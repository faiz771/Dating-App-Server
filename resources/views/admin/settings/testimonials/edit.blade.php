@extends('layouts.app', ['title' => 'Edit Testimonial','cat_name'=>'settings','page_name'=>'edit_testimonial'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Edit Testimonial</h3>
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
                    <form action="{{ url('/save-testimonial') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Testimonial Image <a href="javascript:void(0)"
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="serviceName">Name</label>
                                <input type="text" id="serviceName" name="name" class="form-control" value="{{ $row->name }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="serviceType">Rating</label>
                                <input type="text" id="serviceType" name="rating" class="form-control" value="{{ $row->rating }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="serviceDescription">Comment</label>
                                <textarea name="comment" class="form-control" id="serviceDescription" cols="30" rows="10">{{ $row->comment }}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        <input type="hidden" name="existing_img" value="{{ $row->image }}">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
