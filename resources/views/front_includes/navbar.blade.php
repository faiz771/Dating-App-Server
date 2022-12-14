<header class="wraper_header style-five-a floating-header">

    <div id="sticky-wrapper" class="sticky-wrapper" style="height: 77px;">
        <div class="wraper_header_main i-am-sticky" style="position:fixed;">
            {{-- <div class="container"> --}}
                <div class="" style="padding:10px">
                <div class="header_main">
                    <div class="brand-logo">
                        <div class="brand-logo-table">
                            <div class="brand-logo-table-cell ">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/img/1.png') }}" alt=""  data-no-retina="" class="img-fluid" style="position: absolute;top: -19px;width: 54%;left: 0px;height: auto;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="responsive-nav hidden-lg hidden-md visible-sm visible-xs">
                        <i class="fa fa-bars"></i>
                    </div>
                    <nav class="nav visible-lg visible-md hidden-sm hidden-xs">
                        <div class="menu-header-menu-container">
                            <ul id="menu-header-menu" class="menu rt-mega-menu-transition-slide">

                                <li id="menu-item-899"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-flyout rt-mega-menu-hover item-899">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>

                                <li id="menu-item-899"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-flyout rt-mega-menu-hover item-899">
                                    <a href="{{ url('/launch-my-llc') }}">Pricing</a>
                                </li>

                                <li id="menu-item-219"
                                    class="services-megamenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children rt-mega-menu-full-width rt-mega-menu-hover item-219">
                                    <a href="#">Services</a>
                                    <div class="rt-mega-menu">
                                        <ul class=" rt-mega-menu-row">
                                            <li id="menu-item-2186"
                                                class="menu-item menu-item-type-menu_widget menu-item-object-nav_menu-10 rt-mega-menu-col rt-mega-menu-hover item-2186">
                                                <div class="rt-megamenu-widget">
                                                    <div class="widget widget_nav_menu">
                                                        {{-- <h3 class="rt-megamenu-widget-title">Featured Services
                                                        </h3> --}}
                                                        <div class="menu-featured-services-menu-1-services-container">
                                                            <ul id="menu-featured-services-menu-1-services"
                                                                class="menu rt-mega-menu-transition-slide">

                                                                <li id="menu-item-1349"
                                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1349">
                                                                <a href="{{ url('/ein_service_Form') }}" style="color: #000;font-size: 20px; font-weight: 500;">EIN / TAX</a>
                                                                   </li>
                                                                {{-- @foreach (SF::front_services() as $val)
                                                                    <li id="menu-item-1349"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1349">
                                                                        <a
                                                                            href="javacript:void(0)">{{ $val->name }}</a>
                                                                    </li>
                                                                @endforeach --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li id="menu-item-2187"
                                                class="menu-item menu-item-type-menu_widget menu-item-object-nav_menu-11 rt-mega-menu-col rt-mega-menu-hover item-2187">
                                                <div class="rt-megamenu-widget">
                                                    <div class="widget widget_nav_menu">
                                                        {{-- <h3 class="rt-megamenu-widget-title">&nbsp;</h3> --}}
                                                        <div class="menu-featured-services-menu-2-services-container">
                                                            <ul id="menu-featured-services-menu-2-services"
                                                                class="menu rt-mega-menu-transition-slide">
                                                                <li id="menu-item-1349"
                                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1349">
                                                                <a href="{{ url('/tm_index') }}" style="color: #000;font-size: 20px; font-weight: 500;">Trade Mark</a>
                                                                   </li>
                                                                {{-- @foreach (SF::front_services() as $val)
                                                                    <li id="menu-item-1349"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1349">
                                                                        <a href="javacript:void(0)">{{ $val->name }}</a>
                                                                    </li>
                                                                @endforeach --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                            <li id="menu-item-2188"
                                                class="menu-item menu-item-type-menu_widget menu-item-object-nav_menu-12 rt-mega-menu-col rt-mega-menu-hover item-2188">
                                                <div class="rt-megamenu-widget">
                                                    <div class="widget widget_nav_menu">
                                                        {{-- <h3 class="rt-megamenu-widget-title">SEO Whitepaper
                                                        </h3> --}}
                                                        <div class="menu-seo-whitepaper-services-container">
                                                            <ul id="menu-seo-whitepaper-services"
                                                                class="menu rt-mega-menu-transition-slide">
                                                                <li id="menu-item-1349"
                                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1349">
                                                                <a href="{{ url('/launch-my-llc') }}" style="color: #000;font-size: 20px; font-weight: 500;">LLC</a>
                                                                   </li>
                                                                {{-- @foreach (SF::front_services() as $val)
                                                                    <li id="menu-item-1349"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-flyout rt-mega-menu-hover item-1349">
                                                                        <a
                                                                            href="javacript:void(0)">{{ $val->name }}</a>
                                                                    </li>
                                                                @endforeach --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>

                                <li id="menu-item-899"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-flyout rt-mega-menu-hover item-899">
                                    <a href="{{ url('/landingpageAboutUs') }}">About Us</a>
                                </li>

                                {{-- <li id="menu-item-899"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-flyout rt-mega-menu-hover item-899">
                                    <a href="{{ url('/ein_service_Form') }}">EIN</a>
                                </li>

                                <li id="menu-item-899"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-flyout rt-mega-menu-hover item-899">
                                <a href="{{ url('/tm_index') }}">TM</a>
                            </li> --}}

                                {{-- <li id="menu-item-899"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-flyout rt-mega-menu-hover item-899">
                                    <a href="#">Blog</a>
                                </li> --}}

                                <li id="menu-item-711"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-flyout rt-mega-menu-hover item-711">
                                    <a href="{{ url('/landing_page_contact_us') }}">Contact</a>
                                </li>

                                @if (auth()->user())
                                    <li id="menu-item-936"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children rt-mega-menu-full-width rt-mega-menu-hover item-936">
                                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                                    </li>
                                @else
                                    <li id="menu-item-936"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children rt-mega-menu-full-width rt-mega-menu-hover item-936">
                                        <a href="{{ url('/login') }}">Login/Register</a>
                                    </li>
                                @endif

                                {{-- <li id="menu-item-936"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children rt-mega-menu-full-width rt-mega-menu-hover item-936">
                                    <a href="{{ url('/launch-my-llc') }}" class="btn get-started-btn-bbb"
                                        style="">Launch My LLC</a>
                                </li> --}}

                            </ul>
                        </div>
                    </nav>

                    <div class="brand-logo-btn">
                        <div class="brand-logo-table">
                            <div class="brand-logo-table-cell " style="margin-top: -10px;"> 
                                <a href="{{ url('/') }}">
                                    <a href="{{ url('/launch-my-llc') }}" class="btn get-started-btn-bbb llc_btn"  style="">Launch My LLC</a>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children rt-mega-menu-full-width rt-mega-menu-hover item-936">
                    </div> --}}

                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>

</header>
