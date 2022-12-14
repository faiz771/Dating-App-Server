<style>
/*  */
.star-light {
    color: #e9ecef !important;
}

.result-containers {
    width: 203px;
    height: 64px;
    background-color: #595a5a;
    vertical-align: middle;
    display: inline-block;
    position: relative;
}
.rate-starss{
	width: 203px;
    height: 65px;
	background: url('{{asset("assets/img/ft_img.png")}}') no-repeat;
    background-size: cover;
    position: absolute;
}
.rate-bg {
    height: 55px;
    background-color: #ffbe10;
    position: absolute;
}
/*  */
</style>

<footer class="wraper_footer style-six">
    <div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6" align="left">
                <div class="logo">
                    <img src="{{asset('assets/img/3.png')}}" style="width: 19%;">
                </div>
           </div>
            <div class="col-md-6" align="right">
                {{-- Reviews and rating total --}}

                @php 
                $total_review = 0;
                $total_user_rating = 0;
                $review_content = array();
                $reviews = App\Models\Testimonial::orderBy('id', 'DESC')->get();
             foreach($reviews as $review)
             {
                 $review_content[] = array(
                     'rating'		=>	$review["rating"],
                 );                        
                 $total_review++;               
                 $total_user_rating = $total_user_rating + $review["rating"];
             }

             if(count($review_content)){
              $rate_times = count($reviews);
              $rate_value = $total_user_rating/$rate_times;
              $rate_bg = (($rate_value)/5)*100;

              }else{
                  $rate_times = 0;
                  $rate_value = 0;
                  $rate_bg = 0;
              }
            @endphp

         <div class="rating">

          <div>
            <div class="result-containers">
                 <div class="rate-bg" style="width:{{$rate_bg}}%;"></div>
                 <div class="rate-starss"></div>
            </div>

                  {{-- @for($star = 1; $star <= 5; $star++)
                      @if($total_user_rating >= $star)
                        <i class="fa fa-star mr-1 main_star text-warning"></i>
                        @else
                        <i class="fa fa-star star-light mr-1 main_star"></i>
                      @endif
                  @endfor --}}

              <br>
             <span class="text-dark" style="font-size: 20px; margin-right: 108px; "><b> {{str_replace(".", "", $total_review)}} ratings</b></span>
         </div>
     {{-- Reviews nd rating --}}
            </div>
        </div>
        </div>
            <div class="col-md-12 mt-5">
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                    <div class="footer_main_item matchHeight" style="height: 231px;">
                        <section id="nav_menu-8" class="widget widget_nav_menu">
                            <h5 class="widget-title">ENTITY TYPES</h5>
                            <div class="menu-important-links-container">
                                <ul id="menu-important-links" class="menu rt-mega-menu-transition-slide">
                                    <li id="menu-item-1019" class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                        <p>LLC</p>
                                    </li>    
                                    <li id="menu-item-1019" class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                        <p>S Corporation</p>
                                    </li>   
                                    <li id="menu-item-1019" class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                        <p>C Corporation</p>
                                    </li>   
                                    <li id="menu-item-1019" class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                        <p>Nonprofit</p>
                                    </li> 
                                </ul>
                            </div>
                        </section>
                    </div>
            </div>

            {{-- services --}}
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="footer_main_item matchHeight" style="height: 231px;">
                    <section id="nav_menu-8" class="widget widget_nav_menu">
                        <h5 class="widget-title">Services</h5>
                        <div class="menu-important-links-container">
                            <ul id="menu-important-links" class="menu rt-mega-menu-transition-slide">
                                @php 
                                $services = App\Models\Service::all();
                                @endphp
                                    @if(!empty($services))
                                        @foreach($services as $service)
                                            <li id="menu-item-1019" class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                                <p>{{$service->name}}</p>
                                            </li>    
                                        @endforeach
                                    @endif

                            </ul>
                        </div>
                    </section>
                </div>
        </div>
        {{-- quick link --}}
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="footer_main_item matchHeight" style="height: 231px;">
                <section id="nav_menu-8" class="widget widget_nav_menu">
                    <h5 class="widget-title">QUICK LINKS </h5>
                    <div class="menu-important-links-container">
                        <ul id="menu-important-links" class="menu rt-mega-menu-transition-slide">
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                               <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Compare Entities                                </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Manage Your Company                                </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Check Order Status                                </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Research Tool </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="{{ url('/launch-my-llc') }}">Pricing</a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Read the Blog</a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="{{ url('/landingpageAboutUs') }}">About Us</a>
                             </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>

        {{-- Resources --}}
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="footer_main_item matchHeight" style="height: 231px;">
                <section id="nav_menu-8" class="widget widget_nav_menu">
                    <h5 class="widget-title">RESOURCES</h5>
                    <div class="menu-important-links-container">
                        <ul id="menu-important-links" class="menu rt-mega-menu-transition-slide">
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Filing Times                        </a>
                            </li>
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Why Choose Us                        </a>
                            </li>
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Testimonials                              </a>
                            </li>
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Business Type Comparison Chart                        </a>
                            </li>
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">LLC Information by State                        </a>
                            </li>
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Corporation Information by State                        </a>
                            </li>
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Get a Corporate / LLC Kit    </a>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>

    {{-- SUPPORT link --}}
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="footer_main_item matchHeight" style="height: 231px;">
                <section id="nav_menu-8" class="widget widget_nav_menu">
                    <h5 class="widget-title">SUPPORT </h5>
                    <div class="menu-important-links-container">
                        <ul id="menu-important-links" class="menu rt-mega-menu-transition-slide">
                            <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Contact Us: New Sales                                </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Affiliates                               </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Sitemaps                               </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Cancellation Policy                                </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Privacy Policy                                </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Legal Disclaimer                                </a>
                             </li>
                             <li id="menu-item-1019"  class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                <a href="#">Glossary</a>
                             </li>
                        </ul>
                    </div>
                </section>
            </div>
    </div>

    {{--  --}}

       </div>

       {{-- Social Link --}}
       <div class="col-md-12" style="margin-top:10%;">
            <div class="col-md-6" align="left">
                <div class="">
                    <p>© 2022. Sharpformation.com All Rights Reserved.</p>
                </div>
           </div>
            <div class="col-md-6" align="right">
                    <ul style="display:flex;justify-content: end;">
                        <li style="margin-right: 0px !important; margin-left: 0px !important;"><a href="#" rel="publisher"
                            target="_blank"><img src="{{asset('web icons/insta.png')}}" style="width: 50px;"></a></li>
                        <li  style="margin-right: 0px !important; margin-left: 0px !important;"><a href="https://facebook.com/" target="_blank">
                        <img src="{{asset('web icons/facebook.png')}}" style="width: 50px;"></a></li>
                        <li  style="margin-right: 0px !important; margin-left: 0px !important;"><a href="#" target="_blank">
                        <img src="{{asset('web icons/whatsapp.png')}}" style="width: 50px;"></a></li>
                    </ul>
          </div>
        </div>

    {{-- social link end  --}}
    </div>
