<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Support\Facades\Crypt;
use App\Models\Contact;
use App\Models\Statistic;
use App\Models\Package;
use App\Models\Draft;
use App\Models\Designer;
use App\Models\Order;
use App\Models\User;
use App\Models\Purchase;
use App\Models\Expense;
use App\Models\PackageService;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\UserRole;
use Twilio;
use Twilio\Http\Client;
use App\Models\AppProfile;
use Illuminate\Support\Facades\Hash;

class Setting
{
    public function services($type = NULL)
    {
        if (auth()->user() != NULL) {
            return Service::latest()->get();
        }
        return Service::latest()->limit(5)->get();
    }

    public function storeService($array)
    {
        $arr = array_keys($array);
        $service = new Service;
        foreach ($arr as $key => $val) {
            $service->$val  = $array[$val];
        }
        $service->save();
        return true;
    }


    public function serviceRow($id)
    {
        return Service::findOrFail($id);
    }

    public function updateService($array, $id)
    {
        $arr = array_keys($array);
        $service = Service::findOrFail($id);
        foreach ($arr as $key => $val) {
            $service->$val  = $array[$val];
        }
        $service->save();
        return true;
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return true;
    }

    public function storeContact()
    {
        $contact = new Contact;
        return $contact;
    }

    public function visitors()
    {
        return Contact::latest()->get();
    }

    public function show_visitor_msg($id)
    {
        return Contact::where('id', $id)->pluck('message')->first();
    }

    public function getVisitor($email)
    {
        if (!empty($email)) {
            return Contact::where('email', $email)->first();
        }
    }

    public function delete_visitor($id)
    {
        $status = 0;
        $visitor = Contact::findOrFail($id);
        return $visitor->delete();
    }

    public function delete_visitor_site($id)
    {
        $status = 0;
        $visitor = Statistic::findOrFail($id);
        return $visitor->delete();
    }

    public function saveStatistic($array)
    {
        $arr = array_keys($array);

        $statistic = new Statistic;
        foreach ($arr as $key => $val) {
            $statistic->$val    =  $array[$val];
        }
        $statistic->save();
        return true;
    }

    public function getVisitors()
    {
        return Statistic::latest()->get();
    }

    public function decrypt($id)
    {
        return Crypt::decrypt($id);
    }


    public function pkg($id = 0)
    {
        if (!empty($id)) {
            return Package::findOrFail($id);
        }

        return Package::latest()->first();
    }

    public function getPkgFeatures($ids)
    {
        return PackageService::whereIn('id', $ids)->get();
    }
    public function saveInDraft($array)
    {
        $draft = "";
        $arr = array_keys($array);
        $draft = Draft::where('visit_id', session()->get('visited'))->first();
        if ($draft == "" || $draft == NULL || empty($draft)) {
            $draft = new Draft;
        }

        foreach ($arr as $key => $val) {
            $draft->$val    =  $array[$val];
        }
        $draft->save();
        return $draft;
    }


    public function designers()
    {
        return Designer::latest()->get();
    }

    public function draft()
    {
        return Draft::first();
    }

    public function emailVerify($email)
    {
        return User::where('email', $email)->first();
    }

    public function notify()
    {
    }

    public function setOrderDetail($array)
    {
        $arr = array_keys($array);
        $order = new Order;
        foreach ($arr as $key => $val) {
            $order->$val    =  $array[$val];
        }
        $order->save();
        return true;
    }

    public function orderRow($val)
    {
        return Order::findOrFail($val);
    }
    public function upsertPurchaseDetail($array)
    {
        $arr = array_keys($array);
        if (!empty($array['id']) || $array['id'] != NULL || $array['id'] != 0) {
            $purchase = new Purchase;
        } else {
            $purchase = Purchase::findOrFail($array['id']);
        }

        foreach ($arr as $key => $val) {
            $purchase->$val    =  $array[$val];
        }

        $purchase->save();
        return true;
    }


    public function userPurchasedPkg()
    {
        // return Order::where('user_id', auth()->user()->id)->where('status', 'completed')->latest()->get();
        return Order::where('user_id', auth()->user()->id)->latest()->get();
    }

    public function purchasedPkg()
    {
        return Order::where('status', 'completed')->latest()->get();
    }
    
    public function userPaymentRecord()
    {
        return Purchase::where('user_id', auth()->user()->id)->latest()->get();
    }

    public function sales()
    {
        return Order::latest()->get();
    }

    public function draftC()
    {
        return Draft::where('visit_id', session()->get('visited'))->first();
    }

    public function emptyDraft()
    {
        return Draft::truncate();
    }

    public function userOrders()
    {
        return Order::where('user_id', auth()->user()->id)->get();
    }

