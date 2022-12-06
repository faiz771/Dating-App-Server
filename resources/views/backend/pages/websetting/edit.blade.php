
@extends('backend.layouts.master')

@section('title')
Role Create - Admin Panel
@endsection

@section('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')


<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                            <h4>Edit Web Setting</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="" class="btn backgroundbuttoncolor">Manage Setting</a>
                                        </div>
                                        </div>                                                        
                                </div>
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('success')}}
                                </div>
                                @endif
                                {{-- <div class="jumbotron">
                                <div class="row"> --}}
                               {{--  <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Packages:</label>
                                <select name="package_id" class="form-control searcharticlebypackage">
                                <option>-- Select Package --</option>
                                 @foreach($package as $value)   
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                                </select>
                                </div> --}}
                            {{--     
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                <label>Publish/Draft</label>
                                <select name="status" class="form-control searchdraftbystatus">
                                <option>-- Select Status --</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6"></div>
                                </div>
                                </div>
                                </div> --}}

                 <div class="widget-content widget-content-area br-6 mt-5">
              
                        
                    <form action="{{ route('websetting.update', $websetting->id) }}"  method="POST" id="formfordoctor" enctype="multipart/form-data">
                   
                        @method('PUT')
                        @csrf
                    <div class="row">
                    <div class="col-md-6">
                    <div class="card">
                    <div class="card-header">
                    <h4>Dashboard Icon</h4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="form-group">
                    <label>Dashbaord Logo<span class="text-danger">*</span></label>
                    <input type="file" name="dashboard_icon" class="form-control-file">
                    <input type="hidden" name="dashboard_icon" value="{{ $websetting->dashboard_icon }}">
                    @error('dashboard_icon')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    <div class="cool-lg-4 col-md-4 col-sm-4 col-4">
                    <img src="{{ asset('/WebSetting/'.$websetting->dashboard_icon) }}" width="100" height="100" style="border-radius:5%;">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card">
                    <div class="card-header">
                    <h4>Dashboard Fav Icon</h4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="form-group">
                    <label>Dashboard Fav logo<span class="text-danger">*</span></label>
                    <input type="file" name="dashboard_fav_icon" class="form-control-file">
                    <input type="hidden" name="dashboard_fav_icon" value="{{ $websetting->dashboard_fav_icon }}">
                    @error('dashboard_fav_icon')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                    <img src="{{ asset('WebSetting/'.$websetting->dashboard_fav_icon) }}" width="100" height="100" style="border-radius:5%;">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6 mt-2">
                      <div class="form-group">
                      <label>Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $websetting->name }}">
                      @error('defaultcurrency')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      </div>
                    </div>
                    <div class="col-md-6 mt-2">
                    <div class="form-group">
                    <label>Currency<span class="text-danger">*</span></label>
                    <input type="defaultcurrency" name="defaultcurrency" class="form-control" placeholder="Enter Currency" value="{{ $websetting->defaultcurrency }}">
                    @error('defaultcurrency')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    
                    </div>
                    <div class="col-md-6 mt-2">
                      <div class="form-group">
                      <label>Service Fee<span class="text-danger">*</span></label>
                      <input type="text" name="servicefee" class="form-control" placeholder="Entee Service Fee" value="{{ $websetting->CurrencySign }}">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      </div>
                      
                      </div>
                      <div class="col-md-6 mt-2">
                        <div class="form-group">
                        <label>Currency Sign<span class="text-danger">*</span></label>
                        <input type="text" name="currencysign" class="form-control" placeholder="Enter Currency Sign" value="{{ $websetting->CurrencySign }}">
                        @error('currencysign')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        
                        </div>
                    </div>
                    <button type="submit" class="btn backgroundbuttoncolor mt-3">Update</button>
                    </form>
                        </div>
                            </div>
                        </div>
</div>
</div>
</div>

<?php $series=1;?>
    
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection