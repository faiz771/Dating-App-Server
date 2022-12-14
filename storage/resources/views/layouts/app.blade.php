<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ auth()->user()->id == 1 ? 'Admin Dashboard' : 'User Dashboard' }} </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/1.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>

    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    {{-- END GLOBAL MANDATORY STYLES --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    {{-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES --}}
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    {{-- END PAGE LEVEL PLUGINS/CUSTOM STYLES --}}

    {{-- BEGIN PAGE LEVEL CUSTOM STYLES --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    {{-- END PAGE LEVEL CUSTOM STYLES --}}

    {{-- BEGIN THEME GLOBAL STYLES --}}
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    {{-- END THEME GLOBAL STYLES --}}


</head>

<body class="sidebar-noneoverflow">
    {{-- BEGIN LOADER --}}

    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    {{-- END LOADER --}}

    @include('includes.navbar')

    {{-- BEGIN MAIN CONTAINER --}}
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>


        @if (auth()->user()->id == 1)
            @include('includes.sidebar')
        @elseif (auth()->user()->userType == 'customer/user')
            @include('includes.user.sidebar')
        @elseif (auth()->user()->id != 1 && auth()->user()->userType != 'customer/user')
            @include('includes.roles.sidebar')
        @endif

        {{-- BEGIN CONTENT AREA --}}
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                @yield('content')
                @include('includes.modal')
            </div>

            @include('includes.footer')
        </div>
        {{-- END CONTENT AREA --}}


    </div>
    {{-- END MAIN CONTAINER --}}

    

    {{-- BEGIN GLOBAL MANDATORY SCRIPTS --}}
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>

    {{-- END GLOBAL MANDATORY SCRIPTS --}}

    {{-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS --}}
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>
    {{-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS --}}

    {{-- BEGIN THEME GLOBAL STYLE --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('plugins/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('plugins/editors/quill/custom-quill.js') }}"></script>


    {{--  --}}

    <script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>

<script>
    $('#html5-extension').DataTable( {
           "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
       "<'table-responsive'tr>" +
       "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
           buttons: {
               buttons: [
                   { extend: 'copy', className: 'btn btn-sm' },
                   { extend: 'csv', className: 'btn btn-sm' },
                   { extend: 'excel', className: 'btn btn-sm' },
                   { extend: 'print', className: 'btn btn-sm' }
               ]
           },
           "oLanguage": {
               "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
               "sInfo": "Showing page PAGE of _PAGES_",
               "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
               "sSearchPlaceholder": "Search...",
              "sLengthMenu": "Results :  _MENU_",
           },
           "stripeClasses": [],
           "lengthMenu": [7, 10, 20, 50],
           "pageLength": 7
       } );
</script>

    {{-- END THEME GLOBAL STYLE --}}

    {{-- PayPal Api --}}
    {!! PayPalApi() !!}
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
            swal({
                title: '{{ Session::get('error') }}',
                text: "Click Ok to continue",
                type: 'error',
                padding: '2em'
            });
        </script>
    @endif
    
    @if (Session::has('delete'))
        <script>
            swal({
                title: '{{ Session::get('delete') }}',
                text: "Click Ok to continue",
                type: 'error',
                padding: '2em'
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            swal({
                title: '{{ Session::get('success') }}',
                text: "Click Ok to continue",
                type: 'success',
                padding: '2em'
            });
        </script>
    @endif


    <script type="text/javascript">
        feather.replace();
    </script>
    <script>

        // Add testimonial 
$(document).ready(function(){

var rating_data = 0;

$('#add_review').click(function(){

    $('#review_modal').modal('show');

});

$(document).on('mouseenter', '.submit_star', function(){

    var rating = $(this).data('rating');

    reset_background();

    for(var count = 1; count <= rating; count++)
    {
        $('#submit_star_'+count).addClass('text-danger');
    }

});

function reset_background()
{
    for(var count = 1; count <= 5; count++)
    {
        $('#submit_star_'+count).addClass('star-light');
        $('#submit_star_'+count).removeClass('text-danger');           
    }
}

$(document).on('mouseleave', '.submit_star', function(){

    reset_background();
    for(var count = 1; count <= rating_data; count++)
    {
        $('#submit_star_'+count).removeClass('star-light');
        $('#submit_star_'+count).addClass('text-danger');
    }

});

$(document).on('click', '.submit_star', function(){

    rating_data = $(this).data('rating');
    $('#rat_cal').val(rating_data);

});

// $('#save_review').click(function(){

//     var user_review = $('#user_review').val();
//     var user_img = $('.user_img').val();


//     var imgname  =  $('input[type=file]').val();
//     var size  =  $('.user_img')[0].files[0].size;

//     alert(size);

//     if(user_review == '')
//     {
//       swal("Please Filled All Required Fields!");
//         return false;
//     }
//     else
//     {
//         $.ajax({
//             url:'{{ url('/save-testimonial') }}',
//             method:"POST",
//             data:{rating_data:rating_data, user_img:user_img, user_review:user_review, _token : '{{ csrf_token() }}'},
//             success:function(data)
//             {
//                 $('#review_modal').modal('hide');
//             }
//         })
//     }

// });

});

// Assign Coupon Detail
$('.assign_coupon_detail').on('click',function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url : '{{ url('/assign_coupon_detail') }}',
        type : 'POST',
        data :{id:id, _token : '{{ csrf_token() }}'},

        success:function(response){
                $('.coupon_per').html(response.per);
                $('.coupon_name').html(response.name);
                $('#standardModal').modal();
        }
   });

});

// Assign coupon Detail

        $(document).ready(function() {
            var ss = $(".tagging").select2({
                tags: true,
            });

            $('#alter_pagination').DataTable({
                "pagingType": "full_numbers",
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": {
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });
        });

        $(document).on("click", ".delete-visitor", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let modal = $('#deleteVisitor');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on('click', ".view-visitor-msg-btn", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            $.ajax({
                type: "GET",
                url: "{{ url('/get-visitor-msg') }}",
                data: {
                    id: id
                },
                success: function(data) {
                    $(document).find('.print-visitor-msg').html(data);
                    $('#rotateleftModal').modal('show');
                }
            });
        });

        $(document).on("click", ".delete-visitor-site", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let modal = $('#deleteVisitorSite');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on("click", ".call-delete-modal", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        //===== Employee Expense Delete =====//
        $(document).on('change','.check_exp_type',function (){

                var check_exp_type = $(this).val();

                if(check_exp_type == 'com_exp'){
                    $('.exp_com').show();
                    $('.exp_com2').show();
                    $('.exp_emp').hide();
                   $('.exp_salary').hide();
                }
            if(check_exp_type == 'emp_exp'){
                $('.exp_com').hide();
                $('.exp_com2').hide();
                $('.exp_emp').show();
            }

        })

        $(document).on('change','.employee_id_check',function (){

            var employee_id_check = $(this).val();
                
      $.ajax({
        url : '{{ url('/employe_expense_check') }}',
        type : 'POST',
        data :{employee_id_check:employee_id_check, _token : '{{ csrf_token() }}'},

        success:function(response){

                $('.exp_com').show();
                $('.exp_com2').show();
                $('.exp_emp').show();
                $('.exp_salary').show();
                $('#salary').val(response.emp_salary);
        }
   });
})

$(document).on('click','.pkgedit_addon',function () {
    var id = $(this).attr('data-id');

    $.ajax({
      url : '{{ url('/pkgcategoryadd_on_edit') }}',
        type : 'POST',
        data :{id:id, _token : '{{ csrf_token() }}'},
        success:function(response){

            $('#category_name').val(response.cat_name);
            $('#cat_price').val(response.cat_price);
            $('#category_id').val(response.cat_id);
        }
    });
})

$(document).on('click','#pkgaddon_update',function (){

    var id = $('#category_id').val();
    var name = $('#category_name').val();
    var price = $('#cat_price').val();

    $.ajax({
        url : '{{ url('/pkgcategoryadd_on_update') }}',
        type : 'POST',
        data : {id:id,name:name,price:price, _token : '{{ csrf_token() }}'},
        success:function(response){
          location.reload();
        }
    });
})
// 
$(document).on('click','.pkgedit_cat',function () {
    var id = $(this).attr('data-id');

    $.ajax({
      url : '{{ url('/pkgcategoryedit') }}',
        type : 'POST',
        data :{id:id, _token : '{{ csrf_token() }}'},
        success:function(response){

            $('#category_name').val(response.cat_name);
            $('#cat_price').val(response.cat_name);
            $('#category_id').val(response.cat_id);
        }
    });
})

$(document).on('click','#pkgcat_update',function (){

    var id = $('#category_id').val();
    var name = $('#category_name').val();

    $.ajax({
        url : '{{ url('/pkgcategoryupdate') }}',
        type : 'POST',
        data : {id:id,name:name, _token : '{{ csrf_token() }}'},
        success:function(response){
          location.reload();
        }
    });
})

// Next with validation
$(document).on('change', '#user_package_select', function(){
    var msg = $( "#user_package_select option:selected" ).val();
    var text = $( "#user_package_select option:selected" ).attr('data-text');
    $( ".service_type" ).val(text)
});    

// coupon description 
$('.assign_cop').on('click',function(){
    var id = $(this).attr('data-id');
    $('.order_id').val(id);
    $('#assigncoupon_modal').modal('show');
})

$('.coupon_description_show').on('click',function(){
    var desc = $(this).attr('data-text');
    $('.coupon_des').html(desc);
    $('#coupon_desc').modal('show');

})

// Refund Order code 
$('.refund').on('click',function(){
    var id = $(this).attr('data-id');
    var amount = $(this).attr('data-text');
    $('.amount').val(amount);
    $('.order_id').val(id);
    $('#refund_modal').modal('show');

})

$('.refunded').on('click',function(){
    var id = $(this).attr('data-id');
$.ajax({
      url : '{{ url('/refunded-orders') }}',
        type : 'POST',
        data :{id:id, _token : '{{ csrf_token() }}'},
        success:function(response){
            $('.refund_amount').html('$'+response.amount);
            $('.refund_desc').html(response.desc);
            $('#refunded_modal').modal('show');
        }
    });
})

// Refund irder code end 

// edit EIN

$(document).on('click','.edit_ein',function () {
    var id = $(this).attr('data-id');
    $.ajax({
      url : '{{ url('/EINedit') }}',
        type : 'POST',
        data :{id:id, _token : '{{ csrf_token() }}'},
        success:function(response){
            $('#category_name').val(response.cat_name);
            $('#category_id').val(response.cat_id);
        }
    });
})

$(document).on('click','#ein_update',function (){

    var id = $('#category_id').val();
    var name = $('#category_name').val();

    $.ajax({
        url : '{{ url('/EINupdate') }}',
        type : 'POST',
        data : {id:id,name:name, _token : '{{ csrf_token() }}'},
        success:function(response){
          location.reload();
        }
    });
})

// Edit Ein end 

$(document).on('click','.edit_cat',function () {
    var id = $(this).attr('data-id');

    $.ajax({
      url : '{{ url('/categoryedit') }}',
        type : 'POST',
        data :{id:id, _token : '{{ csrf_token() }}'},
        success:function(response){

            $('#category_name').val(response.cat_name);
            $('#category_id').val(response.cat_id);
        }
    });
})

$(document).on('click','#cat_update',function (){

    var id = $('#category_id').val();
    var name = $('#category_name').val();

    $.ajax({
        url : '{{ url('/categoryupdate') }}',
        type : 'POST',
        data : {id:id,name:name, _token : '{{ csrf_token() }}'},
        success:function(response){
          location.reload();
        }
    });
})

$(document).on("click", ".package_addon_del", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

         $(document).on("click", ".package_category_del", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on("click", ".coupon_delete", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on("click", ".state_delete", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });


        $(document).on("click", ".tm_delete", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on("click", ".ein_delete", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on("click", ".upload_document_delete", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on("click", ".faq_delete", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on("click", ".employee_ex_delete", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id').trim();
            let action = $(this).attr('data-action').trim();
            let modal = $('#deleteModal');
            let html = `<input type="hidden" name="id" value="` + id + `">`;
            modal.find('form').attr('action', action);
            modal.find('.visitor-id').html(html);
            modal.modal('show');
        });

        $(document).on('click', '.call-view-modal', function() {
            let id = $(this).attr('data-id').trim();
            $.ajax({
                type: "GET",
                url: "{{ url('/view-order') }}",
                data: "data",
                success: function(response) {

                }
            });
        });

// 
$(document).on('change', '.ser_status', function() {
            // let id = $(this).attr('data-id').trim();
            let status = $(this).val();
            let id = $(this).attr('data-id').trim();

            $.ajax({
                url: "{{ url('/update_cus_services') }}",
                method: "POST",
                data :{id:id,status:status,_token : '{{ csrf_token() }}'},
                success: function(response) {
                    swal({
                        title: 'Status Update successfully',
                        text: "Click Ok to continue",
                        type: 'success',
                        padding: '2em'
                    });
                }
            });
        });
// 

$(document).on('click' , '.add_ons' , function(){
    let html=`   <div class="form-group col-md-8">           
            <label class="col-form-label d-block"></label>
            <input name="add_services[]" type="text" class="form-control id="add_services" @error('add_services') is-invalid @enderror" placeholder="Add On Service">
            @error('add_services')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div> <div class="form-group col-md-4">
                <label class="col-form-label d-block"></label>
            <input name="add_price[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "25" type="number" class="form-control id="add_services" @error('add_services') is-invalid @enderror" placeholder="Add On Price">
            @error('add_services')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror 
            `;
        $('.add_more').append(html);     
});

$(document).on('click' , '.complementary' , function(){
    let html=`   <div class="form-group col-lg-12">           
            <label class="col-form-label d-block"></label>
            <input name="comservice_more[]" type="text" class="form-control id="comservice_more" @error('comservice_more') is-invalid @enderror" placeholder="Complementary Services">
            @error('comservice_more')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div> `;
        $('.comservice_more').append(html);     
});

        $(document).on('click', '.view-bank-proof', function() {
            let modal = $('#viewModal');
            let proof = $(this).attr('data').trim();
        // alert(proof);
        // return;
            modal.find('.modal-title').text('View Bank Proof');
            modal.find('.modal-body').html(`<img src="` + proof + `" alt="Bank Proof" style="width:100%;">`);
            modal.modal('show');
        });

        $(document).on('click', '.view-permissions', function(e) {
            let role_id = $(this).attr('data-id').trim();
            let view = $('#viewModal');
            $.ajax({
                type: "GET",
                url: "{{ url('/view-permissions') }}",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    view.find('.modal-body').html(data);
                    view.modal('show');
                }
            });
        });


        $(document).on('click', '.send-mail-modal', function(e) {
            let email = $(this).attr('data');
            let modal = $('#sendMail');
            modal.find('.visitor-email').val(email);
            modal.modal('show');
        });

        $(document).on('click', '.send-whatsapp-msg', function(e) {
            let wa_no = $(this).attr('data');
            let modal = $('#waModal');
            modal.find('.visitor-wa-no').val(wa_no);
            modal.modal('show');
        });
    </script>
    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyAQW3XMAtcNVNtGg1RJORpUwB-pWnMtnGQ",
            authDomain: "sharp-formation.firebaseapp.com",
            projectId: "sharp-formation",
            storageBucket: "sharp-formation.appspot.com",
            messagingSenderId: "475627074688",
            appId: "1:475627074688:web:0abff59016045f6f1f6265",
            measurementId: "G-GGWENHYWB7"
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(token) {
                    console.log(token);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ url('/save-device-user-token') }}',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            alert('Token saved successfully.');
                        },
                        error: function(err) {
                            console.log('User Chat Token Error' + err);
                        },
                    });

                }).catch(function(err) {
                    console.log('User Chat Token Error' + err);
                });
        }

        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
        });

        // Fancybox 

        $('[data-fancybox]').fancybox({
  // Options will go here
  buttons : [
    'close'
  ],
  wheel : false,
  transitionEffect: "slide",
   // thumbs          : false,
  // hash            : false,
  loop            : true,
  // keyboard        : true,
  toolbar         : false,
  // animationEffect : false,
  // arrows          : true,
  clickContent    : false
});

// fancybox Css start end

$(document).on('click','.delete_text',function () {
        var url = $(this).attr('data-route');
        $("#delete_form_text").attr('action',url);
})

    </script>

    @include('includes.scripts')

</body>

</html>
