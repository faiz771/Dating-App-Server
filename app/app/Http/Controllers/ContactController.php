<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Designer;
use Illuminate\Http\Request;
use App\Repositories\Setting;
use App\Models\User;
use App\Models\EIN;
use App\Models\TM;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Notifications\ContactUs;
use App\Notifications\ContactSiteVisitor;
use Twilio;
// use Twilio\Http\Client;
use Twilio\Rest\Client;
class ContactController extends Controller
{
    protected $setting, $input, $admin;
    public function __construct(Setting $setting, Request $req)
    {
        $this->setting  =   $setting;
        $this->input    =   $req;
        $this->admin    =   User::where('id', 1)->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'visitors'  =>  $this->setting->visitors()
        ];
        return view('admin.contact_msgs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('ContactUs.index');
    }
    
    public function ein_service_Form()
    {
        $faqs =  Faq::where('type','EIN')->get();
        $designers =  Designer::all();
        $eins =  EIN::where('status',0)->first();
        $n =  1;

        $data = [
            'faqs'  =>  $faqs,
            'eins'  =>  $eins,
            'designers'  =>  $designers,
            'n'  =>  $n
        ];
        return view('EIN_service.index',$data);
    }

    public function ein_service_Form_open()
    {
        $faqs =  Faq::where('type','EIN')->get();
        $designers =  Designer::all();
        $eins =  EIN::where('status',0)->first();
        $n =  1;

        $data = [
            'faqs'  =>  $faqs,
            'eins'  =>  $eins,
            'designers'  =>  $designers,
            'n'  =>  $n
        ];
        return view('EIN_service.order_now',$data);
    }

    public function tm_index()
    {
        $faqs =  Faq::where('type','TM')->get();
        $tms =  TM::all();
        $n =  1;

        $data = [
            'faqs'  =>  $faqs,
            'tms'  =>  $tms,
            'n'  =>  $n
        ];
        return view('TM_serves.index',$data);
    }

    public function tm_service_Form()
    {
        $faqs =  Faq::where('type','TM')->get();
        $designers =  Designer::all();
        $tms =  TM::where('status',0)->first();
        $n =  1;

        $data = [
            'faqs'  =>  $faqs,
            'tms'  =>  $tms,
            'designers'  =>  $designers,
            'n'  =>  $n
        ];
        return view('TM_serves.tm_form',$data);
    }


    public function landingpageAboutUs()
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
                'count_star'		=>	0,
                'reviews'		=>	$reviews,
            ];

        return view('aboutUs.index',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->name == 'Crytocep'){
            $this->input->validate([
                'name'      =>  'required',
                'email'     =>  'required',
                'subject'   =>  'required',
                'message'   =>  'required'
            ]);
    
            if (!filter_var($this->input->email, FILTER_VALIDATE_EMAIL)) {
                return back()->with('error', 'Email is invalid');
            }
    
            $service            =   $this->setting->storeContact();
            $service->name      =   $this->input->name;
            $service->email     =   $this->input->email;
            $service->phone     =   $this->input->phone;
            $service->subject   =   $this->input->subject;
            $service->message   =   $this->input->message;
            $service->save();
            $data   =   [
                'message'   =>  $service->name . ' sent you message using ' . config('app.name')
            ];
            $this->admin->notify(new ContactUs($data));
            return back()->with('success', 'Your message has forwarded to admin');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $id     = $this->input->id;
        $delete = $this->setting->delete_visitor($id);
        if ($delete) {
            return back()->with('delete', 'Visitor Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong');
        }
    }


    public function get_visitor_msg()
    {
        $id = $this->input->id;
        return $this->setting->show_visitor_msg($id);
    }

    public function sendMail()
    {
        $visitor    =   $this->setting->getVisitor($this->input->email);
        $data       =   [
            'body'   =>  $this->input->body
        ];
        sendEmail($visitor->email, 'Message from ' . config('app.name'), 'email-temps.visitor', $data);
        return back()->with('success', 'Email sent successfully');
    }

    public function sendWaMsg()
    {
        $this->input->validate([
            'body'  =>  'required'
        ]);

// $sid = 'AC71d5800018f77b03cbbb079a1b735525';
// $token = '5b6c2b6e8bcaf73077175ee18d9e3a0b'; 
// $twilio = new Client($sid, $token);

// $message = $twilio->messages
//                   ->create("whatsapp:+923173802988", // to
//                            [
//                                "from" => "whatsapp:+14235646085",
//                                "body" => "Hello, Maha there!"
//                            ]
//                   );
// dd($message);

        $this->setting->sendWhatsappMessage($this->input->wa_no,$this->input->body);
        return back()->with('success','Whatsapp message sent successfully');
    }
}
