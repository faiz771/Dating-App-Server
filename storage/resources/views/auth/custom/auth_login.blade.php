<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Relationship app</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/header_logo3.png') }}" />
    {{-- <!-- BEGIN GLOBAL MANDATORY STYLES --> --}}
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    {{-- <!-- END GLOBAL MANDATORY STYLES --> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
</head>

<body class="form" style="background-image:url('{{ asset("assets/img/banner.jpg") }}'); background-repeat:no-repeat; background-size:auto;">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container" style="padding-top: 10%;padding-bottom: 20%;">
                    <div class="form-content">
                        <div class="form_logo"
                            style="box-sizing: border-box; border-radius: 1.2em;">
                            <img src="{{ asset('assets/img/header_logo3.png') }}" alt="logo" style="width:100% ;">
                        </div>
                        <h1 class="">Sign In</h1>
                        <p class="">Log in to your account to continue.</p>

                        <form method="POST" action="{{ route('login') }}" class="text-left">
                            @csrf
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <label for="username">Email</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="email" type="email" name="email" type="text" class="form-control"
                                        placeholder="Enter Your Email" value="{{ old('email') }}">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Password</label>
                                        <a href="{{ route('password.request') }}" class="forgot-pass-link">Forgot
                                            Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Login</button>
                                    </div>
                                </div>

                                <div class="division">
                                    <span>OR</span>
                                </div>

                                {{-- <p class="signup-link">Not registered ? <a href="{{ url('/register') }}" style="color: #ee8d22;">Create an
                                    account</a></p> --}}

                                <p class="signup-link">Not registered ? <a href="{{ url('/launch-my-llc') }}" style="color: #ee8d22;">Create an
                                        account</a></p>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <!-- BEGIN GLOBAL MANDATORY SCRIPTS --> --}}
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- <!-- END GLOBAL MANDATORY SCRIPTS --> --}}
    <script src="{{ asset('assets/js/authentication/form-2.js') }}"></script>

    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif

    @if (Session::has('active'))
        <script>
            toastr.error("{{ Session::get('active') }}");
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <script>
                toastr.error("{{ $err }}");
            </script>
        @endforeach
    @endif

</body>

</html>
