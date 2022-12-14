<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/header_logo3.png') }}" sizes="32x32">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/launch-my-llc/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.2/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<style>
button.Button-sc-1q0i4nm-0:hover {
    color: white !important;
    background: #ee8d22 !important;
    border: 1px solid #ee8d22 !important;
}
</style>

</head>

<body>

    <div class="container-fluid">
        <div class="row" style='border-bottom:1px solid lightgray; margin-bottom:20px;'>
            <div class="col-md-8">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/header_logo3.png') }}"
                        alt="" style="width:15%;"></a>
            </div>
        </div>
    </div>

            {{-- <!-- Modal -info --> --}}                         



    <div class="container">
        <i></i>
        <input type="hidden" class="pkg_amount" value="{{ $package->price }}">
        <input type="hidden" class="pkgg_id" value="{{ $package->id }}">
    <form class="steps" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">

            @php
                $forming = isset($draft->forming) ? $draft->forming : '';
                $f_state = isset($draft->f_state) ? $draft->f_state : '';
            @endphp
            <input type="hidden" name="forming" value="{{ isset($draftC->forming) ? $draftC->forming : $forming }}">
            <input type="hidden" name="f_state" value="{{ isset($draftC->f_state) ? $draftC->f_state : $f_state }}">
            <ul id="progressbar">
                <li class="active">Perosnal Info</li>
                <li>Company Info</li>
                <li>Review & Confirm</li>
                <li>Payment</li>
            </ul>



            {{-- Perosnal Info --}}
            <fieldset>
                <h2 class="fs-title">Perosnal Information</h2>
                <!-- Begin What's Your First Name Field -->
                <div class="hs_firstname field hs-form-field">

                    <label for="firstname-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">Your Full Name</label>

                    <input name="name" type="text" class="main_name" placeholder="Enter Your Name"
                        value="{{ isset($draftC->name) ? $draftC->name : '' }}">
                </div>
                <div class="hs_email field hs-form-field">

                    <label>Your E-mail Address</label>

                    <input name="email" type="email" class="{{ !isset($draftC->email) ? 'main_email' : '' }}"
                        placeholder="Enter Your Email" value="{{ isset($draftC->email) ? $draftC->email : '' }}">
                    <p class="emailVerifyerror1"></p>
                </div>
                {{-- End What's Your Email Field --}}

                <div class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database">

                    <label>Gender</label>

                    <select name="gender" class="form-control">
                        <option disabled selected hidden>--- Select Gender ---</option>
                        <option value="Male"
                            {{ isset($draftC->gender) && $draftC->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female"
                            {{ isset($draftC->gender) && $draftC->gender == 'Female' ? 'selected' : '' }}>Female
                        </option>
                        <option value="Other"
                            {{ isset($draftC->gender) && $draftC->gender == 'Other' ? 'selected' : '' }}>Other
                        </option>
                    </select>
                </div>


                <div class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database">

                    <label>Date Of Birth</label>

                    <input type="date" name="dob" class="form-control"
                        value="{{ isset($draftC->dob) ? $draftC->dob : '' }}">
                </div>

                <div class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database">

                    <div class="row">
                        <div class="col-md-12">
                            <label>Phone</label>
                            <input type="tel" name="phone" maxlength="15" class="form-control" id="phone"
                                value="{{ isset($draftC->phone) ? $draftC->phone : '' }}"
                                style="width: 478px !important;">
                        </div>
                    </div>
                </div>

                <div
                    class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database mailing-address-div">

                    <label>Mailing Address</label>
                    <label class="float-right mailing-add-div" style="color: rgb(140, 20, 252); cursor: pointer;">What
                        address should I use?</label>
                    <input type="text" name="address" class="form-control"
                        value="{{ isset($draftC->address) ? $draftC->address : '' }}">
                </div>

                <div class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database what-add-look"
                    style="display: none;">
                    <textarea class="form-control" rows="2">We will mail your debit card here. The address is not used for your company filing and can be outside the U.S.</textarea>
                </div>

                <div class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database addressline2">
                    <button type="button" class="btn btn-default address-line2">+ Address Line 2</button>
                </div>

                <div class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database">
                    <div class="row">
                        <div class="col-md-6">
                            <label>City</label>
                            <input type="text" name="city" class="form-control"
                                value="{{ isset($draftC->city) ? $draftC->city : '' }}">
                        </div>
                        <div class="col-md-6">
                            <label>State</label>
                            <input type="text" name="state" class="form-control"
                                value="{{ isset($draftC->state) ? $draftC->state : '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Country</label>
                            <select name="country" class="form-control">
                                <option selected disabled hidden> --- Select Country --- </option>
                                @foreach (splitName()['countries'] as $item)
                                    <option value="{{ $item }}"
                                        {{ isset($draftC->country) && $draftC->country == $item ? 'selected' : '' }}>
                                        {{ $item }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Postal Code</label>
                            <input type="text" name="postal_code" class="form-control"
                                value="{{ isset($draftC->postal_code) ? $draftC->postal_code : '' }}">
                        </div>
                    </div>
                </div>
                <input type="button" data-page="1" name="next" class="next action-button main-form-btn-bb1"
                    value="Next" />
            </fieldset>



            {{-- Company Info --}}
            <fieldset>
                <h2 class="fs-title">Company Information</h2>
                <!-- Begin Total Number of Donors in Year 1 Field -->
                <div class="form-item webform-component webform-component-textfield hs_total_number_of_donors_in_year_1 field hs-form-field"
                    id="webform-component-acquisition--amount-1">

                    <label>Chosse a company name </label>

                    <input id="edit-submitted-acquisition-amount-1" class="form-text hs-input company_name"
                        name="company" required="required" type="text" placeholder="" data-rule-required="true"
                        data-msg-required="Please enter a valid number"
                        value="{{ isset($draftC->company) ? $draftC->company : '' }}">
                    <span class="error1" style="display: none;">
                        <i class="error-log fa fa-exclamation-triangle"></i>
                    </span>
                </div>
                <!-- End Total Number of Donors in Year 1 Field -->

                <!-- Begin Total Number of Donors in Year 2 Field -->
                <div class="form-item webform-component webform-component-textfield hs_total_number_of_donors_in_year_2 field hs-form-field"
                    id="webform-component-acquisition--amount-2">

                    <label>Choose a designer</label>

                    <select name="designer_id" id="" class="form-control select_designer">

                        @foreach ($designers as $d)
                            <option value="{{ $d->id }}"
                                {{ isset($draftC->designer_id) && $draftC->designer_id == $d->id ? 'selected' : '' }}>
                                {{ $d->name }} </option>
                        @endforeach
                    </select>
                    <span class="error1" style="display: none;">
                        <i class="error-log fa fa-exclamation-triangle"></i>
                    </span>
                </div>
                <div class="row mt-3" style="border-bottom: 1px solid lightgray">
                    <div class="col-md-12 mt-2 mb-3">
                        <h4 class="after_cmp_des" style="font-size: 19px;">Members of</h4>
                    </div>
                </div>
                <div
                    class="form-item webform-component webform-component-textfield webform-container-inline hs_total_donor_percent_change field hs-form-field">

                    <div class="row removable-members-row">
                        <div class="col-md-6">
                            <label>Member Name</label>
                            <input type="text" name="members[]" class="form-control member">
                        </div>
                        <div class="col-md-4">
                            <label>Ownership %</label>
                            <input type="text" name="ownership[]" id=""
                                class="form-control ownership-cls" value="100%">
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <button type="button" class="btn btn-sm btn-danger remove-members-row"
                                style="margin-top: 25px;" onclick="remove_members_row(this);"> &times;
                            </button>
                        </div>
                    </div>

                    <div class="row mt-2 add-member-row-div">
                        <div class="col-md-8">
                            <button type="button" class="btn btn-success add-member-row">+ Member</button>
                        </div>
                    </div>
                </div>

                <div class="form-item webform-component webform-component-textfield hs_total_number_of_donors_in_year_2 field hs-form-field mb-3 mt-3"
                    id="webform-component-acquisition--amount-2">

                    <h4 class="mb-2" style="font-size: 19px;">Your Account</h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <label style="color: black; font-weight: bold; font-size: 14px;">Create Password</label>
                        </div>

                        <div class="col-md-8 float-right">
                            <label style="color: black; font-weight: bold; font-size: 14px;">8+
                                chars, 1 letter, 1 number & 1 special char</label>
                        </div>
                    </div>
                    <input type="password" name="password" class="form-control acc-pass">
                    <span class="error1" style="display: none;">
                        <i class="error-log fa fa-exclamation-triangle"></i>
                    </span>
                </div>
                <!-- End Calc of Total Number of Donors Fields -->
                <input type="button" data-page="2" name="previous" class="previous action-button account-ar-btn"
                    value="Previous" />
                <input type="button" data-page="2" name="next" class="next action-button " value="Next" />
            </fieldset>



            {{-- Review & Confirm --}}
            <fieldset>
                <h2 class="fs-title">Review & Confirm</h2>
                <div class="card mb-5">
                    <div class="card-header">
                        <label> Account Information </label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 d-flex" style="flex-direction:column;">
                                <h5> MAIN CONTACT </h5>
                                <label class="acc_name">xyz</label>
                                <label class="acc_email">asd</label>
                                <label class="acc_phone">ddd</label>
                            </div>
                            <div class="col-md-6 d-flex" style="flex-direction:column;">
                                <h5> MAILING ADDRESS </h5>
                                <label class="acc_add1">asd</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <div class="card-header">
                        <label> Company Information </label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 d-flex" style="flex-direction:column;">
                                <h5> COMPANY NAME </h5>
                                <label class="comp_name">xyz</label>
                            </div>
                            <div class="col-md-6 d-flex" style="flex-direction:column;">
                                <h5> COMPANY TYPE </h5>
                                <label class="comp_type">asd</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 d-flex" style="flex-direction:column;">
                                <h5> STATE </h5>
                                <label class="comp_state">xyz</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <div class="card-header">
                        <label> Director Information</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 d-flex" style="flex-direction:column;">
                                <h5>DIRECTORS </h5>
                                <div class="dir_name">xyz</div>
                            </div>
                            <div class="col-md-6 d-flex" style="flex-direction:column;">
                                <h5> OWNERSHIP </h5>
                                <div class="dir_own">asd</div>
                            </div>
                        </div>
                    </div>
                </div>


                <input type="button" data-page="3" name="previous" class="previous action-button"
                    value="Previous" />
                <input type="button" data-page="3" name="next" class="next action-button finalNextBtn"
                    value="Next" />
            </fieldset>



            {{-- Payment --}}
            <fieldset>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <h4> Your application is ready! </h4>
                            <label for="">
                                You’re ready to begin the filing process! Once you place your order, you'll get access
                                to your online account to upload your passport document securely and answer a few more
                                questions before we start filing your company.
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center"> Order Summary </h4>
                            </div>
                        </div>

                        <div class="row after-pkg-service-div">
                            <div class="col-md-12">
                                <label style="position: relative;">
                                    {{ config('app.name') . ' Plan' }}
                                    <i data-feather="chevron-right" class="getPkgServices" width="14"
                                        height="24" style="position: absolute; cursor: pointer;"></i>
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right getPkgServices"
                                        data="{{ $package->id }}" style="position: absolute; cursor: pointer;">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg> --}}
                                </label>
                                <div class="float-right">
                                    <label>${{ $package->price }}</label>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <label>US Bank Account</label>
                                <div class="float-right">$0</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    One Time {{ $f_state }} State Fee ⓘ
                                </label>
                                <div class="float-right">$0</div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-8">
                                <h3>Due Today</h3>
                            </div>
                            <div class="col-md-4 float-right">
                                <h3>${{ $package->price }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5"></div>
                <h2 class="fs-title">Payment Details</h2>
                <h3 class="fs-subtitle">How long can you keep your donors and their donations?</h3>
                <!-- Begin Total Number of Donors Who Gave in Year 1 Field -->
                <div class="form-item webform-component webform-component-textfield hs_number_of_donors_in_year_1 field hs-form-field"
                    id="webform-component-retention--amount-1">
                    <div class="row">
                        <div class="col-md-4">
                            <label> PayPal </label>
                            <div id="paypal-button-container" style="width: 100px; height: 50px;"></div>
                        </div>
                        <div class="col-md-4">
                            <label> Stripe </label>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Pay With Stripe
                            </button>
                        </div>
                        <div class="col-md-4">
                            <label> Local Bank </label>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#localBank">
                                Local Bank
                            </button>
                        </div>
                    </div>

                </div>
                <input type="button" data-page="5" name="previous" class="previous action-button"
                    value="Previous" />
                <input id="submit" class="hs-button primary large action-button next" type="submit"
                    value="Submit">
            </fieldset>


        </form>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <form role="form" action="{{ url('/stripe-payment-gateway') }}" method="post" class="require-validation"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_API_KEY') }}"
                        id="payment-form">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <label class='control-label'>Name on Card</label>
                                <input class='form-control' size='4' type='text'>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                    size='4' type='text'>
                            </div>
                            <div class="col-md-4">
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class="col-md-4">
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row mt-3'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay
                                    Now (${{ (int) $package->price }})</button>
                            </div>
                        </div>

                    </form> --}}
                    <a href="javascript:void(0)" class="stripe">
                        <form action="{{ url('/stripe-payment-gateway') }}" method="POST">
                            @csrf
                            <input type="hidden" name="pkgg_price" value="{{ (int) $package->price }}">
                            <input type="hidden" name="pkg_price" value="{{ (int) $package->price * 100 }}">
                            <input type="hidden" name="payee">
                            <input type="hidden" name="pkg_id" value="{{ $package->id }}">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_API_KEY') }}"
                                data-amount="{{ (int) $package->price * 100 }}" data-name="Sharp Formation Payment" data-description=""
                                data-image="{{ asset('assets/img/header_logo3.png') }}" data-locale="auto" data-currency="usd"></script>
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="localBank" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/submit-proof-llc') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pkg_id" value="{{ $package->id }}">
                        <input type="hidden" name="amount" value="{{ $package->price }}">
                        <div class="row mb-">
                            <div class="col-md-12">
                                <label for="">Email</label>
                                <input type="email" name="localBamkEmail" class="form-control localBamkEmail" value="{{ isset($draftC->email) ? $draftC->email : '' }}">
                            </div>
                        </div>
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-8">
                                <label for=""> Upload Proof </label>
                                <div class="">
                                    <div class="img-box-divvv">
                                        <div class="white-box-divv"
                                            style="position: relative; background: white; height: 155px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                                        </div>
                                        <div class="upload-btn"
                                            style="position: relative; text-align: center; color: #fff; padding: 20px; border-radius: 4px; background: #626262;">
                                            Upload Image
                                            <input type="file" name="proof" class="file-control file2222"
                                                style="cursor: pointer; position: absolute; left: 0; top: 0; opacity: 0; width: 100%; height: 100%; border: solid 1px white;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success float-right"> Submit </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form action="{{ url('/start-over') }}" method="post">
                        @csrf
                        <div class="row"
                            style="display: flex; justify-content: center; align-items: center;margin-bottom: 40px; margin-top: 41px;">
                            <div class="col-lg-8"
                                style="padding:0px; margin:0px !important; display: flex; justify-content: center;">
                                <img src="{{ asset('assets/img/header_logo3.png') }}" alt="">
                            </div>
                        </div>

                        <div class="row" style="display: flex; justify-content: center;">
                            <div class="col-lg-8"
                                style="display: flex;justify-content: center;margin: 0px;padding: 0px;">
                                <h3>Welcome back!</h3>
                            </div>
                        </div>

                        <div class="row" style="display: flex; justify-content: center;">
                            <div class="col-lg-8" style="display: flex; justify-content: center; text-align:center;">
                                <p>Continue where you left off or clear everything and start over?</p>
                            </div>
                        </div>

                        <div class="styles__ModalButtons-sc-kfcdse-22 jfCVhe"
                            style="display: flex;flex-direction: column;-webkit-box-align: center;align-items: center; margin-bottom: 40px;">
                            <button class="Button-sc-1q0i4nm-0 dXAhWu continue-proccess" type="button"
                                style='padding: 1em 2em; width: 250px; margin-bottom: 0.25em;background-color: #ee8d22;color: white;border: 1px solid #ee8d22; border-radius: 5px;font-family: Avenir, "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: 500;font-size: 18px;cursor: pointer;'>Continue</button>
                            <button class="Button-sc-1q0i4nm-0 bhImxi" type="submit"
                                style='padding: 1em 2em; width: 250px; background-color: transparent; color: #ee8d22; border: 1px solid #ee8d22; border-radius: 5px; font-family: Avenir, "Helvetica Neue", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 18px; cursor: pointer;'>Start
                                Over</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer" style="display:none ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.2/build/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    @include('front_includes.custom_form_js')
    {{-- @include('front_includes.stripe') --}}
    {!! PayPalApi() !!}
    {{-- <script src="{{ asset('assets/js/launch-my-llc/custom.js') }}"></script> --}}

    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif

    @if(Session::has('visited'))

        <!-- <script>
            $(document).ready(function() {
                $('#resumeModal').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
            });
        </script> -->

    @else

        @php
            $session_id = uniqid('SF_');
            Session::put('visited', $session_id);
            SF::setUnique(session()->get('visited'));
        @endphp

    @endif

<script type="text/javascript">
    feather.replace();
</script>

    <script>
        $(document).on('click', '.getPkgServices', function(e) {
            // console.log($(this).attr('data'));
            let pkg_id = $(this).attr('data');
            let div = $('.after-pkg-service-div');
            $(this).removeClass('feather-chevron-right');
            $(this).addClass('feather-chevron-down');
            $(this).removeClass('getPkgServices');
            $.ajax({
                type: "GET",
                url: "{{ url('/get-pkg-features') }}",
                data: {
                    id: pkg_id
                },
                success: function(data) {
                    data.forEach(function(value, index) {
                        div.after(`<div class="row justify-content-center pkg-features-div">
                                <div class="col-md-8">` + value.name + `</div>
                            </div>`);
                    });
                }
            });
        });

        $(document).on('click', '.feather-chevron-down', function() {
            $(this).removeClass('feather-chevron-down');
            $(this).addClass('getPkgServices')
            $('.pkg-features-div').remove();
        });

        $(document).on('click', '.address-line2', function() {
            $(this).parents('.addressline2').before(`<div class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database">
                                    <label>Address Line 2</label>
                                    <input type="text" name="address_line2" class="form-control">
                                    </div>`);
            $(this).remove();
        });

        $(document).on('click', '.mailing-add-div', function() {
            $('.what-add-look').toggle();
        });
        paypal.Buttons({
            style: {
                layout: 'horizontal',
                color: 'silver',
                shape: 'pill',
                label: 'paypal'
            },
            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: $('.pkg_amount').val().trim()

                        },
                        payee: {
                            email_address: 'sb-grxf418043366@business.example.com'
                        }
                    }]

                });
            },
            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];

                    var paymentAmount = orderData.purchase_units[0];
                    var paymentAmountNew = orderData.payer;

                    var currencyCode = paymentAmount['amount'].currency_code;
                    var amountValue = paymentAmount['amount'].value;
                    var t_id = transaction.id;
                    var invoice_url = orderData.links[0].href;

                    $.ajax({
                        type: "POST",
                        url: "{{ url('/set-paypal-details') }}",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            amount: amountValue,
                            currency: currencyCode,
                            email: $('.main_email').val(),
                            pkg_id: $('.pkgg_id').val(),
                            t_id: t_id,
                            invoice_url: invoice_url
                        },
                        success: function(data) {

                            if (data.status == 200) {
                                toastr.success(data.message);
                                setTimeout(function() {
                                    window.location.href = data.success_url;
                                }, 2000);
                            } else {
                                toastr.error('Something Went Wrong');
                                setTimeout(function() {
                                    window.location.href = data.success_url;
                                }, 1000);
                            }
                        }
                    });
                });
            }


        }).render('#paypal-button-container');



        var input = document.querySelector("#phone");
        var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
        window.addEventListener("load", function() {

            errorMsg = document.querySelector("#error-msg"),
                validMsg = document.querySelector("#valid-msg");
            var iti = window.intlTelInput(input, {
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.2/build/js/utils.js"
            });
            window.intlTelInput(input, {
                // allowDropdown: false,
                // autoHideDialCode: false,
                // autoPlaceholder: "off",
                // dropdownContainer: document.body,
                // excludeCountries: ["us"],
                // formatOnDisplay: false,
                geoIpLookup: function(callback) {
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        callback(countryCode);
                    });
                },
                // hiddenInput: "full_number",
                initialCountry: "auto",

                // localizedCountries: { 'de': 'Deutschland' },
                //nationalMode: false,
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                placeholderNumberType: "MOBILE",
                // preferredCountries: ['cn', 'jp'],
                // separateDialCode: true,
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.2/build/js/utils.js",
            });
            $(validMsg).addClass("hide");
            input.addEventListener('blur', function() {
                reset();
                if (input.value.trim()) {
                    if (iti.isValidNumber()) {
                        validMsg.classList.remove("hide");
                    } else {
                        input.classList.add("error");
                        var errorCode = iti.getValidationError();
                        errorMsg.innerHTML = errorMap[errorCode];
                        errorMsg.classList.remove("hide");
                    }
                }
            });

            input.addEventListener('change', reset);
            input.addEventListener('keyup', reset);
        });


        var reset = function() {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };
        $(document).ready(function() {
            $("#phone").val("+917773859");

        });
    </script>

</body>

</html>