    public function updateExpenses($array, $id)
    {
        $arr = array_keys($array);
        $expense = "";

        if (!empty($id)) {
            $expense = Expense::findOrFail($id);

            foreach ($arr as $key => $val) {
                $expense->$val  = $array[$val];
            }
            $expense->update();

        } else {
            $expense = new Expense;

            foreach ($arr as $key => $val) {
                $expense->$val  = $array[$val];
            }
            $expense->save();
        }
        return true;
    }

    public function getExpenses($id = 0)
    {
        if (!empty($id)) {
            return Expense::where('user_id', $id)->latest()->get();
        } else {
            return Expense::latest()->get();
        }
    }

    public function editExpense($id)
    {
        return Expense::findOrFail($id);
    }

    public function deleteExpense($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return true;
    }

    public function deleteSale($id)
    {
        $sale       =   Order::findOrFail($id);
        Expense::where('pkg_id', $sale->package->id)->delete();
        $sale->delete();
        return true;
    }
    public function getProfitNLoss($id)
    {
        $Expense_pkg = Expense::where('user_id',$id)->first(); 

        $data       =   [];
        $totalEx    =   0;
        $totalPkgAm =   0;
        $profit     =   0;
        $loss       =   0;
        $expenses   =   Expense::where('user_id', $id)->latest()->get();
        // $package =   $this->pkg($Expense_pkg->pkg);
        $package    =   Order::where('user_id', $id)->first();

        $data['expenses']   =   $expenses;
        $data['package']    =   $package;

        foreach ($expenses as $key => $val){
            $totalEx += $val->expense;
        }
        $data['total_expense']  =   $totalEx;

        $totalPkgAm = $package->amount;

        $data['total_pkg_amount'] = $totalPkgAm;

        $net = $totalPkgAm - $totalEx;

        if($totalPkgAm > $totalEx){
            $data['profit']    =   $net;
        }else{
            $data['loss']    =   $net;
        }

        return $data;
    }

    public function account_sheet()
    {
        return $this->purchasedPkg();
    }

    public function getRoles()
    {
        return Role::latest()->get();
    }

    public function upsertRole($array, $id)
    {
        $arr    =   array_keys($array);
        $role   =   "";
        if (!empty($id)) {
            $role   =   Role::findOrFail($id);
        } else {
            $role   =   new Role;
        }
        foreach ($arr as $key => $val) {
            $role->$val  = $array[$val];
        }
        $role->save();
        return true;
    }

    public function getRole($id)
    {
        return Role::findOrFail($id);
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return true;
    }

    public function permissions()
    {
        return Permission::latest()->get();
    }

    public function upsertPermission($array, $id)
    {

        $arr    =   array_keys($array);
        $perm   =   "";
        if (!empty($id)) {
            $perm   =   Permission::findOrFail($id);
        } else {
            $perm   =   new Permission;
        }
        foreach ($arr as $key => $val) {
            $perm->$val  = $array[$val];
        }
        $perm->save();
        return true;
    }

    public function getPermRow($id)

    {
        return Permission::findOrFail($id);
    }

    public function deletePermission($id)
    {
        $row = Permission::findOrFail($id);
        $row->delete();
        return true;
    }

    public function role_permissions()
    {
        return RolePermission::latest()->groupBy('role_id')->get();
    }

    public function getPermissionsByRole($role_id)
    {
        return RolePermission::where('role_id', $role_id)->get();
    }

    public function rprow($id)
    {
        $data = [];
        $data['rprow']          =   RolePermission::findOrFail($id);
        $data['permissions']    =   RolePermission::where('role_id', $data['rprow']->role_id)->get();
        return $data;
    }

    public function rpsById($role_id, $perm_id)
    {
        return RolePermission::where('role_id', $role_id)->where('permission_id', '!=', $perm_id)->get();
    }

    public function deleterp($id)
    {
        $rp = RolePermission::findOrFail($id);
        $rp->delete();
        return true;
    }

    public function add_user_role($user_id, $role_id)
    {
        $user_role = new UserRole;
        $user_role->user_id =   $user_id;
        $user_role->role_id =   $role_id;
        $user_role->save();
    }

    public function sendWhatsappMessage($toNumber, $messageBody)
    {
        $sid = env('TWILIO_SID'); // Your Account SID from www.twilio.com/console
        $token = env('TWILIO_AUTH_TOKEN'); // Your Auth Token from www.twilio.com/console

        $client = new Twilio\Rest\Client($sid, $token);
        $message = $client->messages->create(
            // 'whatsapp:' . $toNumber, // Text this number
            'whatsapp:+1512 846-7921', // Text this number
            [
                'from' => 'whatsapp:+14155238886', // From a valid Twilio number
                'body' => $messageBody
            ]
        );
    }


    public function allPkgs()
    {
        return Package::latest()->get();
    }

