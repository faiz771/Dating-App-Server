@extends('layouts.app', ['title' => 'Visitors', 'cat_name' => 'visitors', 'page_name' => 'visitors'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3>Visitors</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <table id="alter_pagination" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Device</th>
                            <th>Location</th>
                            <th>Latitute</th>
                            <th>Logitute</th>
                            <th>Ip-Adress</th>
                            <th>Browser</th>
                            <th>Platform</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($visitors))
                            @foreach ($visitors as $key => $val)
                                @php
                                    $id = Crypt::encrypt($val->id);
                                @endphp
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $val->device }} </td>
                                    <td> {{ $val->location }} </td>
                                    <td> {{ $val->latitute }} </td>
                                    <td> {{ $val->logitude }} </td>
                                    <td> {{ $val->ip }} </td>
                                    <td> {{ $val->browser }} </td>
                                    <td> {{ $val->platform }} </td>
                                    <td class="text-center">
                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Delete Site Visitor')))
                                            <a href="javascript:void(0)" class="text-danger delete-visitor-site"
                                                data-id="{{ $val->id }}"> <i data-feather="trash"></i> </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="deleteVisitorSite" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Visitor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="{{ url('/delete-visitor') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="visitor-id"></div>
                        <h5>Are You Sure ?</h5>
                    </div>
                    <div class="modal-footer md-button">
                        <button type="submit" class="btn btn-danger"><i class="flaticon-cancel-12"></i>
                            Yes</button>
                        <button type="button" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="rotateleftModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Visitor Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text print-visitor-msg"></p>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                </div>
            </div>
        </div>
    </div>
@endsection
