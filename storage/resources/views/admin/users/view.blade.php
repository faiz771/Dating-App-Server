@extends('layouts.app', ['title' => 'View User','cat_name'=>'users','page_name'=>'view_user'])

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@section('content')
    <div class="row layout-spacing justify-content-center">
        <div class="col-xl-12 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
          @php $id = Crypt::encrypt($user->id); @endphp
            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        {{-- <h2 class="ml-2" style="border-bottom: 1px solid;">User Information </h2> --}}
                        {{-- <a href="{{ url('/edit-user/' . $id) }}" class="mt-2 edit-profile"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a> --}}
                    </div>
                    <div class="text-center user-info">
                        <p class="imglist">
                            @if(!empty($user->avatar1))
                              <a href="{{ asset('users_imgs/' . $user->avatar1) }}" data-fancybox="group" data-caption="Payment Proof">
                                <img src="{{ asset('users_imgs/' . $user->avatar1) }}" class="img-thumbnail rounded-circle"/>
                              </a>
                            @else
                            <a href="{{ asset('assets/img/dumy.jpg') }}" data-fancybox="group" data-caption="Payment Proof">
                                <img src="{{ asset('assets/img/dumy.jpg') }}" class="img-thumbnail rounded-circle"/>
                              </a>
                            @endif
                        </p>
                        <p class=""><b>{{ $user->name }}</b></p>
                        <p class="contacts-block__item" style="margin-top: -10px;"> 
                            <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-mail">
                                <path
                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>{{ $user->email }}</a>
                        </p>
                    </div>
                    <div class="user-info-list">

                        <div class="row">
                                <div class="col-md-6">  
                                  <ul class="contacts-block list-unstyled ml-3" style="max-width: none;">  

                                <li><h2>Personal Information</h2></li>
                                <li class="contacts-block__item">
                                    <b>Gender : {{ $user->gender }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>Date Of Birth : {{ $user->dob }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>Country : {{ $user->country }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>State : {{ $user->state }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>City : {{ $user->city }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>Postal Code : {{ $user->postal_code }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>Address : {{ $user->address }}</b>
                                </li>
                               
                                @if(!empty($user->address2))
                                <li class="contacts-block__item">
                                    <b>Address Line 2 : {{ $user->address2 }}</b>
                                </li>
                                @endif

                                <li class="contacts-block__item">
                                    <b>Phone : {{ $user->phone }}</b>
                                </li>

                                <li class="contacts-block__item">
                                    <b>Save My information for feture Purchase : {{ isset($user->save_my_information_feture_purchase) ? $user->save_my_information_feture_purchase :'No'}} </b>
                                </li>

                                {{-- <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg> {{ $user->phone }}
                                </li> --}}

                                <li><h2>Purchase Package</h2></li>
                                <li class="contacts-block__item">
                                    <b>Forming : {{ $user->forming }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>State : {{ $user->f_state }}</b>
                                </li>
                                <li class="contacts-block__item">

                                  @php 
                                  $order_detail = App\Models\Order::where('user_id',$user->id)->first();
                                  @endphp

                                    <b>Package : {{ isset($order_detail->package->type) ? $order_detail->package->type :''}} </b>
                                </li>

                                <li>
                                  <b>Buy Package Amount : {{ isset($order_detail->amount) ? $order_detail->amount :''}} </b>
                                </li>

                                <li><h2>EIN/TAX IDENTIFICATION</h2></li>

                                  <li class="contacts-block__item">
                                    <b>I'm a foreign individual and do not have a social security number : {{ isset($user->i_m_foregin_individual_not_h_socialSocurity_num) ? $user->i_m_foregin_individual_not_h_socialSocurity_num :''}} </b>
                                  </li>
    
                                  @if($user->i_m_foregin_individual_not_h_socialSocurity_num == 'yes' || $user->i_m_foregin_individual_not_h_socialSocurity_num == 'Yes')

                                  <li class="contacts-block__item">
                                    <b>Full Name : {{ isset($user->yes_socialSocurity_num_full_name) ? $user->yes_socialSocurity_num_full_name :''}} </b>
                                  </li>

                                  @else

                                  <li class="contacts-block__item">
                                    <b>I'm US Citizens and i have SSN or ITIN : {{ isset($user->no_socialSocurity_Us_citizen_iHAVE_ssn_or_itin) ? $user->no_socialSocurity_Us_citizen_iHAVE_ssn_or_itin :''}} </b>
                                  </li>

                                  <li class="contacts-block__item">
                                    <b>SSN : {{ isset($user->no_socialSocurity_Us_citizen_ssn) ? $user->no_socialSocurity_Us_citizen_ssn :''}} </b>
                                  </li>

                                  <li class="contacts-block__item">
                                    <b>ITIN : {{ isset($user->no_socialSocurity_Us_citizen_itin) ? $user->no_socialSocurity_Us_citizen_itin :''}} </b>
                                  </li>

                                  <li class="contacts-block__item">
                                    <b>Name As Per SSN or ITIN : {{ isset($user->no_socialSocurity_Us_citizen_name_as_per_ssn_or_itin) ? $user->no_socialSocurity_Us_citizen_name_as_per_ssn_or_itin :''}} </b>
                                  </li>

                                  @endif

                              </ul>
                            </div>

                                <div class="col-md-6">
                            <ul class="contacts-block list-unstyled ml-3" style="max-width: none;">  

                              <li><h2>Company Information</h2></li>

                              <li class="contacts-block__item">
                                <b>Company Name : {{ $user->company }}</b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Designation : {{ isset($user->designation_id->name) ? $user->designation_id->name :''}} </b>
                              </li>

                               <li class="contacts-block__item">
                                <b>Members & his Ownership : </b>
                              </li>

                              <li class="contacts-block__item">
                                <div class="d-flex">
                                    <ul>
                                        @php 
                                          $members = json_decode($user->members);
                                          $ownerships = json_decode($user->ownerships);
                                        @endphp

                                        @if(!empty($members))
                                            @foreach($members as $member)
                                                <li>{{$member}}</li>
                                            @endforeach
                                        @endif
                                    </ul>

                                    <ul>
                                        @if(!empty($ownerships))
                                            @foreach($ownerships as $ownership)
                                                <li>{{$ownership}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                              </li>

                              <li class="contacts-block__item">
                                <b>Business Purpose : {{ isset($user->businesspurpose) ? $user->businesspurpose :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Do you have a Business address : {{ isset($user->have_business_ad) ? $user->have_business_ad :''}} </b>
                              </li>

                              @if($user->have_business_ad == 'yes' || $user->have_business_ad == 'Yes')

                              <li class="contacts-block__item">
                                <b>Business Address: {{ isset($user->business_address) ? $user->business_address :''}} </b>
                              </li>

                              @else

                              <li class="contacts-block__item">
                                <b>Do you allow to sharp formation provide your business address? : {{ isset($user->cus_allow_sf_setBA) ? $user->cus_allow_sf_setBA :''}} </b>
                              </li>

                              @endif
                              
                              <li class="contacts-block__item">
                                <b>Are you a US Citizen or SSN,or ITIN holder : {{ isset($user->are_you_us_citizen) ? $user->are_you_us_citizen :''}} </b>
                              </li>

                              @if($user->are_you_us_citizen == 'yes' || $user->are_you_us_citizen == 'Yes')

                              <li class="contacts-block__item">
                                <b>Do you have a Physical Business Bank Account : {{ isset($user->d_physical_business_bank_acc) ? $user->d_physical_business_bank_acc :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Do you need a Paypal Business Account : {{ isset($user->d_paypal_business_acc) ? $user->d_paypal_business_acc :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Do you need a Stripe Account : {{ isset($user->d_stripe_account_acc) ? $user->d_stripe_account_acc :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Do you need a Capital One Account in your name : {{ isset($user->d_CapitalOne_account_acc) ? $user->d_CapitalOne_account_acc :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Put your SSN for Bank Account and for Paypal  : {{ isset($user->put_u_r_SSN__for_bank_and_paypal_acc) ? $user->put_u_r_SSN__for_bank_and_paypal_acc :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Put your ITIN for Bank Account and for Paypal : {{ isset($user->put_u_r_ITIN_for_bank_and_paypal_acc) ? $user->put_u_r_ITIN_for_bank_and_paypal_acc :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Your name as per SSN or ITIN or Passport documents : {{ isset($user->put_u_r__name_SSN_or_ITIN_passport_documents_acc) ? $user->put_u_r__name_SSN_or_ITIN_passport_documents_acc :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Put your address : {{ isset($user->put_u_r__address) ? $user->put_u_r__address :''}} </b>
                              </li>

                              @else

                              <li class="contacts-block__item">
                                <b>Do you need a Stripe Account : {{ isset($user->no_us_citizen_d_stripe_account_acc) ? $user->no_us_citizen_d_stripe_account_acc :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Do you need a Capital One Account : {{ isset($user->no_us_citizen_d_CapitalOne_account_acc) ? $user->no_us_citizen_d_CapitalOne_account_acc :''}} </b>
                              </li>

                              @endif
                            </div>
                        </ul>    
                            
                        @php 
                        $documents = App\Models\Document::where('user_id',$user->id)->get();
                        @endphp

                    @if(auth()->user()->id == 1 || !empty(SF::getPermission('Upload User/Customer Documents view')))

                      <div class="col-md-12">
                          <ul class="contacts-block list-unstyled ml-3" style="max-width: none;">  
                              <li><h2>Customer Document Upload</h2></li>
                                @if(!empty($documents))
                                  @foreach($documents as $document)
                                      <li class="contacts-block__item">
                                        <ul>
                                          <li>
                                            <div class="justify-content-between d-flex">
                                              <div align="left"> Description  : {{$document->desc}} </div>
                                              <div align="right"> 
                                                <a href="{{asset('customer_documents/'.$document->file)}}" class="btn btn-dark" download> Download</a> 
                                               @if (auth()->user()->id == 1 || !empty(SF::getPermission('Upload User/Customer Documents delete')))
                                                <a href="javascript:void(0)" class="text-danger upload_document_delete" data-id="{{ $document->id }}" data-action="{{url('/delete-document_cus/'.$document->id)}}" title="Delete"><i data-feather="trash"></i></a>
                                                {{-- <a href="{{asset('up_document.destroy'.$document->id)}}" class="btn btn-danger"> Remove</a> --}}
                                               @endif
                                              </div>
                                            </div>
                                          </li>
                                        </ul>
                                      </li>
                                  @endforeach
                                @endif
                          </ul>
                        </div>

                        @endif
                            {{-- <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <a href="{{ $user->fb_link }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-facebook">
                                                        <path
                                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <a href="{{ $user->insta_link }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-twitter">
                                                        <path
                                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <a href="{{ $user->twitter_link }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-linkedin">
                                                        <path
                                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                        </path>
                                                        <rect x="2" y="9" width="4"
                                                            height="12">
                                                        </rect>
                                                        <circle cx="4" cy="4" r="2"></circle>
                                                    </svg>
                                                </a>
                                            </div>
                                        </li>
                                    </ul> --}}
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
   
    </div>
@endsection
