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
                                    <b>Designator  : {{ isset($tm->designation_id->name) ? $tm->designation_id->name :''}} </b>
                                </li>

                                {{--  company address info --}}
                                <li><h2><i>Company Address</i></h2></li>

                                <li class="contacts-block__item">
                                    <b>Street Address  : {{ $tm->com_address }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>City : {{ $tm->com_city }}</b>
                                </li>
                                <li class="contacts-block__item">
                                    <b>State : {{ $tm->com_state }}</b>
                                </li>
                               
                                <li class="contacts-block__item">
                                    <b>Zip code  : {{ isset($tm->com_zipcode) ? $tm->com_zipcode :''}} </b>
                                </li>

                                <li class="contacts-block__item">
                                    <b>Save My information for feture Purchase : {{ isset($user->save_my_information_feture_purchase) ? $user->save_my_information_feture_purchase :'No'}} </b>
                                </li>
                                {{--  --}}

                                {{--  company address info --}}
                                <li><h2><i> Trademark Information</i></h2></li>

                                <li class="contacts-block__item">
                                    <b>Appropriate type of trademark  : {{ $tm->tm_info_appropriate_trademark }}</b>
                                </li>
                                @if($tm->tm_info_appropriate_trademark == 'name')
                                <li class="contacts-block__item">
                                    <b>Business Name : {{ $tm->tm_info_name_business }}</b>
                                </li>
                                @endif

                                @if($tm->tm_info_appropriate_trademark == 'slogan')
                                <li class="contacts-block__item">
                                    <b>Slogan : {{ $tm->tm_info_SLOGAN_Slogan }}</b>
                                </li>
                                @endif

                                @if($tm->tm_info_appropriate_trademark == 'logo')
                                <li class="contacts-block__item">
                                    <b>Logo  : 
                                        <a href="{{ asset('tm_logo_img/'.$tm->tm_info_LOGO_logo) }}" data-fancybox="group" data-caption="Logo">
                                           {{-- <button data-img="{{ asset('tm_logo_img/'.$tm->logo) }}" class="btn btn-sm btn-secondary view-bank-proof">Proof</button> --}}
                                           <img src="{{ asset('tm_logo_img/'.$tm->tm_info_LOGO_logo) }}" class="img-thumbnail w-25" style="width: 100%;" />
                                        </a>
                                    </b>
                                </li>
                                @endif

                                <li class="contacts-block__item">
                                    <b>Are you currently using the mark?  : {{ isset($tm->currently_using_the_mark) ? $tm->currently_using_the_mark :''}} </b>
                                </li>

                                <li class="contacts-block__item">
                                    <b class="imglist">Product Images  : 
                                        @php 
                                            $val_img = json_decode($tm->Product_Images)[0];
                                        @endphp 
                                           <a href="{{ asset('tm_peoduct_img/'.$val_img) }}" data-fancybox="group" data-caption="Product Image">
                                           <button data-img="{{ asset('tm_peoduct_img/'.$val_img) }}" class="btn btn-sm btn-dark view-bank-proof">Images</button>
                                           </a>
                                        @foreach(json_decode($tm->Product_Images,true) as $Product_Images)
                                           <a href="{{ asset('tm_peoduct_img/'.$Product_Images) }}" data-fancybox="group" data-caption="Product Image">
                                             <img src="{{ asset('tm_peoduct_img/'.$Product_Images) }}" class="img-thumbnail w-25 d-none" style="width: 100%;" />
                                           </a>
                                        @endforeach
                                     </b>
                                </li>

                                <li class="contacts-block__item">
                                    <b>Save My information for feture Purchase : {{ isset($user->save_my_information_feture_purchase) ? $user->save_my_information_feture_purchase :'No'}} </b>
                                </li>
                                {{--  --}}

                              </ul>
                            </div>

                                <div class="col-md-6">
                            <ul class="contacts-block list-unstyled ml-3" style="max-width: none;">  

                              <li><h2>Applicant/Owner Information</h2></li>

                              <li class="contacts-block__item">
                                <b>Please enter name of the owner who owns the mark : {{ $tm->Please_enter_name_owns_mark }}</b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Name : {{ isset($tm->owner_info_name) ? $tm->owner_info_name :''}} </b>
                              </li>

                               <li class="contacts-block__item">
                                <b>Street Address : {{ isset($tm->owner_info_Street_Address) ? $tm->owner_info_Street_Address :''}}  </b>
                              </li>

                             
                              <li class="contacts-block__item">
                                <b>City : {{ isset($tm->owner_info_city) ? $tm->owner_info_city :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>State : {{ isset($tm->owner_info_state) ? $tm->owner_info_state :''}} </b>
                              </li>

                              
                              <li class="contacts-block__item">
                                <b>Zip code : {{ isset($tm->owner_info_zipcode) ? $tm->owner_info_zipcode :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Phone Number : {{ isset($tm->owner_info_phone) ? $tm->owner_info_phone :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>E-mai : {{ isset($tm->owner_info_email) ? $tm->owner_info_email :''}} </b>
                              </li>

                              <li class="contacts-block__item">
                                <b>Website : {{ isset($tm->owner_info_Website) ? $tm->owner_info_Website :''}} </b>
                              </li>
                             

                              <li><h2>Order Summary</h2></li>

                              <li class="contacts-block__item">
                                <b>Service : Trade Mark</b>
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
