@extends('layouts.app', ['title' => 'Artists', 'cat_name' => 'Artist', 'page_name' => 'Artist'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Artists</h3>
                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Create Artist')))
                                {{-- <a href="{{ url('/add-package') }}" class="btn btn-success float-right"> Add Package </a> --}}
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
                            {{-- <th>Name</th> --}}
                            <th>Artist</th>
                            <th>Artist Photo</th>
                            <th>Artist Spotify ID</th>
                          
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($artists))
                            @foreach ($artists as $val)
                            <td> {{ $val->id }} </td>

                                        {{-- <td class="sorting_1 sorting_2">
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <img src="{{ asset('package_imgs/' . $val->image) }}" alt="">
                                                </div>
                                                <p class="align-self-center mb-0 admin-name">{{ $val->name }}</p>
                                            </div>
                                        </td> --}}
                                    <td> {{ $val->artist }} </td>
                                    <td> {{ $val->artistPhoto }} </td>
                                    <td> {{ $val->artistSpotifyID  }} </td>
                                   

                                    <td class="text-center">
                                        {{-- @if (auth()->user()->id == 1 || !empty(SF::getPermission('View Package')))
                                            <a href="{{ url('/view-package/' . $id) }}" class="call-view-pkg-modal"> <i data-feather="eye"></i> </a>
                                        @endif --}}

                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit Artist Spotify ID')))
                                            <a href="{{ url('/edit-artists/' . $val->id) }}" class="text-primary"><i
                                                    data-feather="edit"></i></a>
                                        @endif

                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Delete Artists')))
                                            <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                                data-id="{{ $val->id }}"
                                                data-action="{{ url('/delete-artist/' . $val->id) }}"><i
                                                    data-feather="trash"></i></a>
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



    <div id="viewPkgModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View</h5>
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
                    <div class="row">
                        <div class="col-md-6">
                            <label> Name </label>
                            <input type="text" class="name form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label> Artist </label>
                            <input type="text" class="artist form-control" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label> Type </label>
                            <input type="text" class="type form-control" readonly>
                        </div>
                        <div class="col-md-6 services">
                            <label> Services </label>

                        </div>
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                </div>
            </div>
        </div>
    </div>
@endsection
