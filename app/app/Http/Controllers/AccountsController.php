<?php

namespace App\Http\Controllers;

use App\Models\Ein_Services;
use Illuminate\Http\Request;
use App\Repositories\Setting;
use App\Models\Package;
use App\Models\Order;
use App\Models\Expense;
use App\Models\Employee_exp;
use App\Models\Purchase;
use App\Models\TM_service;
use Crypt;

class AccountsController extends Controller
{
    protected $setting, $input;
    public function __construct(Setting $s, Request $r)
    {
        $this->setting      =   $s;
        $this->input        =   $r;
    }


    public function sales()
    {
        $data = [
            'sales'     =>  $this->setting->sales()
        ];
        return view('admin.accounts.sales', $data);
    }

    public function deleteSale($val)
    {
        $id = $this->setting->decrypt($this->input->id);
        $this->setting->deleteSale($id);
        return back()->with('delete', 'Sale Delete Successfully');
    }
    public function expenses($val)
    {
        $id = $this->setting->decrypt($val);

        $data = [
            'expenses'      =>      $this->setting->getExpenses($id),
            'd_pkg_id'      =>      $val,
            'e_pkg_id'      =>      $id,
        ];

        return view('admin.accounts.expenses', $data);
    }

    public function sheet($val)
    {
        $id = $this->setting->decrypt($val);
        $data = [
            'profitNloss'   =>  $this->setting->getProfitNLoss($id)
        ];
        return view('admin.accounts.account_sheet', $data);
    }

    public function account_sheet()
    {
        $data = [
            'sales'   =>  $this->setting->account_sheet(),
            'sales_expense'   => Expense::all(),
            'emp_expenses'   =>  Employee_exp::where('status','employee')->get(),
            'com_expenses'   =>  Employee_exp::where('status','company')->get(),
            't_emp_exp'   =>  0,
            't_com_exp'   =>  0,
        ];
        return view('admin.accounts.over_all_account_sheet',$data);
    }

    public function addExpense($val)
    {

        $id     =   $this->setting->decrypt($val);
        $purchase_id = Purchase::where('user_id',$id)->first(); 
        $order  = Order::where('user_id',$id)->first(); 

if($order->service_type == 'TM'){
    $pkg  = TM_service::findOrFail($order->package_id);

}elseif($order->service_type == 'EIN'){
    $pkg  = Ein_Services::findOrFail($order->package_id);
}else{
    $pkg  =  $this->setting->pkg($purchase_id->pkg_id);
}

        if($order->service_type == 'EIN' || $order->service_type == 'TM' || $order->service_type == 'ETC'){
           $service_type = $order->service_type;
        }else{
            $service_type = $pkg->type;
        }

        $data   = [
            'pkg'   =>  $pkg,
            'amount'   =>  $order->amount,
            'user_id'   =>  $id,
            'service_type'   =>  $service_type,
        ];
        
        return view('admin.accounts.add_expense', $data);
    }


    public function saveExpenses()
    {
        $this->input->validate([
            'purchase'  =>  'required',
            'expense'   =>  'required'
        ]);

        $id     =   $this->input->post('id');
        $alert = [];
        if (!empty($id)) {

            $expense_user_id = Expense::findOrFail($id);
            $for_user_id =  $expense_user_id->user_id;
            $alert = ['success' => 'Expenses Updated Successfully'];
        } else{
            $alert = ['success' => 'Expenses Added Successfully'];
            $for_user_id =  $this->input->post('user_id');
        }

        $data  =  [
            'pkg_id'    =>  $this->input->post('pkg_id'),
            'purchase'  =>  $this->input->post('purchase'),
            'expense'   =>  $this->input->post('expense'),
            'user_id'   =>  $for_user_id,
            'desc'   =>  $this->input->post('desc'),
            'service_type'   =>  $this->input->post('service_type'),
        ];

        $saveExpenses = $this->setting->updateExpenses($data, $id);

        $uid = Crypt::encrypt($for_user_id);

        if ($saveExpenses) {
            // return redirect(url('/accounts/sales'))->with($alert);
            return redirect(url('/accounts/expenses/'.$uid))->with($alert);
        } else {
            // return redirect(url('/accounts/sales'))->with('error', 'Something Went Wrong');
            return redirect(url('/accounts/expenses/'.$uid))->with('error', 'Something Went Wrong');
        }
    }

    public function editExpense($val)
    {
        $id = $this->setting->decrypt($val);
        $data = [
            'expense'   =>  $this->setting->editExpense($id)
        ];
        return view('admin.accounts.edit_expense', $data);
    }

    public function deleteExpense($id)
    {
        $id = $this->setting->decrypt($this->input->id);
        $this->setting->deleteExpense($id);
        return back()->with('delete', 'Expense Delete Successfully');
    }
}
