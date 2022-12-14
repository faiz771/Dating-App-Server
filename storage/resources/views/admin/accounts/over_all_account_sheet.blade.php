@extends('layouts.app', ['cat_name' => 'accounts', 'page_name' => 'account_sheet'])
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3 class="float-left">Profit & Loss Balance Sheet</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">

                {{-- <table id="html5-extension" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Package</th>
                            <th>Revenue</th>
                            <th>Expenses</th>
                            <th>Profit</th>
                            <th>Loss</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($sales))

                            @php
                                $revenue = 0;
                                $expense = 0;
                                $profit = 0;
                                $loss = 0;
                                $tr = 0;
                                $te = 0;
                            @endphp

                            @foreach ($sales as $key => $sale)
                                @if(!empty($sale))
                                            @php
                                                $revenue    +=  $sale->amount;
                                                $expense     =   SF::getExpenses($sale->package->id);
                                                $tr += $revenue;
                                                $te += $expense;

                                                $agg         =   SF::getProfitOrLoss($revenue,$expense);

                                                if(isset($agg['profit'])){
                                                    $pr = $agg['profit'];
                                                    $profit += $pr;
                                                }

                                                if(isset($agg['loss'])){
                                                    $losss = str_replace('-', '', $agg['loss']);
                                                    $loss +=  $losss;
                                                }
                                            @endphp
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $sale->package->type }}</td>
                                            <td>${{ $revenue }}</td>
                                            <td>${{ $expense }}</td>
                                            <td>{{ (isset($agg['profit'])) ? '$'.$pr : '0'; }}</td>
                                            <td>{{ (isset($agg['loss'])) ? '$'.$losss : '0'; }}</td>
                                        </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>${{ $tr }}</th>
                            <th>${{ $te }}</th>
                            <th>{{ ($profit !== 0) ? '$'.$profit : '0'; }}</th>
                            <th>{{ ($loss !== 0) ? '$'.$loss : '0'; }}</th>
                        </tr>
                    </tfoot>
                </table> --}}

                <table id="html5-extension" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Sale</th>
                            <th>Expenses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($sales))

                            @php
                                $revenue = 0;
                                $expense = 0;
                                $profit = 0;
                                $loss = 0;
                                $tr = 0;
                                $te = 0;
                                $n = 1;
                                $t_sale = 0;
                                $t_sale_expense_cal = 0;  
                            @endphp

                            @foreach ($sales as $key => $sale)
                                @if(!empty($sale))
                                        @php
                                            $t_sale_expenses = App\Models\Expense::where('pkg_id',$sale->package_id)->get(); 
                                            if(!empty($sale->coupon_id)){
                                            $sale_am = $sale->before_assign_coupon_amount;
                                            }else{
                                                $sale_am = $sale->amount;
                                            }
                                            
                                            
                                            $t_sale = $t_sale + $sale_am;     
                                        @endphp

                                        @if(!empty($t_sale_expenses))
                                            @foreach ($t_sale_expenses as $key => $t_sale_expense)
                                                @if(!empty($t_sale_expense))
                                                    @php
                                                        $t_sale_expense_cal = $t_sale_expense_cal + $t_sale_expense->expense;     
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                   @endif
                                @endforeach
                                
                            @endif

                            {{-- Sale Expense --}}
                                        <tr>
                                            <td>{{ $n ++ }}</td>
                                            <td>Sale</td>
                                            <td>{{ (isset($t_sale)) ? '$'.$t_sale : '0'; }}</td>
                                            <td>${{ $t_sale_expense_cal }}</td>
                                        </tr>
                            {{-- Employee Expense --}}

                           @foreach($emp_expenses as $emp_expense)
                                @php 
                                    $t_emp_exp = $t_emp_exp + $emp_expense->expense;
                                @endphp
                           @endforeach

                                <tr>
                                    <td>{{ $n ++ }}</td>
                                    <td>Employee</td>
                                    <td>$0</td>
                                    <td>${{$t_emp_exp}}</td>
                                </tr>

                                {{-- Company Expense --}}
                           @foreach($com_expenses as $com_expense)
                                @php 
                                    $t_com_exp = $t_com_exp + $com_expense->expense;
                                @endphp
                           @endforeach

                              <tr>
                                  <td>{{ $n ++ }}</td>
                                  <td>Company</td>
                                  <td>$0</td>
                                  <td>${{$t_com_exp}}</td>
                              </tr>
                    </tbody>

                @php 
                    $total_expense_calculate = $t_emp_exp + $t_com_exp + $t_sale_expense_cal;

                    // Set profit and Lose

                    $revenue    +=  $t_sale;
                    $expense     =  $total_expense_calculate;
                    $tr += $revenue;
                    $te += $expense;
                    
                    $agg        =   SF::getProfitOrLoss($revenue,$expense);

                    if(isset($agg['profit'])){
                        $pr = $agg['profit'];
                        $profit += $pr;
                    }

                    if(isset($agg['loss'])){
                        $losss = str_replace('-', '', $agg['loss']);
                        $loss +=  $losss;
                    }

                    // Set profit lose 
                @endphp
                    {{-- Total exp profit lose --}}

                    <tfoot class="text-right">
                        <tr>
                            <td colspan="3" align="right"><h5><b>Profit & Lose :</b></h5></td>
                            <td><h5><b>
                                @if(!empty($loss) || !empty($profit))
                                {{ ($loss !== 0) ? '$'.$loss : ''; }}</b> <b>{{ ($profit !== 0) ? '$'.$profit : ''; }}</b></h5></td>
                                @else
                                0
                                @endif
                            </tr>
                    </tfoot>

                    <tfoot class="text-right">
                        <tr>
                            <td colspan="3" align="right"><h5><b>Total Expense  :</b></h5></td>
                            <td><h5><b>{{ (isset($total_expense_calculate)) ? '$'.$total_expense_calculate : '0'; }}</b></h5></td>
                        </tr>
                    </tfoot>

                    <tfoot class="text-right">
                        <tr>
                            <td colspan="3" align="right"><h5><b>Total Sale :</b></h5></td>
                            <td><h5><b>{{ ($t_sale !== 0) ? '$'.$t_sale : '0'; }}</b></h5></td>
                        </tr>
                    </tfoot>
                    
                    {{-- Total exp profit lose --}}

                </table>

            </div>
        </div>
    </div>

@endsection
