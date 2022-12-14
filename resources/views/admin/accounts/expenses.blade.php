@extends('layouts.app', ['cat_name' => 'accounts', 'page_name' => 'expenses'])
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Purchase Package Expenses</h3>
                                  {{-- {{ dd($d_pkg_id)}} --}}
                            <a href="{{ url('/add-expenses/'.$d_pkg_id) }}" class="btn btn-success float-right"> Add Expenses </a>
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
                            <th>Package</th>
                            <th>Purchase</th>
                            <th>Expense</th>
                            <th>description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($expenses))
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($expenses as $key => $expense)
                                @php
                                    $total += $expense->expense;
                                    $id = Crypt::encrypt($expense->id);
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $expense->service_type }}</td>
                                    <td>{{ $expense->purchase }}</td>
                                    <td>${{ $expense->expense }}</td>
                                    <td>{{ $expense->desc }}</td>
                                    <td>
                                        <a href="{{ url('/edit-expense/' . $id) }}" class="text-primary">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                            data-id="{{ $id }}" data-action="{{ url('/delete-expense/' . $id) }}">
                                            <i data-feather="trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>${{ $total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
