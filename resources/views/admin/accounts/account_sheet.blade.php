@extends('layouts.app', ['cat_name' => 'accounts', 'page_name' => 'sales'])
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Purchase Package Profit & Loss</h3>
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
                            <th>Package</th>
                            <th>Revenue</th>
                            <th>Expenses</th>
                            <th>Profit</th>
                            <th>Loss</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($profitNloss))

                            @php
                                if(isset($profitNloss['loss'])){
                                    $loss = str_replace('-', '', $profitNloss['loss']);
                                }
                            @endphp
                            <tr>
                                <td>
                                    @if($profitNloss['package']->service_type == '')
                                        {{ $profitNloss['package']->package->type }}
                                    @endif
                                    @if($profitNloss['package']->service_type == 'EIN' || $profitNloss['package']->service_type == 'TM' || $profitNloss['package']->service_type == 'ETC')
                                       {{ $profitNloss['package']->service_type }}
                                    @endif
                                </td>
                                <td>{{ isset($profitNloss['total_pkg_amount']) ? '$' . $profitNloss['total_pkg_amount'] : '$0' }}</td>
                                <td>{{ isset($profitNloss['total_expense']) ? '$' . $profitNloss['total_expense'] : '$0' }}</td>
                                <td>{{ isset($profitNloss['profit']) ? '$' . $profitNloss['profit'] : '$0' }}</td>
                                <td>{{ isset($profitNloss['loss']) ? '$' . $loss : '$0' }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
