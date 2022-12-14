@extends('layouts.app', ['cat_name' => 'roles_perm', 'page_name' => 'roles'])
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Roles</h3>
                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Create Role')))
                                <a href="{{ url('/create-role') }}" class="btn btn-success float-right"> Add Role </a>
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
                            <th>Role</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($roles))
                            @foreach ($roles as $key => $val)
                                @php
                                    $id = Crypt::encrypt($val->id);
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->name }}</td>
                                    <td>{{ $val->description }}</td>
                                    <td>
                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit Role')))
                                            <a href="{{ url('/edit-role/' . $id) }}" class="text-primary">
                                                <i data-feather="edit"></i>
                                            </a>
                                        @endif

                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Delete Role')))
                                            <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                                data-id="{{ $id }}"
                                                data-action="{{ url('/delete-role/' . $id) }}">
                                                <i data-feather="trash"></i>
                                            </a>
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
