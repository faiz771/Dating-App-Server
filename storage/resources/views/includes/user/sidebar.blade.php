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
                    <a href="{{ dashboard() }}" aria-expanded="{{ $cat_name === 'dashboard' ? 'true' : 'false' }}" class="dropdown-toggle">
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


                <li class="menu {{ $cat_name === 'purchased_pkg' ? 'active' : '' ; }}">
                    <a href="{{ url('/purchased-package-plan') }}" aria-expanded="{{ $cat_name === 'purchased_pkg' ? 'true' : 'false' ; }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="user"></i>
                            <span>Puchased Package Plan</span>
                        </div>
                    </a>
                </li>

                <li class="menu {{ $cat_name === 'status_of_proccess' ? 'active' : ''; }}">
                    <a href="{{ url('/status-of-proccess') }}" aria-expanded="{{ $cat_name === 'status_of_proccess' ? 'true' : 'false'; }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="file"></i>
                            <span>Status of process</span>
                        </div>
                    </a>
                </li>

                <li class="menu {{ $cat_name === 'payment_records' ? 'active' : ''; }} ">
                    <a href="{{ url('/payment-records') }}" aria-expanded="{{ $cat_name === 'payment_records' ? 'true' : 'false'; }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="users"></i>
                            <span>Payment Records</span>
                        </div>
                    </a>
                </li>

                <li class="menu {{ $cat_name === 'document' ? 'active' : ''; }} ">
                    <a href="{{ route('up_document.index') }}" aria-expanded="{{ $cat_name === 'document' ? 'true' : 'false'; }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="file-text"></i>
                            <span>Document</span>
                        </div>
                    </a>
                </li>

                @php
                  $order_compete = App\Models\Order::where('user_id',auth()->user()->id)->first();
                @endphp

@if($order_compete->status == 'completed')
                <li class="menu {{ $cat_name === 'settings' ? 'active' : ''; }} ">
                    <a href="{{ url('/testimonials') }}" aria-expanded="{{ $cat_name === 'testimonals' ? 'true' : 'false'; }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="message-square"></i>
                            <span>Testimonials</span>
                        </div>
                    </a>
                </li>
@endif

            </ul>
        </nav>
    @endif

</div>
<!--  END SIDEBAR  -->
