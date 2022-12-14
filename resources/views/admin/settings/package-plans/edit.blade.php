@extends('layouts.app', ['cat_name' => 'settings', 'page_name' => 'pkg_plans'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Edit Site Package Plan </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/update-pkg-plans') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        @php
                            $ids = json_decode($row->pkg_ids);
                        @endphp
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="serviceName">Package Plans</label>
                                <select name="pkg_ids[]" class="form-control tagging" multiple="multiple">
                                    @foreach ($packages as $pkg)
                                        @php
                                            $selected = '';
                                            foreach ($ids as $key => $val) {
                                                if ($pkg->id == $val) {
                                                    $selected = 'selected';
                                                }
                                            }
                                        @endphp
                                        <option value="{{ $pkg->id }}" {{ $selected }}>{{ $pkg->name }}</option>
                                    @endforeach
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
