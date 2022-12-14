@extends('layouts.app', ['title' => 'Users', 'cat_name' => 'users', 'page_name' => 'users'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row" style="display: flex;justify-content: space-between;">
                        <h4>Update Customer Services Status</h4>
                    
                    @php 
                    $cid = Crypt::encrypt($id);
                   @endphp

                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Upload User/Customer Documents')))
                            <a href="{{ route('up_document.show',$cid) }}" class="text-light btn btn-dark" title="Upload Document">
                                <i data-feather="upload"></i> Upload Document
                            </a>
                        @endif
                    </div>
                       
                    </div>
                </div>
            </div>
        </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ route('user_update_services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         @foreach($User_complete_services as $User_complete_service)

                         <input type="hidden" name="id" class="id" value="{{$User_complete_service}}">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group mt-3">
                                                <label for="services">Services</label>
                                                <input type="text" class="form-control" name="services" id="services" placeholder="Services" value="{{ $User_complete_service->service_name->name }}" readonly>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-5">
                                            <div class="form-group mt-3">
                                                <label for="Description">Description</label>
                                                <input type="text" class="form-control Description" name="Description" data-text="{{ $User_complete_service->desc }}" id="Description" placeholder="Description" value="{{ $User_complete_service->desc }}" required>
                                            </div>
                                        </div> --}}

                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="Status">Status</label>
                                                <select class="form-control ser_status" name="status" id="status" data-id="{{$User_complete_service->id}}" required>
                                                    <option value="" disable hidden>Select Status</option>
                                                    <option class="Complete" @if(!empty($User_complete_service->status)) {{ $User_complete_service->status == 'Complete'  ? 'selected' : ''}} @endif>Complete</option>
                                                    <option class="Pending" @if(!empty($User_complete_service->status)) {{ $User_complete_service->status == 'Pending'  ? 'selected' : ''}} @endif>Pending</option>
                                                    <option class="In Process" @if(!empty($User_complete_service->status)) {{ $User_complete_service->status == 'In Process'  ? 'selected' : ''}} @endif>In Process</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                            @endforeach
                        <div class="row">
                            <div class="col-md-12" align="right">
                             <a href="{{ url('/customers') }}" class="btn btn-primary mt-3"><i data-feather="arrow-left"></i> Back</a>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


