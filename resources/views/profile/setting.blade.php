@extends('layouts.app', ['title' => 'My Profile', 'cat_name' => 'profile', 'page_name' => 'my_profie'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> My Profile </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/update-profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Current Avatar </label>
                                <img src="{{ asset('users_imgs/'.$user->avatar1) }}" alt="User Image" style="width:100%;"/>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Upload Avatar <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="avatar1"
                                            class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ext_img" value="{{ $user->avatar1 }}">

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Name</label>
                                <input type="text" name="name" class="form-control" id="userName"
                                    placeholder="Enter Your Name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="userEmail"
                                    placeholder="Enter Your Email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Password</label>
                                <input type="text" name="password" class="form-control" id="userName"
                                    placeholder="Enter Your Password" value="{{ $user->decrypted_password }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Date Of Birth</label>
                                <input type="date" class="form-control" name="dob" id="userEmail"
                                    placeholder="Enter Your Date Of Birth" value="{{ $user->dob }}">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Phone</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "15" name="phone" class="form-control" id="userName"
                                    placeholder="Enter Your Phone No" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">Country</label>
                                <select name="country" class="form-control">
                                    <option selected disabled hidden> Select Country </option>
                                    @foreach (splitName()['countries'] as $item)
                                        @php
                                            $selected = $item == $user->country ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $item }}" {{ $selected }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">State</label>
                                <input type="text" name="state" class="form-control" id="userName"
                                    placeholder="Enter Your State" value="{{ $user->state }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="userEmail">City</label>
                                <input type="text" class="form-control" name="city" id="userEmail"
                                    placeholder="Enter Your City" value="{{ $user->city }}">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-12">
                                <label for="userName">Address</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="10" placeholder="Enter Your Address">{{ $user->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="userName">Postal Code</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "15" class="form-control" name="postal_code"
                                    value="{{ $user->postal_code }}" placeholder="Enter Your Postal Code">
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
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
