@extends('layouts.app', ['title' => 'Users', 'cat_name' => 'users', 'page_name' => 'users'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4>Upload Document</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ route('up_document.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row mb-4">
                            <div class="col-md-12">
                                <label for="userName" class="mb-3">Document</label>
                                <br>
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="file" name="docment[]" class="form-control" multiple id="userName"
                                    placeholder="Upload Documents" value="{{ old('docment') }}" required style="padding: 7px;">
                                    <span class="text-dark">only pdf,xml,doc,docx supported</span>
                            </div>
                            <div class="form-group col-md-12 mt-5">
                                <label for="userEmail">Description</label>
                                <textarea class="form-control" name="Description" id="Description" placeholder="Description" value="{{ old('Description') }}" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
