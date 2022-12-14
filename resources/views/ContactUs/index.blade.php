@extends('front.app', ['page_name' => 'Contact US'])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')

<section class="contact_US_Page">

<div class="container">
    <div class="text-center heading">
       <h2>Contact Us</b></h2>

            <img src="{{ asset('assets/img/header_logo3.png') }}">
              <h4 class="">17350 State Highway 249, <br>Suite 220, Houston, TX 77064</h4>
                <h3>Client Support Request</h3>
                <p>Please provide contact information</p>

{{--  --}}
                    <form action="{{ url('/contact-us') }}" method="post">
                        @csrf
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="704">
                            <input type="hidden" name="_wpcf7_version" value="5.3.2">
                            <input type="hidden" name="_wpcf7_locale" value="en_US">
                            <input type="hidden" name="_wpcf7_unit_tag"
                                value="wpcf7-f704-p5504-o1">
                            <input type="hidden" name="_wpcf7_container_post"
                                value="5504">
                            <input type="hidden" name="_wpcf7_posted_data_hash"
                                value="">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                  <div class="form-group text-left">
                                    <label for="exampleFormControlInput1">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
                                  </div>
                                </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group text-left">
                                    <label for="exampleFormControlInput2">E-mail <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="">
                                  </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group text-left">
                                    <label for="exampleFormControlInput3">Phone  <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control" id="exampleFormControlInput3" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group text-left">
                                    <label for="exampleFormControlInput4">Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control" id="exampleFormControlInput4" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group text-left">
                                    <label for="exampleFormControlInput5">Message <span class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control" cols="40" rows="10" id="exampleFormControlInput5"></textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger"> SUBMIT </button>
                            </div>
                        </div>
                    </form>
                   <p class="plast">Phone support available Monday - Friday from 9 a.m. to 6 p.m. CST</p>
     </div>
{{--  --}}

 </div>
</section>


<section class="contact_US_Page_sec2">
    <div class="container">
        <div class="heading2">
            <div class="row">
                <div class="col-md-5">
                    <h2>We're Here to Help</h2>
                    <p>Phone support is available Monday – Friday from<br> 9 a.m. to 6 p.m. CST, or submit a question and<br>  we'll respond as quickly as possible.</p>
                </div>
                <div class="col-md-7">
                    <img src="{{ asset('assets/img/webicon/We_re Here to Help.png') }}">
                </div>
            </div>
        </div>

        <div class="heading3 text-center" align="center">
            <h2>Using Your Client Dashboard</h2>
            <p>Your client dashboard will become the central document repository and
                management tool that will allow you to actively manage your entity. You can
                always access your client dashboard by using the order number and email
                address associated with your order. Below are some helpful links provided to
                orient you with the features of the client dashboard.</p>

                {{-- for btn --}}
                <div>
                    <a href="{{ url('/launch-my-llc') }}"><img src="{{ asset('assets/img/getst.png') }}"></a>
                </div>
                {{-- for btn --}}

                <div class="row text-center" align="center">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="cardbox">
                                <h2>Login</h2>
                                <p>Use this link to access your
                                    client dashboard directly from
                                    our site. The login credentials
                                    will always be the associated email
                                    address and order number.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cardbox">
                                <h2>Company
                                    Information</h2>
                                <p>Review and obtain pertinent
                                    company information. (Please
                                    remember to always keep a valid
                                    email address on file as this will be
                                    the primary method of contact
                                    </p>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
              </div>

              
              <div class="row text-center" align="center">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <div class="cardbox">
                        <h2>Order History & Receipts</h2>
                        <p>Use this tab to review company
                            order history and to access
                            associated receipts</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cardbox">
                        <h2>Track Status</h2>
                        <p>You can always check the
                            progress of your order or review
                            any pending issues form this tab.</p>
                    </div>
                </div>
                <div class="col-md-1"></div>
      </div>

      
      <div class="row text-center lastrow" align="center">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="cardbox">
                <h2>Registered Agent</h2>
                <p>Obtain the name and address of
                    your designated Registered Agent
                    and review important documents.
                    (Documents received by your
                    agent will be uploaded
                    to the Registered Agent tab
                    and a corresponding notification
                    email will be deployed.)</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cardbox">
                <h2>Ongoing Requirements</h2>
                <p>Always be in the know of any
                    ongoing requirements, such as
                    annual reports or other obligatory
                     filing requirements associated
                    with your entity. A Documents
                     tab will also be available to you
                    upon the completion of the
                    order</p>
            </div>
        </div>
        <div class="col-md-1"></div>
</div>

       </div>

   </div>
</section>

@endsection