    public function updateSiteSettings($array)
    {
        $arr    =   array_keys($array);
        $data = AppProfile::latest()->get();
        if ($data->isNotEmpty()) {
            $AppProfile = AppProfile::first();
        } else {
            $AppProfile = new AppProfile;
        }
        foreach ($arr as $key => $val) {
            $AppProfile->$val  = $array[$val];
        }
        $AppProfile->save();
        return true;
    }

    public function sitePkgs($id = NULL)
    {
        if(!empty($id)){
            return AppProfile::where('id', $id)->first();
        }else{
            return AppProfile::latest()->get();
        }
    }

    public function removeSitePkg($id)
    {
        $AppProfile = AppProfile::findOrFail($id);
        $AppProfile->pkg_ids = NULL;
        $AppProfile->save();
        return true;
    }

    public function currentVisit($session)
    {
        return Draft::where('visit_id', $session)->first();
    }


    public function registerUser($obj)
    {
        
        $user = new User;
        $customer_id = '#SF'.rand(1,10000);
        $user->name = $obj->name;
        $user->email  = $obj->email;
        $user->password = Hash::make($obj->password);
        $user->decrypted_password = $obj->password;
        $user->company = $obj->company;
        $user->designer_id = $obj->designer_id;
        $user->userType = 'customer/user';
        $user->dob = $obj->dob;
        $user->phone = $obj->phone;
        $user->country = $obj->country;
        $user->state = $obj->state;
        $user->city = $obj->city;
        $user->address = $obj->address;
        $user->address2 = $obj->address2;
        $user->postal_code = $obj->postal_code;
        $user->gender = $obj->gender;
        $user->status = 1;
        $user->approved = 0;
        $user->forming = $obj->forming;
        $user->f_state = $obj->f_state;
        $user->members = $obj->members;
        $user->ownerships = $obj->ownership;

        $user->businesspurpose = $obj->businesspurpose;
        $user->cus_allow_sf_setBA = $obj->cus_allow_sf_setBA;
        $user->have_business_ad = $obj->have_business_ad;
        $user->business_address = $obj->business_address;
        $user->allow_sharp_to_provide_bAdress = $obj->allow_sharp_to_provide_bAdress;
        $user->allow_sharp_to_provide_bAdress = $obj->allow_sharp_to_provide_bAdress;
        $user->d_physical_business_bank_acc = $obj->d_physical_business_bank_acc;
        $user->d_paypal_business_acc = $obj->d_paypal_business_acc;
        $user->d_stripe_account_acc = $obj->d_stripe_account_acc;
        $user->d_CapitalOne_account_acc = $obj->d_CapitalOne_account_acc;
        $user->put_u_r_ITIN_for_bank_and_paypal_acc = $obj->put_u_r_ITIN_for_bank_and_paypal_acc;
        $user->put_u_r_SSN__for_bank_and_paypal_acc = $obj->put_u_r_SSN__for_bank_and_paypal_acc;
        $user->put_u_r__name_SSN_or_ITIN_passport_documents_acc = $obj->put_u_r__name_SSN_or_ITIN_passport_documents_acc;
        $user->put_u_r__address = $obj->put_u_r__address;
        $user->no_us_citizen_d_stripe_account_acc = $obj->no_us_citizen_d_stripe_account_acc;
        $user->no_us_citizen_d_CapitalOne_account_acc = $obj->no_us_citizen_d_CapitalOne_account_acc;
        $user->i_m_foregin_individual_not_h_socialSocurity_num = $obj->i_m_foregin_individual_not_h_socialSocurity_num;
        $user->i_m_foregin_individual_yes_h_socialSocurity_num_full_name = $obj->i_m_foregin_individual_yes_h_socialSocurity_num_full_name;
        $user->yes_socialSocurity_num_full_name = $obj->yes_socialSocurity_num_full_name;
        $user->no_socialSocurity_Us_citizen_iHAVE_ssn_or_itin = $obj->no_socialSocurity_Us_citizen_iHAVE_ssn_or_itin;
        $user->no_socialSocurity_Us_citizen_ssn = $obj->no_socialSocurity_Us_citizen_ssn;
        $user->no_socialSocurity_Us_citizen_itin = $obj->no_socialSocurity_Us_citizen_itin;
        $user->no_socialSocurity_Us_citizen_name_as_per_ssn_or_itin = $obj->no_socialSocurity_Us_citizen_name_as_per_ssn_or_itin;
        $user->save_my_information_feture_purchase = $obj->save_my_information_feture_purchase;
        $user->customer_id = $customer_id;

        $user->coupon_id = $obj->coupon_id;
        $user->before_coupon_apply_amount = $obj->before_coupon_apply_amount;
        $user->coupon_status = $obj->coupon_status;
        $user->package_fee = $obj->package_fee;



        $user->save();
        return $user;

    }
}