</div>

{{-- 
    <div class="wraper_footer_main">
        <div class="container">

            <div class="row footer_main">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer_main_item matchHeight" style="height: 231px;">
                        <section id="text-4" class="widget widget_text">
                            <h5 class="widget-title">About Us</h5>
                            <div class="textwidget">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore iste doloribus at, dignissimos, reiciendis maiores et delectus eum qui modi eligendi! Facere impedit ut, illo ullam distinctio a id animi!.</p>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer_main_item matchHeight" style="height: 231px;">
                        <section id="nav_menu-8" class="widget widget_nav_menu">
                            <h5 class="widget-title">Important Links</h5>
                            <div class="menu-important-links-container">
                                <ul id="menu-important-links" class="menu rt-mega-menu-transition-slide">
                                    <li id="menu-item-1019"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li id="menu-item-1019"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1019">
                                        <a href="#">Services</a>
                                    </li>
                                    <li id="menu-item-338"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-338">
                                        <a href="#">About Us</a>
                                    </li>
                                    <li id="menu-item-342"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-342">
                                        <a href="#">Contact
                                            Us</a>
                                    </li>
                                    <li id="menu-item-1018"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1018">
                                        <a href="#">FAQs</a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer_main_item matchHeight" style="height: 231px;">
                        <section id="nav_menu-9" class="widget widget_nav_menu">
                            <h5 class="widget-title">Featured Services</h5>
                            <div class="menu-featured-services-container">
                                <ul id="menu-featured-services" class="menu rt-mega-menu-transition-slide">
                                    <li id="menu-item-344"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-344">
                                        <a href="https://seolounge.radiantthemes.com/local-seo/">Local SEO</a>
                                    </li>
                                    <li id="menu-item-1012"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1012">
                                        <a href="https://seolounge.radiantthemes.com/social-media-marketing/">Social
                                            Media Marketing</a>
                                    </li>
                                    <li id="menu-item-345"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-345">
                                        <a href="https://seolounge.radiantthemes.com/pay-per-click-management/">Pay
                                            Per Click Management</a>
                                    </li>
                                    <li id="menu-item-343"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-343">
                                        <a href="https://seolounge.radiantthemes.com/search-engine-optimization/">Search
                                            Engine Optimization</a>
                                    </li>
                                    <li id="menu-item-1013"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1013">
                                        <a href="https://seolounge.radiantthemes.com/free-seo-analysis/">Free
                                            SEO Analysis</a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer_main_item matchHeight" style="height: 231px;">
                        <section id="text-5" class="widget widget_text">
                            <h5 class="widget-title">Contact Us</h5>
                            <div class="textwidget">
                                <p><strong>Office Address</strong><br>
                                    16122 Collins Street West,<br>
                                    Melbourne, VIC</p>
                                <p><strong>Phone:</strong> 888-123-4587</p>
                                <p><strong>Email:</strong> info@example.com</p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}


    {{-- <div class="wraper_footer_copyright">
        <div class="container">

            <div class="row footer_copyright">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">

                    <div class="footer_copyright_item">
                        <p>Deveopled by <a href="https://az-solutions.pk/"
                                rel="nofollow">AZ-Solutions</a></p>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">

                    <div class="footer_copyright_item">

                        <ul class="social" style="display: flex;">
                            <li class="google-plus"><a href="#" rel="publisher"
                                target="_blank"><img src="{{asset('web icons/insta.png')}}" style="width: 20%;"></a></li>
                        <li class="facebook"><a href="https://facebook.com/" target="_blank">
                            <img src="{{asset('web icons/facebook.png')}}" style="width: 20%;"></a></li>
                        <li class="twitter"><a href="#" target="_blank">
                            <img src="{{asset('web icons/whatsapp.png')}}" style="width: 20%;"></a></li> --}}

                            {{-- <li class="google-plus"><a href="https://plus.google.com/" rel="publisher"
                                    target="_blank"><img src="{{asset('web icons/insta.png')}}" style="width: 20%;"></a></li>
                            <li class="facebook"><a href="https://facebook.com/" target="_blank"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="https://twitter.com/" target="_blank"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="vimeo"><a href="https://vimeo.com/" target="_blank"><i
                                        class="fa fa-vimeo"></i></a></li> --}}
                        {{-- </ul>

                    </div>

                </div>
            </div>

        </div>
    </div> --}}

</footer>
