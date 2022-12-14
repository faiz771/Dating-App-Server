<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Setting;
use App\Models\State;
use App\Models\User;
use App\Models\Package;
use App\Models\Testimonial;
use Stevebauman\Location\Facades\Location;
use Jenssegers\Agent\Agent;
use Artisan;

class FrontController extends Controller
{
    protected $setting, $input;
    public function __construct(Setting $setting, Request $req)
    {
        $this->setting  =   $setting;
        $this->input    =   $req;
    }

    public function index()
    {
        $array = [];
        $location   =   Location::get($this->input->ip());
        $agent      =   new Agent();
        if ($location && $agent) {
            $array = [
                'device'        =>  $agent->device(),
                'location'      =>  $location->cityName . ',' . $location->regionName . ',' . $location->countryName,
                'ip'            =>  $this->input->ip(),
                'latitute'      =>  $location->latitude,
                'logitude'      =>  $location->longitude,
                'browser'       =>  $agent->browser(),
                'platform'      =>  $agent->platform(),
            ];

            $this->setting->saveStatistic($array);
        }

        $data = [
            'services'  =>  $this->setting->services()
        ];
        
        User::whereDate('coupon_expiry','<',today())->update(['coupon_status'=>'2']);

        return view('landing_page.index', $data);
    }

    public function get_started($pkg_id = 0)
    {
           // Total testimonial rating
           $average_rating = 0;
           $total_review = 0;
           $total_user_rating = 0;
           $review_content = array();

           $reviews = Testimonial::orderBy('id', 'DESC')->get();
           
           foreach($reviews as $review)
           {
               $review_content[] = array(
                   'rating'		=>	$review["rating"],
                   'datetime'		=>	date('m-d-Y h:i:s a ', strtotime($review->created_at)),
               );
       
               $total_review++;
       
               $total_user_rating = $total_user_rating + $review["rating"];
           }
       
           $data = [
               'average_rating'	=>	number_format($average_rating, 1),
               'total_review'		=>	$total_review,
               'review_data'		=>	$review_content,
               'total_user_rating'		    =>	$total_user_rating,
               'count_star'		=>	0
           ];

           // Total testimonial rating
           
        if (!empty($pkg_id)){
                $data = [
                    'package'       =>  $this->setting->pkg($pkg_id),
                    'designers'     =>  $this->setting->designers(),
                    'draftC'         =>  $this->setting->draftC()
                ];
                return view('landing_page.launch_my_llc', $data);
        }


        if (!empty($this->input->pkg_id)){

            $draft = [
                'forming'       =>      $this->input->forming,
                'f_state'       =>      $this->input->f_state,
            ];
            $this->setting->saveInDraft($draft);
            $data = [
                'package'       =>  $this->setting->pkg($this->input->pkg_id),
                'designers'     =>  $this->setting->designers(),
                'draft'         =>  $this->setting->draft()
            ];
// dd($this->input->pkg_id);
            return view('landing_page.launch_my_llc', $data);
        }

        $data = [
            'package'   =>  $this->setting->pkg()
        ];

        if(!empty($data['package'])){

            return view('landing_page.get_started', $data);
        }else{

            return back()->with('error', 'Package not found');
        }

    }

