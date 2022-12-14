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
                    </div>
                    <div class="text-center user-info">
                        <p class="imglist">
                            @if(!empty($user->avatar1))
                              <a href="{{ asset('users_imgs/' . $user->avatar1) }}" data-fancybox="group" data-caption="Profile Image">
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

                                <li><h2><i>Contact Information</i></h2></li>
                                <li class="contacts-block__item">
                                    <b>Full Name : {{ $tm->fullName }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>Phone Number : {{ $tm->Phone }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>E-mail : {{ $tm->Email }}</b>
                                </li>

                                {{-- Company Info --}}
                                <li><h2><i>Company Information</i></h2></li>

                                <li class="contacts-block__item">
                                    <b>Company Name  : {{ $tm->Company_name }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>Entity Type : {{ $tm->entity_type }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>State Of Formation : {{ $tm->state_of_formation }}</b>
                                </li>
                               
                                <li class="contacts-block__item">
                                  <b>Date Of Formation : {{ $tm->date_of_formation }}</b>
                                </li>

                                <li class="contacts-block__item">
                                    <b>Designator  : {{ isset($tm->designation_id->name) ? $tm->designation_id->name :''}} </b>
                                </li>

                                <li class="contacts-block__item">
                                  <b>Members : </b>
                                </li>
  
                                <li class="contacts-block__item">
                                  <div class="d-flex">
                                      <ul>
  
                                          @if(!empty($tm->members))
                                              @foreach($tm->members as $member)
                                                  <li>{{$member}}</li>
                                              @endforeach
                                          @endif
                                      </ul>
                                  </div>
                                </li>

                                {{--  company address info --}}
                                <li><h2><i>Company Address</i></h2></li>

                                <li class="contacts-block__item">
                                    <b>Street Address  : {{ $tm->street_address }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>City : {{ $tm->city }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>State : {{ $tm->state }}</b>
                                </li>
                               
                                <li class="contacts-block__item">
                                    <b>Zip code  : {{ isset($tm->zip_code) ? $tm->zip_code :''}} </b>
                                </li>

                               
                                {{--  --}}

                                {{--  company address info --}}
                             
                                {{--  --}}

                              </ul>
                            </div>

                                <div class="col-md-6">
                            <ul class="contacts-block list-unstyled ml-3" style="max-width: none;">  

                              <li><h2>SS4 Questions</h2></li>

                              <li class="contacts-block__item">
                                <b>First Name of principal officer or owner : {{ isset($tm->ss4_question_fname) ? $tm->ss4_question_fname :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Last Name of principal officer or owner : {{ isset($tm->ss4_question_lname) ? $tm->ss4_question_lname :''}} </b>
                              </li>
                             
                              <li class="contacts-block__item">
                                <b>I am a foregin citizen and do not have a SSN : {{ isset($tm->i_am_foregin_citizen_and_do_not_have_SSN) ? $tm->i_am_foregin_citizen_and_do_not_have_SSN :''}} </b>
                              </li>

                              @if($tm->i_am_foregin_citizen_and_do_not_have_SSN == 'No')
                                <li class="contacts-block__item">
                                  <b>Identification number by which I will obtain the EIN : {{ isset($tm->Identification_number_obtain_EIN	) ? $tm->Identification_number_obtain_EIN	 :''}} </b>
                                </li>

                                <li class="contacts-block__item">
                                  <b>Identification number : {{ isset($tm->ssn_itin_number_enter	) ? $tm->ssn_itin_number_enter	 :''}} </b>
                                </li>

                                <li><h4><b>Provide SSN or ITIN holder Address</b></h4></li>

                                <li class="contacts-block__item">
                                  <b>Street Address : {{ isset($tm->provide_SSN_ITIN_holder_Address_street_address) ? $tm->provide_SSN_ITIN_holder_Address_street_address :''}} </b>
                                </li>

                                <li class="contacts-block__item">
                                  <b>City : {{ isset($tm->provide_SSN_ITIN_holder_Address_city) ? $tm->provide_SSN_ITIN_holder_Address_city :''}} </b>
                                </li>

                                <li class="contacts-block__item">
                                  <b>State : {{ isset($tm->provide_SSN_ITIN_holder_Address_state) ? $tm->provide_SSN_ITIN_holder_Address_state :''}} </b>
                                </li>

                                <li class="contacts-block__item">
                                  <b>Zip code : {{ isset($tm->provide_SSN_ITIN_holder_Address_Zipcode) ? $tm->provide_SSN_ITIN_holder_Address_Zipcode :''}} </b>
                                </li>
                              @endif
                              {{-- ss4 question --}}

                              <li><h2>Order Summary</h2></li>

                              <li class="contacts-block__item">
                                <b>Service : EIN</b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Order ID : {{ isset($order->order_id) ? $order->order_id :''}}</b>
                              </li>
                                 
                              @if(!empty($order->coupon_id))
                                <li class="contacts-block__item">
                                    <b>Discount Coupon : {{ isset($order->coupon->name) ? $order->coupon->name :''}}</b>
                                </li>
                              @endif

                              <li class="contacts-block__item">
                                <b>Amount :  
                                  @if(!empty($order->coupon_id))
                                    ${{$order->before_assign_coupon_amount}}
                                  @else
                           
                                    ${{ $order->amount }}
                                  @endif
                                 </b>
                              </li>

                               <li class="contacts-block__item">
                                <b>Payment Method : {{ isset($order->payment_method) ? $order->payment_method :''}}  </b>
                              </li>
                              
                             
                              
                                    <li class="contacts-block__item">
                                        <b class="imglist">Payment Proof :  
                                                <a href="{{ asset('proofs/'.$order->proof) }}" data-fancybox="group" data-caption="Payment Proof">
                                                    <button data-img="{{ asset('proofs/'.$order->proof) }}" class="btn btn-sm btn-secondary view-bank-proof">Proof</button>
                                                    {{-- <img src="{{ asset('proofs/'.$order->proof) }}" class="img-thumbnail" style="width: 100%;" /> --}}
                                                </a>
                                        </b>
                                    </li>
                                    @if($order->payment_method == 'stripe' || $order->payment_method == 'paypal')
                                    <li class="contacts-block__item">
                                        <b>Transition ID : {{ isset($order->transaction_id) ? $order->transaction_id :''}} </b>
                                    </li>
                                    @endif
                            </div>
                        </ul>    

                    @if(auth()->user()->id == 1 || !empty(SF::getPermission('Upload User/Customer Documents view')))
                      @if($documents->isEmpty())  
                      
                      @else
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
                        @endif

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
