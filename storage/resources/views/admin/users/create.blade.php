@extends('layouts.app', ['title' => 'Create Employee', 'cat_name' => 'roles_perm', 'page_name' => 'add_emp'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Add Employee</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/save-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Name</label>
                                <input type="text" name="name" class="form-control" id="userName"
                                    placeholder="Enter Name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="userEmail"
                                    placeholder="Enter Email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            
                            <div class="form-group col-md-6">
                                <label for="userEmail">Phone</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "20" class="form-control" name="phone" id="phone"
                                    placeholder="Enter Phone" value="{{ old('phone') }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="userEmail">Salary</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "20" class="form-control" name="salary" id="salary"
                                    placeholder="Enter Salary" value="{{ old('salary') }}" required>
                            </div>

                            {{-- <div class="form-group col-md-6">
                                <label for="userStatus">Packages</label>
                                <select name="pkg_id" id="userStatus" class="form-control tagging">
                                    <option selected hidden disabled>--- Select Package ---</option>
                                    @if (!empty($packages))
                                        @foreach ($packages as $pkg)
                                            <option value="{{ $pkg->id }}"
                                                {{ old('pkg_id') == $pkg->id ? 'selected' : '' }}> {{ $pkg->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div> --}}

                            <div class="form-group col-md-6">
                                <label for="userRole">Role</label>
                                 <select name="role" id="userRole" class="form-control tagging" required>
                                    <option selected hidden disabled>--- Select Role ---</option>
                                    @if (!empty(SF::roles()))
                                        @foreach (SF::roles() as $val)
                                            <option value="{{ $val->id }}"
                                                {{ old('role') == $val->id ? 'selected' : '' }}> {{ $val->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
