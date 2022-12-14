@extends('layouts.app', ['title' => 'Employee', 'cat_name' => 'roles_perm', 'page_name' => 'view_emp'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Manage Employee</h3>
                            @if (auth()->user()->id == 1 || !empty(SF::getPermission('Create User/Customer')))
                                <a href="{{ url('/add-user') }}" class="btn btn-success float-right"> Add Employee </a>
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Salary</th>
                            <th>Employee id</th>
                            {{-- <th>Package</th> --}}
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

                            @if(!empty($users_roles))
                              @if($users_roles->user_id == $val->id)
                              
                            <tr>
                                <td> {{ $n++ }} </td>
                                <td> {{ $val->name }} </td>
                                <td> {{ $val->email }} </td>
                                <td> {{ $val->phone }} </td>
                                <td> {!! SF::getRole($val->id) !!} </td>
                                <td> {{ $val->salary }} </td>
                                <td> {{ $val->employee_id }} </td>

                                {{-- <td> {{ isset($val->package_id->name) ? $val->package_id->name :''}} </td> --}}

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
    
                                    {{-- @if (auth()->user()->id == 1 || !empty(SF::getPermission('View User/Customer')))
                                        <a href="{{ url('/view-user/' . $id) }}" class="text-primary" title="View">
                                            <i data-feather="eye"></i>
                                        </a>
                                     @endif --}}

                                    @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit User/Customer')))
                                        <a href="{{ url('/edit_emp/' . $id) }}" class="text-success" title="Edit">
                                            <i data-feather="edit"></i>
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
                          @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
