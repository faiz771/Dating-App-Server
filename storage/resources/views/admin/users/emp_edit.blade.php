@extends('layouts.app', ['title' => 'Edit Employee', 'cat_name' => 'roles_perm', 'page_name' => 'add_emp'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4>Edit Employee</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/update_emp') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Name</label>
                                <input type="text" name="name" class="form-control" id="userName"
                                    placeholder="Enter Name" value="{{ $emp->name }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="userEmail"
                                    placeholder="Enter Email" value="{{ $emp->email }}" required>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            
                            <div class="form-group col-md-6">
                                <label for="userEmail">Phone</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "15" class="form-control" name="phone" id="phone"
                                    placeholder="Enter Phone" value="{{ $emp->phone }}" required>
                            </div>

                               

                            <div class="form-group col-md-6">
                                <label for="userRole">Role</label>
                                 <select name="role" id="userRole" class="form-control tagging" required>
                                    @if (!empty(SF::roles()))
                                        @foreach (SF::roles() as $val)
                                            <option value="{{ $val->id }}"
                                                {{ $role_id->role_id == $val->id ? 'selected' : '' }}> {{ $val->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="text" name="decrypted_password" class="form-control" id="password"
                                    placeholder="Password" value="{{ $emp->decrypted_password }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Salary</label>
                                <input type="text" name="salary" class="form-control" id="salary"
                                    placeholder="Enter Salary" value="{{ $emp->salary }}" required>
                            </div>

                            <input type="hidden" name="id" value="{{ $emp->id }}">

                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
