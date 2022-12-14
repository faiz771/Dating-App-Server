<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>

    {{--  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    @include('front_includes.head_links')
    <link rel="stylesheet" href="{{ asset('assets/css/elements/custom-pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/elements/custom-pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/launch-my-llc/style.css') }}">
</head>




<body class="page-template-default page page-id-5504 theme-seolounge woocommerce-js wpb-js-composer js-comp-ver-6.5.0 vc_responsive" data-page-transition="1" data-header-style="header-style-five-a" data-nicescroll-cursorcolor="#fb0000" data-nicescroll-cursorwidth="8px">

    <div class="overlay"></div>

    <div class="page-transition-layer">
        <svg class="page-transition-layer-spinner" width="65px" height="65px" viewBox="0 0 66 66"
            xmlns="http://www.w3.org/2000/svg">
            <circle class="page-transition-layer-spinner-path" fill="none" stroke-width="6" stroke-linecap="round"
                cx="33" cy="33" r="30"></circle>
        </svg>
    </div>


    <div class="radiantthemes-website-layout full-width">


        @include('front_includes.navbar')
        {{-- @include('front_includes.navbarMobileView') --}}

        <div id="page" class="site">
            @yield('content')
            @include('front_includes.modals')
        </div>


        @include('front_includes.footer')

    </div>

    @include('front_includes.extra-js')

    {{-- @include('front_includes.mobile-menu') --}}
</body>

@if ($errors->any())
    @foreach ($errors->all() as $err)
        <script>
            toastr.error("{{ $err }}");
        </script>
    @endforeach
@endif

@if (Session::has('email_error'))
    <script>
        toastr.error("{{ Session::get('email_error') }}");
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif

@if (Session::has('delete'))
    <script>
        toastr.error("{{ Session::get('delete') }}");
    </script>
@endif

@if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js'></script>


<script>
    $(document).ready(function() {
$('.testimonial-slider').slick({
    autoplay: true,
    autoplaySpeed: 1000,
    speed: 600,
    draggable: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
            breakpoint: 575,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
        }
    ]
});
});
</script>


<script>

$(document).on('click' , '.add_member' , function(){
    let html=`              
            <label class="col-form-label d-block"></label>
            <input name="com_info_member[]" type="text" class="" id="f-a" @error('com_info_member') is-invalid @enderror">
            @error('com_info_member')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            `;
        $('.add_more_ein_member').append(html);     
});


$(document).on('click', '.i_am_foregin_citizen_yes', function(){
         $('#hide_ssn_info').hide();
         $('#ein_confirm_form').modal('show');
});

$(document).on('click', '.i_am_foregin_citizen_no', function(){
         $('#hide_ssn_info').show();
        $('#ein_confirm_form').modal('hide');
});


    // testimonial slider


// 

// $(document).on('click', '.ein_confirm_next_button', function(){
//         $('#ein_Confirm_model').modal('show');
// });

    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?28599';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"Message Us",
      "borderRadius":"25",
      "marginLeft":"0",
      "marginBottom":"50",
      "marginRight":"50",
      "position":"right"
  },
  "brandSetting":{
      "brandName":"{{ config('app.name') }}",
      "brandSubTitle":"Typically replies within a day",
      "brandImg":"https://sharpformation.az-solutions.pk/public/assets/img/sharp%20formation%20logo-01.png",
      "welcomeText":"Hi there!\nHow we can help you?",
      "messageText":"Your Message",
      "backgroundColor":"#0a5f54",
      "ctaText":"Start Chat",
      "borderRadius":"25",
      "autoShow":false,
      "phoneNumber":"+1512 846-7921"
  }
};

    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);

</script>


{{--  --}}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

{{--  --}}

{{-- Next slide code start --}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.2/build/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

@include('front_includes.custom_form_js')
<script type="text/javascript">
    feather.replace();
</script>
{{-- Next slide code end --}}
<loom-container id="lo-engage-ext-container">
    <loom-shadow classname="resolved"></loom-shadow>
</loom-container>

<loom-container id="lo-companion-container">
    <loom-shadow classname="resolved"></loom-shadow>
</loom-container>

</html>
