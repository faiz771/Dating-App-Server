@extends('layouts.app', ['cat_name' => 'roles_perm', 'page_name' => 'roles'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Add Role </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/save-role') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="purchase">Role</label>
                                <input type="text" name="name" class="form-control" id="purchase"
                                    placeholder="Enter Role Name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="expense">Description</label>
                               <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Enter Role Description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