    public function savingInDraft()
    {

        $data = [
            'name'          =>      $this->input->form['name'],
            'email'         =>      $this->input->form['email'],
            'gender'        =>      $this->input->form['gender'],
            'dob'           =>      $this->input->form['dob'],
            'phone'         =>      $this->input->form['phone'],
            'address'       =>      $this->input->form['address'],
            'address2'      =>      (isset($this->input->form['address2'])) ? $this->input->form['address2'] : NULL,
            'city'          =>      $this->input->form['city'],
            'state'         =>      $this->input->form['state'],
            'country'       =>      $this->input->form['country'],
            'postal_code'   =>      $this->input->form['postal_code'],
            'company'       =>      $this->input->form['company'],
            'designer_id'   =>      $this->input->form['designer_id'],
            'members'       =>      json_encode($this->input->form['members']),
            'ownership'     =>      json_encode($this->input->form['ownership']),
            'password'      =>      $this->input->form['password'],

            'business_address'      =>      (isset($this->input->form['business_address'])) ? $this->input->form['business_address'] : NULL,
            'businesspurpose'       =>      (isset($this->input->form['business_purpose'])) ? $this->input->form['business_purpose'] : NULL,
            'cus_allow_sf_setBA'    =>      (isset($this->input->form['sf_provide_u_r_BA'])) ? $this->input->form['sf_provide_u_r_BA'] : NULL,
            'have_business_ad'      =>      (isset($this->input->form['d_h_a_business_address'])) ? $this->input->form['d_h_a_business_address'] : NULL,
            'allow_sharp_to_provide_bAdress'      =>      (isset($this->input->form['sf_provide_u_r_BA'])) ? $this->input->form['sf_provide_u_r_BA'] : NULL,
            'are_you_us_citizen'      =>      (isset($this->input->form['us_citizen'])) ? $this->input->form['us_citizen'] : NULL,
            'd_physical_business_bank_acc'      =>      (isset($this->input->form['physical_back_account'])) ? $this->input->form['physical_back_account'] : NULL,
            'd_paypal_business_acc'      =>      (isset($this->input->form['paypal_business_account'])) ? $this->input->form['paypal_business_account'] : NULL,
            'd_stripe_account_acc'      =>      (isset($this->input->form['stripe_account_need'])) ? $this->input->form['stripe_account_need'] : NULL,
            'd_CapitalOne_account_acc'      =>      (isset($this->input->form['capitalOne_account_need'])) ? $this->input->form['capitalOne_account_need'] : NULL,
            'put_u_r_ITIN_for_bank_and_paypal_acc'      =>      (isset($this->input->form['itin'])) ? $this->input->form['itin'] : NULL,
            'put_u_r_SSN__for_bank_and_paypal_acc'      =>       (isset($this->input->form['ssn'])) ? $this->input->form['ssn'] : NULL,
            'put_u_r__name_SSN_or_ITIN_passport_documents_acc'      =>      (isset($this->input->form['put_name_for_ssn_itin_passport'])) ? $this->input->form['put_name_for_ssn_itin_passport'] : NULL,
            'put_u_r__address'      =>      (isset($this->input->form['put_address_for_ssn_itin_passport'])) ? $this->input->form['put_address_for_ssn_itin_passport'] : NULL, 
            'no_us_citizen_d_stripe_account_acc'      =>      (isset($this->input->form['need_stripe_account'])) ? $this->input->form['need_stripe_account'] : NULL,
            'no_us_citizen_d_CapitalOne_account_acc'      =>     (isset($this->input->form['need_capitalOne_account'])) ? $this->input->form['need_capitalOne_account'] : NULL,
            'i_m_foregin_individual_not_h_socialSocurity_num'      =>      (isset($this->input->form['social_security_number'])) ? $this->input->form['social_security_number'] : NULL,
            'yes_socialSocurity_num_full_name'      =>      (isset($this->input->form['ein_full_name'])) ? $this->input->form['ein_full_name'] : NULL,
            'no_socialSocurity_Us_citizen_iHAVE_ssn_or_itin'      =>      (isset($this->input->form['im_Us_citizen_have_ssn_or_itin'])) ? $this->input->form['im_Us_citizen_have_ssn_or_itin'] : NULL, 
            'no_socialSocurity_Us_citizen_ssn'      =>     (isset($this->input->form['us_citizen_name_ssn'])) ? $this->input->form['us_citizen_name_ssn'] : NULL,
            'no_socialSocurity_Us_citizen_itin'      =>       (isset($this->input->form['us_citizen_name_itin'])) ? $this->input->form['us_citizen_name_itin'] : NULL,
            'no_socialSocurity_Us_citizen_name_as_per_ssn_or_itin'      =>     (isset($this->input->form['name_ssn_or_itin'])) ? $this->input->form['name_ssn_or_itin'] : NULL,
            'save_my_information_feture_purchase'      =>      (isset($this->input->form['save_info_for_next_time_purchase'])) ? $this->input->form['save_info_for_next_time_purchase'] : NULL,
            
        ];

        $save = $this->setting->saveInDraft($data);

        if($save){
            echo "saved";
        }
    }

    public function draftRow()
    {
        return $this->setting->draft();
    }

    public function emailVerify()
    {
        $email  =   $this->setting->emailVerify($this->input->email);
        $data = [];
        if ($email != NULL) {
            $data = [
                'status' => 500,
                'error' => 'Email already exist please login to continue'
            ];
        } elseif (!filter_var($this->input->email, FILTER_VALIDATE_EMAIL)) {
            $data = [
                'status'        =>  500,
                'error'         =>  'Please Enter Valid Email'
            ];
        } else {
            $data = [
                'status'    =>  200,
                'success'   =>  'Email is correct'
            ];
        }

        return response()->json($data);
    }

    public function startOver()
    {
        if (session()->has('visited')){
            session()->pull('visited');
            // $this->setting->emptyDraft();
        }  

        $data = [
            'package'   =>  $this->setting->pkg()
        ];

        return view('landing_page.get_started', $data);
        // return redirect(url('/launch-my-llc'));
    }

    public function continue()
    {
        $data = [
            'package'       =>  $this->setting->pkg($this->input->pkg_id),
            'designers'     =>  $this->setting->designers(),
            'draft'         =>  $this->setting->draftC()
        ];
        $view = view('landing_page.launch_my_llc', $data)->render();
        return response()->json(['view' => $view]);
    }

    public function getPkgFeatures()
    {
        $id             =   $this->input->id;
        $pkg            =   $this->setting->pkg($this->input->pkg_id);
        $service_ids    =   json_decode($pkg->service_ids);
        return $this->setting->getPkgFeatures($service_ids);
    }


    public function sitePkgs()
    {
        $data = [
            'packages'  =>  $this->setting->allPkgs(),
            'site_pks'  =>  $this->setting->sitePkgs()
        ];

        return view('admin.settings.package-plans.index', $data);
    }

    public function setPkgPlan()
    {
        $data = [
            'packages' => $this->setting->allPkgs()
        ];

        return view('admin.settings.package-plans.create', $data);
    }

    public function updateSidePkgPlans()
    {
        $data = [
            'pkg_ids'   =>  json_encode($this->input->pkg_ids)
        ];
        $this->setting->updateSiteSettings($data);
        return redirect(url('/web-pkgs'))->with('success', 'Package plans setting updated');
    }

    public function editSitePkgPlan($val)
    {
        $id = $this->setting->decrypt($val);

        $data = [
            'packages'  =>  $this->setting->allPkgs(),
            'row'       =>  $this->setting->sitePkgs($id)
        ];

        return view('admin.settings.package-plans.edit', $data);
    }

    public function newpage1()
    {
        $states = State::all();
        $packages = Package::all();
        return view('newPage.page2',compact('states','packages'));
    }

    public function deleteSitePkgPlan()
    {
        $id = $this->setting->decrypt($this->input->id);
        $this->setting->removeSitePkg($id);
        return back()->with('delete', 'Site package plans removed successfully');
    }
}
