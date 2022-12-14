@extends('layouts.app', ['cat_name' => 'accounts', 'page_name' => 'add_expense'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4> Edit Purchase & Expense </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ url('/save-expenses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pkg_id" value="{{ $expense->pkg_id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="purchase">Package</label>
                                <input type="text" name="purchase" class="form-control text-dark" id="purchase"
                                    value="{{ $expense->package->type }}" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="purchase">Purchase</label>
                                <input type="text" name="purchase" class="form-control" id="purchase" placeholder="Enter Purchase" value="{{ $expense->purchase }}" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="expense">Expense</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "20" class="form-control" id="expense" name="expense" placeholder="Enter Expense" value="{{ $expense->expense }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="desc">Description</label>
                                <input type="text" name="desc" class="form-control" id="desc" placeholder="Enter Description" value="{{ $expense->desc }}">
                            </div>

                        </div>
                        <input type="hidden" name="id" value="{{ $expense->id }}">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
