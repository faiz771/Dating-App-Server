<!--  BEGIN SIDEBAR  -->
@php
$perms = SF::getRolePermissions(auth()->user()->id);
$permissions = $perms['permissions'];
$admin = auth()->user()->id;
@endphp
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
                @foreach ($permissions as $val)
                    @if ($val === 'view dashboard')
                        <li class="menu {{ $cat_name === 'dashboard' ? 'active' : '' }}">
                            <a href="{{ dashboard() }}"
                                aria-expanded="{{ $cat_name === 'dashboard' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach


                @foreach ($permissions as $val)
                    @if ($val === 'users/customers')
                        <li class="menu {{ $cat_name === 'users' ? 'active' : '' }}">
                            <a href="#users" data-toggle="collapse"
                                aria-expanded="{{ $cat_name === 'users' ? 'true' : 'false' }}" class="dropdown-toggle">
                                <div class="">
                                    <i data-feather="user"></i>
                                    <span>Customer</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled {{ $cat_name === 'users' ? 'show' : '' }}"
                                id="users" data-parent="#accordionExample">
                                @foreach ($permissions as $val)
                                    @if ($val === 'manage customers/users')
                                        <li class="{{ $page_name === 'users' ? 'active' : '' }}">
                                            <a href="{{ url('/customers') }}"> Manage Customers </a>
                                        </li>
                                    @endif
                                @endforeach
                                @foreach ($permissions as $val)
                                    @if ($val === 'users approval requests')
                                        <li class="{{ $page_name === 'approval_requests' ? 'active' : '' }}"
                                            style="position:relative;">
                                            <a href="{{ url('/user-requests') }}"> Approval Requests </a>
                                            <span class="badge badge-success"
                                                style="position:absolute; top:15px; right:5px;">
                                                {{ count(approvalRequests()) }} </span>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </li>
                    @endif
                @endforeach


                @foreach ($permissions as $val)
                    @if ($val === 'packages')
                        <li class="menu {{ $cat_name === 'packages' ? 'active' : '' }}">
                            <a href="#pkgs" data-toggle="collapse"
                                aria-expanded="{{ $cat_name === 'packages' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <i data-feather="file"></i>
                                    <span>Package</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled {{ $cat_name === 'packages' ? 'show' : '' }}"
                                id="pkgs" data-parent="#accordionExample">

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage packages')
                                        <li class="{{ $page_name === 'packages' ? 'active' : '' }}">
                                            <a href="{{ url('/packages') }}"> Manage Packages </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'Manage package Category')
                                        <li class="{{ $page_name === 'pkg_cat' ? 'active' : '' }}">
                                            <a href="{{ route('pkg_cat.index') }}">Manage Category</a>
                                        </li>
                                    @endif
                               @endforeach

                            @foreach ($permissions as $val)
                                @if ($val === 'Manage package State')
                                    <li class="{{ $page_name === 'state' ? 'active' : '' }}">
                                        <a href="{{ route('state.index') }}"> Manage State </a>
                                    </li>
                                @endif
                            @endforeach

                            @foreach ($permissions as $val)
                                @if ($val === 'Manage package Add On')
                                    <li class="{{ $page_name === 'addon' ? 'active' : '' }}">
                                        <a href="{{ route('pkg_addon.index') }}"> Add On </a>
                                    </li>
                                @endif
                           @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage package services')
                                        <li class="{{ $page_name === 'package_services' ? 'active' : '' }}">
                                            <a href="{{ url('/services-of-packages') }}"> Package Features </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

                @foreach ($permissions as $val)
                    @if ($val === 'orders')
                        <li class="menu {{ $cat_name === 'orders' ? 'active' : '' }} ">
                            <a href="#orders" data-toggle="collapse"
                                aria-expanded="{{ $cat_name === 'orders' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <i data-feather="shopping-bag"></i>
                                    <span>Orders</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>

                            <ul class="collapse submenu list-unstyled {{ $cat_name === 'orders' ? 'show' : '' }}"
                                id="orders" data-parent="#accordionExample">

                                @foreach ($permissions as $val)
                                    @if ($val === 'view pending orders')
                                        <li class="{{ $page_name === 'pending_orders' ? 'active' : '' }}">
                                            <a href="{{ url('/pending-orders') }}"> Pending Orders </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'view completed orders')
                                        <li class="{{ $page_name === 'completed_orders' ? 'active' : '' }}">
                                            <a href="{{ url('/completed-orders') }}"> Completed Orders </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'view running orders')
                                        <li class="{{ $page_name === 'running_orders' ? 'active' : '' }}">
                                            <a href="{{ url('/running-orders') }}"> Running Orders </a>
                                        </li>
                                    @endif
                                @endforeach


                                @foreach ($permissions as $val)
                                    @if ($val === 'manage orders')
                                        <li class="{{ $page_name === 'manage_orders' ? 'active' : '' }}">
                                            <a href="{{ url('/orders') }}"> Manage Orders </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

                @foreach ($permissions as $val)
                    @if ($val === 'accounts')
                        <li class="menu {{ $cat_name === 'accounts' ? 'active' : '' }} ">
                            <a href="#accounts" data-toggle="collapse"
                                aria-expanded="{{ $cat_name === 'accounts' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <i data-feather="shopping-bag"></i>
                                    <span>Accounts</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>

                            <ul class="collapse submenu list-unstyled {{ $cat_name === 'accounts' ? 'show' : '' }}"
                                id="accounts" data-parent="#accordionExample">
                                @foreach ($permissions as $val)
                                    @if ($val === 'manage sales')
                                        <li class="{{ $page_name === 'sales' ? 'active' : '' }}">
                                            <a href="{{ url('/accounts/sales') }}"> Sales </a>
                                        </li>
                                    @endif
                                @endforeach


                                @foreach ($permissions as $val)
                                    @if ($val === 'manage accounts sheet')
                                        <li class="{{ $page_name === 'account_sheet' ? 'active' : '' }}">
                                            <a href="{{ url('/accounts/sheet') }}"> Account Sheet </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

                @foreach ($permissions as $val)
                    @if ($val === 'visitors')
                        <li class="menu {{ $cat_name === 'visitors' ? 'active' : '' }} ">
                            <a href="#visitors" data-toggle="collapse"
                                aria-expanded="{{ $cat_name === 'visitors' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <i data-feather="users"></i>
                                    <span>Visitors</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>

                            <ul class="collapse submenu list-unstyled {{ $cat_name === 'visitors' ? 'show' : '' }}"
                                id="visitors" data-parent="#accordionExample">

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage contact-us messages')
                                        <li class="{{ $page_name === 'contact_us_messages' ? 'active' : '' }}">
                                            <a href="{{ url('/contacts') }}"> Contact-us Messages </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'Site Visitors')
                                        <li class="{{ $page_name === 'visitors' ? 'active' : '' }}">
                                            <a href="{{ url('/visitors') }}"> Site Visitors </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

                @foreach ($permissions as $val)
                    @if ($val === 'roles & permissions')
                        <li class="menu {{ $cat_name === 'roles_perm' ? 'active' : '' }} ">
                            <a href="#rolesnper" data-toggle="collapse"
                                aria-expanded="{{ $cat_name === 'roles_perm' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <i data-feather="user"></i>
                                    <span>Roles & Permissions</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>

                            <ul class="collapse submenu list-unstyled {{ $cat_name === 'roles_perm' ? 'show' : '' }}"
                                id="rolesnper" data-parent="#accordionExample">

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage roles')
                                        <li class="{{ $page_name === 'roles' ? 'active' : '' }}">
                                            <a href="{{ url('/roles') }}"> Roles </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage permissions')
                                        <li class="{{ $page_name === 'permissions' ? 'active' : '' }}">
                                            <a href="{{ url('/permissions') }}"> Permissions </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage role permissions')
                                        <li class="{{ $page_name === 'role_perm' ? 'active' : '' }}">
                                            <a href="{{ url('/manage-role-permissions') }}">Manage </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

                @foreach ($permissions as $val)
                    @if ($val === 'web setting')
                        <li class="menu {{ $cat_name === 'settings' ? 'active' : '' }}">
                            <a href="#settings" data-toggle="collapse"
                                aria-expanded="{{ $cat_name === 'settings' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <i data-feather="settings"></i>
                                    <span>Settings</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>

                            <ul class="collapse submenu list-unstyled {{ $cat_name === 'settings' ? 'show' : '' }}"
                                id="settings" data-parent="#accordionExample">

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage site services')
                                        <li class="{{ $page_name === 'site_services' ? 'active' : '' }}">
                                            <a href="{{ url('/site-services') }}"> Site Services </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage site images')
                                        <li class="{{ $page_name === 'site_services' ? 'active' : '' }}">
                                            <a href="{{ url('/web-images') }}"> Website Images </a>
                                        </li>
                                    @endif
                                @endforeach


                                @foreach ($permissions as $val)
                                    @if ($val === 'manage site content')
                                        <li class="{{ $page_name === 'site_services' ? 'active' : '' }}">
                                            <a href="{{ url('/web-images') }}"> Site Content </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage site package plans')
                                        <li class="{{ $page_name === 'pkg_plans' ? 'active' : '' }}">
                                            <a href="{{ url('/web-pkgs') }}"> Package Plans </a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach ($permissions as $val)
                                @if ($val === 'manage testimonials')
                                    <li class="{{ $page_name === 'testimonals' ? 'active' : '' }}">
                                        <a href="{{ url('/testimonials') }}"> Testimonials </a>
                                    </li>
                                @endif
                            @endforeach

                                @foreach ($permissions as $val)
                                    @if ($val === 'manage faq')
                                          <li class="{{ $page_name === 'faq' ? 'active' : '' }}">
                                                <a href="{{ route('faq.index') }}">Manage Faqs </a>
                                            </li>
                                    @endif
                                @endforeach

                            </ul>
                        </li>
                    @endif
                @endforeach


            </ul>

        </nav>
    @endif

</div>
<!--  END SIDEBAR  -->
