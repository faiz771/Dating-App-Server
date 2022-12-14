@extends('layouts.app', ['title' => 'Site Services', 'cat_name' => 'settings', 'page_name' => 'site_services'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Site Services</h3>
                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Create Site Service')))
                                <a href="{{ url('/create-site-service') }}" class="btn btn-success float-right">Add
                                    Service</a>
                            @endif
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
                            <th>Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($services))
                            @foreach ($services as $key => $val)
                                @php
                                    $id = Crypt::encrypt($val->id);
                                @endphp
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $val->name }} </td>
                                    <td> {{ $val->type }} </td>
                                    <td> {{ $val->description }} </td>
                                    <td class="text-center">
                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit Site Service')))
                                            <a href="{{ url('/edit-site-service/' . $id) }}" class="text-primary"
                                                data-id="{{ $val->id }}" title="Edit"> <i data-feather="edit"></i>
                                            </a>
                                        @endif

                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Delete Site Service')))
                                            <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                                data-id="{{ $id }}"
                                                data-action="{{ url('/delete-site-service') }}" title="Delete"> <i
                                                    data-feather="trash"></i> </a>
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
@endsection
