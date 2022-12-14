@extends('layouts.app', ['cat_name' => 'settings', 'page_name' => 'pkg_plans'])

@section('content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Set Site Package Plan')))
                                <a href="{{ url('/set-pkg-plan') }}" class="btn btn-success float-right"> Set Package Plan
                                </a>
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
                            <th>Package</th> 
                            {{-- <th>Price</th> --}}
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($site_pks))
                            @foreach ($site_pks as $key => $val)
                                @php
                                    $id = Crypt::encrypt($val->id);
                                @endphp
                                @if(!empty($val->pkg_ids))
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td> {!! SF::printPlans($val->pkg_ids) !!} </td>
                                        <td class="text-center">

                                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit Site Package Plan')))
                                                <a href="{{ url('/edit-site-pkg/' . $id) }}" class="text-primary"
                                                    title="Edit"><i data-feather="edit"></i></a>
                                            @endif

                                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit Site Package Plan')))
                                                <a href="javascript:void(0)" data-id="{{ $id }}"
                                                    data-action="{{ url('/delete-site-pkg/' . $id) }}"
                                                    class="text-danger call-delete-modal" title="Delete"><i
                                                        data-feather="trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
