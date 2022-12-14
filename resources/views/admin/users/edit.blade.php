@extends('layouts.app', ['title' => 'Edit User', 'cat_name' => 'users', 'page_name' => 'edit_user'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Edit User Info</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/update-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row mb-4">
                            <div class="form-group col-md-12">
                                <label for="userStatus">Purchased Packages</label>
                                <select name="pkg_id" id="userStatus" class="form-control">
                                    <option selected hidden disabled>--- Select Package ---</option>
                                    @if (!empty($packages))
                                        @foreach ($packages as $pkg)
                                            <option value="{{ $pkg->id }}"
                                                {{ $user->pkg_id == $pkg->id ? 'selected' : '' }}> {{ $pkg->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option disabled>Package Not Found</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Name</label>
                                <input type="text" name="name" class="form-control" id="userName"
                                    value="{{ $user->name }}" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    id="userEmail" placeholder="Enter Email">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Password</label>
                                <input type="text" name="decrypted_password" class="form-control" id="userName"
                                    value="{{ $user->decrypted_password }}" placeholder="Enter Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Date Of Birth</label>
                                <input type="date" class="form-control" name="dob" value="{{ $user->dob }}"
                                    id="userEmail">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Phone</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "15" maxlength="13" class="form-control" id="userName"
                                    value="{{ $user->phone }}" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Country</label>
                                <select name="country" class="form-control">
                                    <option selected disabled hidden> Select Country </option>
                                    @foreach (splitName()['countries'] as $item)
                                        @php
                                            $selected = $item == $user->country ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $item }}" {{ $selected }}>{{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">State</label>
                                <input type="text" name="state" class="form-control" id="userName"
                                    value="{{ $user->state }}" placeholder="Enter State">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">City</label>
                                <input type="text" class="form-control" name="city" value="{{ $user->city }}"
                                    id="userEmail" placeholder="Enter City">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-12">
                                <label for="userName">Address</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="10" placeholder="Enter Address">{{ $user->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Postal Code</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "15" class="form-control" name="postal_code"
                                    value="{{ $user->postal_code }}" placeholder="Enter Postal Code">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="userName">Gender</label>
                                <select name="gender" class="form-control">
                                    <option selected disabled hidden> Select Gender </option>
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' ; }}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' ; }}>Female</option>
                                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' ; }}>Other</option>
                                </select>
                            </div>
                        </div>


                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
