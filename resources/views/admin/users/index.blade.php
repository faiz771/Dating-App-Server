@extends('layouts.app', ['title' => 'Users', 'cat_name' => 'users', 'page_name' => 'users'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Customers</h3>
                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Create User/Customer')))
                                <a href="{{ route('add_customers.create') }}" class="btn btn-success float-right"> Add Customer </a>
                                {{-- <a href="{{ url('/add-user') }}" class="btn btn-success float-right"> Add Customer </a> --}}
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
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th>Role</th> --}}
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $key => $val)
                            
                            @php
                                $id = Crypt::encrypt($val->id);
                                $users_roles = App\Models\UserRole::where('user_id',$val->id)->first();
                            @endphp

                             @if(empty($users_roles))

                            <tr>
                                <td> {{ $n++ }} </td>
                                <td> {{ $val->customer_id }} </td>
                                <td> {{ $val->name }} </td>
                                <td> {{ $val->email }} </td>
                                {{-- <td>{!! SF::getRole($val->id) !!} </td> --}}
                                <td> 

                                    @if($val->status == 1)
                                        <span class="badge badge-success"> Active</span>
                                    @else
                                        <span class="badge badge-danger"> Deactive</span>
                                    @endif
                                    
                                </td>
                                <td class="text-center">
                                    
                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Active/Deactive User/Customer')))
                                        @if ($val->status == 1)
                                            <a href="{{ url('/deactive-customer/' . $id) }}" class="text-success"
                                                title="Deactivate"> <i data-feather="user"></i>  </a>
                                        @else
                                            <a href="{{ url('/active-customer/' . $id) }}" class="text-danger"
                                                title="Activate"> <i data-feather="user-x"></i> </a>
                                        @endif
                                    @endif

                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('View User/Customer')))
                                        @if ($val->purchase_type == 'tm')
                                            <a href="{{ route('tm.show',$val->id) }}" class="text-primary" title="View">
                                                <i data-feather="eye"></i>
                                            </a>
                                        @elseif ($val->purchase_type == 'ein')
                                            <a href="{{ route('ein.show',$val->id) }}" class="text-primary" title="View">
                                                <i data-feather="eye"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('/view-user/' . $id) }}" class="text-primary" title="View">
                                                <i data-feather="eye"></i>
                                            </a>
                                        @endif
                                    @endif

                                    {{-- @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit User/Customer')))
                                        <a href="{{ url('/edit-user/' . $id) }}" class="text-success" title="Edit">
                                            <i data-feather="edit"></i>
                                        </a>
                                    @endif --}}
                                    
                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Upload User/Customer Documents')))
                                        <a href="{{ route('up_document.show',$id) }}" class="text-secondary" title="Upload Document">
                                            <i data-feather="upload"></i>
                                        </a>
                                    @endif

                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Upload User/Customer Update')))
                                        <a href="{{ route('user_update_services.show',$id) }}" class="text-secondary" title="Update customer LLC or C Crop are complete or not">
                                            <i data-feather="edit-3"></i>
                                        </a>
                                    @endif

                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Delete User/Customer')))
                                        <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                            data-id="{{ $id }}" data-action="{{ url('/delete-user/' . $id) }}"
                                            title="Delete">
                                            <i data-feather="trash"></i>
                                        </a>
                                    @endif
                                    
                                </td>
                            </tr>
                              @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
