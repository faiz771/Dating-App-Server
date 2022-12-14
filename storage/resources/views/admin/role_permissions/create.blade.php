@extends('layouts.app', ['cat_name' => 'roles_perm', 'page_name' => 'role_perm'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Assign Permission </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/save-role-permissions') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="purchase">Role</label>
                                <select class="form-control tagging" name="role_id">
                                    <option hidden disabled selected>--- Select Role ---</option>
                                    @if (!empty(SF::roles()))
                                        @foreach (SF::roles() as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
 
                        

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="expense">Permission</label>
                                <select class="form-control tagging" name="permission_id[]" multiple="multiple">
                                    @if (!empty(SF::permissions()))
                                        @foreach (SF::permissions() as $val)
                                            <option value="{{ $val->id }}" {{ old('services') == $val ? 'selected' : '' }}>
                                                {{ $val->name }}
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
