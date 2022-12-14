 <!--  BEGIN NAVBAR  -->
 <div class="header-container fixed-top">
     <header class="header navbar navbar-expand-sm">

         <ul class="navbar-nav theme-brand flex-row  text-center">
             <li class="nav-item theme-logo">
                 <a href="{{ url('/dashboard') }}">
                     <img src="{{ asset('assets/img/3.png') }}" class="navbar-logo" alt="logo">
                 </a
             </li>
             <li class="nav-item theme-text">
                 <a href="{{ dashboard() }}" class="nav-link" style="font-size: 17px;"> {{ auth()->user()->name }}
                 </a>
             </li>
             <li class="nav-item toggle-sidebar">
                 <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-list">
                         <line x1="8" y1="6" x2="21" y2="6"></line>
                         <line x1="8" y1="12" x2="21" y2="12"></line>
                         <line x1="8" y1="18" x2="21" y2="18"></line>
                         <line x1="3" y1="6" x2="3" y2="6"></line>
                         <line x1="3" y1="12" x2="3" y2="12"></line>
                         <line x1="3" y1="18" x2="3" y2="18"></line>
                     </svg></a>
             </li>
         </ul>


         <ul class="navbar-item flex-row search-ul">

         </ul>

         <ul class="navbar-item flex-row navbar-dropdown">



             <li class="nav-item dropdown notification-dropdown">
                 <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-bell">
                         <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                         <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                     </svg>
                     <span class="badge badge-success">{{ count(notifications()) }}</span>
                 </a>
                 <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                     <div class="notification-scroll">
                         <div class="dropdown-item">
                             @foreach (notifications() as $val)
                                 @php
                                     $class = $val->read_at != null ? 'check-circle' : 'check';
                                 @endphp
                                 <div class="media server-log">
                                     <div class="media-body">
                                         <div class="data-info">
                                             <h6 class="">{{ $val->data['message'] }}</h6>
                                             <p class="">{{ timeDiff($val->created_at) }} min ago</p>
                                         </div>
                                         <div class="icon-status">
                                             <a href="javascript:void(0)"> <i data-feather="{{ $class }}"></i>
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach

                             @if (count(notifications()) > 0)
                                 <a href="{{ url('/mark-all-as-read') }}" class="">
                                     <p> Mark all as read </p>
                                 </a>
                             @endif
                         </div>
                     </div>
                 </div>
             </li>

             <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                 <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-settings">
                         <circle cx="12" cy="12" r="3"></circle>
                         <path
                             d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                         </path>
                     </svg>
                 </a>
                 <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                     <div class="user-profile-section">
                         <div class="media mx-auto">

                            

                                 @if(!empty(auth()->user()->avatar1))
                                    <img src="{{ asset('users_imgs/' . auth()->user()->avatar1) }}" class="img-fluid mr-2"
                                    alt="avatar">
                                @else
                                    <img src="{{ asset('assets/img/dumy.jpg') }}" class="img-fluid mr-2" alt="admin-avatar">
                                @endif


                             <div class="media-body">
                                 <h5>{{ auth()->user()->name }}</h5>
                             </div>
                         </div>
                     </div>
                     @if(auth()->user()->userType == 'customer/user')

                     @php
                     $id = Crypt::encrypt(auth()->user()->id);
                     @endphp

                     <div class="dropdown-item">
                         <a href="{{ url('/view-user/' .$id) }}">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                 <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                 <circle cx="12" cy="7" r="4"></circle>
                             </svg> <span>My Profile</span>
                         </a>
                     </div>

                     @else
                     <div class="dropdown-item">
                        <a href="{{ url('/my-profile') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg> <span>My Profile</span>
                        </a>
                    </div>
                     @endif
                     {{-- <div class="dropdown-item">
                        <a href="apps_mailbox.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-inbox">
                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                <path
                                    d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                </path>
                            </svg> <span>My Inbox</span>
                        </a>
                    </div> --}}
                     <div class="dropdown-item">
                         <a href="{{ route('logout') }}"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                 <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                 <polyline points="16 17 21 12 16 7"></polyline>
                                 <line x1="21" y1="12" x2="9" y2="12"></line>
                             </svg> <span>{{ __('Logout') }}</span>
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 </div>
             </li>
         </ul>
     </header>
 </div>
 <!--  END NAVBAR  -->
