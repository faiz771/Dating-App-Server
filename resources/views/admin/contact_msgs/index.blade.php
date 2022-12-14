@extends('layouts.app', ['title' => 'Contact Us Messages', 'cat_name' => 'visitors', 'page_name' => 'contact_us_messages'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3>Contact Us Messages</h3>
                            
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#waModal">
                                Launch demo modal
                              </button> --}}
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
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
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
                                    <td> {{ $val->name }} </td>
                                    <td> {{ $val->email }} </td>
                                    <td> {{ $val->subject }} </td>
                                    <td> {{ $val->message }} </td>
                                    <td class="text-center">
                                        {{-- @if (auth()->user()->id == 1 || !empty(SF::getPermission('Send Whatsapp Message')))
                                            <a href="javascript:void(0)" data="+923081502113" class="send-whatsapp-msg"
                                                title="Send Whatsapp Message">
                                                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="24px" height="24px">
                                                    <path
                                                        d="M19.1,4.9C17,2.8,14.2,1.8,11.2,2c-4,0.3-7.5,3.1-8.7,7c-0.8,2.7-0.5,5.6,0.9,8l-1.3,4.3c-0.1,0.4,0.3,0.8,0.7,0.7l4.5-1.2	C8.7,21.6,10.3,22,12,22h0c4.2,0,8.1-2.6,9.4-6.5C22.7,11.6,21.8,7.6,19.1,4.9z M16.9,15.6c-0.2,0.6-1.2,1.1-1.7,1.2	c-0.5,0-0.9,0.2-3-0.6c-2.5-1-4.1-3.6-4.3-3.8c-0.1-0.2-1-1.4-1-2.6c0-1.2,0.6-1.8,0.9-2.1C8,7.4,8.3,7.4,8.5,7.4c0.2,0,0.3,0,0.5,0	c0.2,0,0.4,0,0.6,0.4c0.2,0.5,0.7,1.7,0.8,1.9c0.1,0.1,0.1,0.3,0,0.4c-0.1,0.2-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.3-0.4,0.4	c-0.1,0.1-0.3,0.3-0.1,0.5c0.1,0.3,0.6,1.1,1.4,1.7c1,0.8,1.8,1.1,2,1.2c0.3,0.1,0.4,0.1,0.5-0.1c0.1-0.2,0.6-0.7,0.8-1	s0.3-0.2,0.6-0.1s1.5,0.7,1.7,0.8c0.3,0.1,0.4,0.2,0.5,0.3C17.1,14.5,17.1,15,16.9,15.6z" />
                                                </svg>

                                            </a>
                                        @endif --}}
                                        
                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Send Visitor Mail')))
                                            <a href="javascript:void(0)" class="text-danger send-mail-modal"
                                                data="{{ $val->email }}" title="Send Mail"><i data-feather="send"></i></a>
                                        @endif
                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('View Contact-us Message')))
                                            <a href="javascript:void(0)" class="text-primary view-visitor-msg-btn"
                                                data-id="{{ $val->id }}" title="View Message"><i
                                                    data-feather="eye"></i></a>
                                        @endif



                                        @if (auth()->user()->id == 1 || !empty(SF::getPermission('Delete Contact-us Message')))
                                            <a href="javascript:void(0)" class="text-danger delete-visitor"
                                                data-id="{{ $val->id }}" title="Delete Message"><i
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


    <div id="deleteVisitor" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
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
                <form action="{{ url('/delete-contact-us-msg') }}">
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
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
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
