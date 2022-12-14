@extends('layouts.app', ['title' => 'Songs', 'cat_name' => 'Songs', 'page_name' => 'Songs'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Songs</h3>
                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Create Song')))
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
                            <th>Songs</th>
                            <th>Artist </th>
                            <th>Song Detail</th>
                            <th>Song Url</th>
                            {{-- <th>Add On</th> --}}
                            <th>Song Cover Photo</th>
                            <th>Song Video</th>
                            <th>Song Duration</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($songs))
                            @foreach ($songs as $key => $val)
                                @php
                                    $id = Crypt::encrypt($val->id);
                                @endphp
                                <tr data-id="{{ $val->id }}">
                                    <td> {{ $key + 1 }} </td>
                                        {{-- <td class="sorting_1 sorting_2">
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <img src="{{ asset('package_imgs/' . $val->image) }}" alt="">
                                                </div>
                                                <p class="align-self-center mb-0 admin-name">{{ $val->name }}</p>
                                            </div>
                                        </td> --}}
                                    <td> {{ $val->songTitle }} </td>
                                    <td> {{ $val->artist_id }} </td>
                                    <td> {{ $val->songDetail }} </td>
                                    <td> {{ $val->songUrl  }} </td>
                                    <td> {{ $val->songGenre }} </td>
                                    <td> {{ $val->songVideo }} </td>
                                    <td> {{ $val->songDuration }} </td>


                                    <td class="text-center">
                                        {{-- @if (auth()->user()->id == 1 || !empty(SF::getPermission('View Package')))
                                            <a href="{{ url('/view-package/' . $id) }}" class="call-view-pkg-modal"> <i data-feather="eye"></i> </a>
                                        @endif --}}

                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit Song')))
                                            <a href="{{ url('/edit-song/' . $id) }}" class="text-primary"><i
                                                    data-feather="edit"></i></a>
                                        @endif

                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Delete Song')))
                                            <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                                data-id="{{ $id }}"
                                                data-action="{{ url('/delete-song/' . $id) }}"><i
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
                            <label> Song Title </label>
                            <input type="text" id="songCoverPhoto" class="Song Title form-control" value="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label> Artist Id  </label>
                        <input type="text" id="artist_id" class="form-control" value="" >
                    </div>               
                    <div class="col-md-6">
                        <label> Song Detail </label>
                        <input type="text" id="songDetail" class="form-control"  value="">
                    </div>
                </div>

                <div class="col-md-6">
                    <label> Song Url </label>
                    <input type="text" id="songUrl" class="form-control" value="" >
                </div>
            </div>

            <div class="col-md-6">
                <label> Song Genre </label>
                <input type="text" id="songGenre" class="form-control" value="" >
            </div>
        </div>

        <div class="col-md-6">
            <label> Song Video </label>
            <input type="text" id="songVideo" class="form-control" value="" >
        </div>
    </div>
    <div class="col-md-6">
        <label> Artist Duration </label>
        <input type="text" id="songDuration" class="form-control" value="" >
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
