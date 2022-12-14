<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
    @if ($cat_name != null)
        <nav id="sidebar">
            <div class="profile-info">
                <figure class="user-cover-image"></figure>
                <div class="user-info">
   
                    @if(!empty(auth()->user()->avatar1))
                       <img src="{{ asset('users_imgs/' . auth()->user()->avatar1) }}" alt="admin-avatar">
                    @else
                       <img src="{{ asset('assets/img/dumy.jpg') }}" alt="admin-avatar">
                    @endif
                    
                </div>
            </div>
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">

                <li class="menu {{ $cat_name === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ dashboard() }}" aria-expanded="{{ $cat_name === 'dashboard' ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>

           


                <li class="menu {{ $cat_name === 'songs' ? 'active' : '' }}">
                    <a href="#pkgs" data-toggle="collapse"
                        aria-expanded="{{ $cat_name === 'songs' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="file"></i>
                            <span>Song</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ $cat_name === 'songs' ? 'show' : '' }}"
                        id="pkgs" data-parent="#accordionExample">
                            <li class="{{ $page_name === 'songs' ? 'active' : '' }}">
                                <a href="{{ url('/songs') }}"> Manage Songs </a>
                            </li>

                            {{-- <li class="{{ $page_name === 'pkg_cat' ? 'active' : '' }}">
                                <a href="{{ route('pkg_cat.index') }}">Manage Category</a>
                            </li> --}}

                            <li class="{{ $page_name === 'artists' ? 'active' : '' }}">
                                <a href="{{ url('/artists') }}"> Manage Artists </a>
                            </li>

                            {{-- <li class="{{ $page_name === 'addon' ? 'active' : '' }}">
                                <a href="{{ route('pkg_addon.index') }}"> Add On </a>
                            </li> --}}

                            <li class="{{ $page_name === 'likes' ? 'active' : '' }}">
                                <a href="{{ url('/likes') }}"> Manage Likes </a>
                            </li>       
                            
                            <li class="{{ $page_name === 'tastes' ? 'active' : '' }}">
                                <a href="{{ url('/tastes') }}"> Manage Tastes </a>
                            </li>  
                    </ul>
                </li>

               


                <li class="menu {{ $cat_name === 'visitors' ? 'active' : '' }} ">
                    <a href="#visitors" data-toggle="collapse"
                        aria-expanded="{{ $cat_name === 'visitors' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="users"></i>
                            <span>Visitors</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled {{ $cat_name === 'visitors' ? 'show' : '' }}"
                        id="visitors" data-parent="#accordionExample">
                        <li class="{{ $page_name === 'contact_us_messages' ? 'active' : '' }}">
                            <a href="{{ url('/contacts') }}"> Contact-us Messages </a>
                        </li>
                        <li class="{{ $page_name === 'visitors' ? 'active' : '' }}">
                            <a href="{{ url('/visitors') }}"> Site Visitors </a>
                        </li>
                    </ul>
                </li>


                <li class="menu {{ $cat_name === 'roles_perm' ? 'active' : '' }} ">
                    <a href="#rolesnper" data-toggle="collapse"
                        aria-expanded="{{ $cat_name === 'roles_perm' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="user"></i>
                            <span>Roles & Permissions</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled {{ $cat_name === 'roles_perm' ? 'show' : '' }}"
                        id="rolesnper" data-parent="#accordionExample">


                        <li class="{{ $page_name === 'roles' ? 'active' : '' }}">
                            <a href="{{ url('/roles') }}"> Roles </a>
                        </li>
  <li class="{{ $page_name === 'permissions' ? 'active' : '' }}">
                            <a href="{{ url('/permissions') }}"> Permissions </a>
                            </li> 

                        <li class="{{ $page_name === 'role_perm' ? 'active' : '' }}">
                            <a href="{{ url('/manage-role-permissions') }}">Manage Permissions
                            </a>
                        </li>
                        
                    </ul>
                </li>


                <li class="menu {{ $cat_name === 'settings' ? 'active' : '' }}">
                    <a href="#settings" data-toggle="collapse"
                        aria-expanded="{{ $cat_name === 'settings' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="settings"></i>
                            <span>Settings</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>

                 <ul class="collapse submenu list-unstyled {{ $cat_name === 'settings' ? 'show' : '' }}"
                        id="settings" data-parent="#accordionExample">
                        <li class="{{ $page_name === 'site_services' ? 'active' : '' }}">
                            <a href="{{ url('/site-services') }}"> Site Services </a>
                        </li>

                   

                        <li class="{{ $page_name === 'faq' ? 'active' : '' }}">
                            <a href="{{ route('faq.index') }}">Manage Faqs </a>
                        </li>
                        
                        {{-- <li class="{{ $page_name === 'site_services' ? 'active' : '' }}">
                            <a href="{{ url('/web-images') }}"> Website Images </a>
                        </li>
                        <li class="{{ $page_name === 'site_services' ? 'active' : '' }}">
                            <a href="{{ url('/web-images') }}"> Site Content </a>
                        </li> --}}

                        {{-- <li class="{{ $page_name === 'pkg_plans' ? 'active' : '' }}">
                            <a href="{{ url('/web-pkgs') }}"> Package Type </a>
                        </li> --}}

                      
                    </ul>
                </li>
            </ul>

        </nav>
    @endif

</div>
<!--  END SIDEBAR  -->
