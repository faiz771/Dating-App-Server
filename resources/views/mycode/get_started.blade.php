<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/header_logo3.png') }}" sizes="32x32">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        button.Button-sc-1q0i4nm-0:hover {
            color: white !important;
            background: #ee8d22 !important;
            border: 1px solid #ee8d22 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style='border-bottom:1px solid lightgray; margin-bottom:20px;'>
            <div class="col-md-8">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/header_logo3.png') }}"
                        alt="" style="width:15%;"></a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ url('/launch-my-llc') }}" method="GET">
            @csrf
            <div class="row justify-content-center">
                <h3> Select your state and entity </h3>
            </div>

            <div class="row mb-3 mt-3 align-items-center justify-content-center">
                <label for="">Forming a</label>
                <div class="col-md-4">
                    <select name="forming" id="" class="form-control">
                        <option value="Limited Liability Company (LLC)">Limited Liability Company (LLC)</option>
                    </select>

                </div>

                <div class="col-md-1" style="margin: 0px !important; padding: 0px; float: left;">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="#8C14FC"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.768 11.536c-.793 0-1.54-.15-2.24-.448A5.934 5.934 0 011.68 9.856 5.934 5.934 0 01.448 8.008 5.648 5.648 0 010 5.768c0-.803.15-1.55.448-2.24.299-.7.71-1.311 1.232-1.834A5.816 5.816 0 013.528.448 5.648 5.648 0 015.768 0c.803 0 1.55.15 2.24.448.7.299 1.311.714 1.834 1.246a5.655 5.655 0 011.246 1.834c.299.69.448 1.437.448 2.24 0 .793-.15 1.54-.448 2.24a5.816 5.816 0 01-1.246 1.848 5.766 5.766 0 01-1.834 1.232 5.582 5.582 0 01-2.24.448zm0-.784c.69 0 1.335-.126 1.932-.378a5.071 5.071 0 001.596-1.078 4.922 4.922 0 001.064-1.582 4.867 4.867 0 00.392-1.946c0-.69-.13-1.335-.392-1.932a4.882 4.882 0 00-2.66-2.66A4.767 4.767 0 005.768.784c-.69 0-1.34.13-1.946.392A4.922 4.922 0 002.24 2.24c-.457.457-.817.99-1.078 1.596a4.919 4.919 0 00-.378 1.932c0 .69.126 1.34.378 1.946.261.597.62 1.125 1.078 1.582.457.457.985.817 1.582 1.078a5.022 5.022 0 001.946.378zm0-7.35c-.373 0-.56-.182-.56-.546 0-.364.187-.546.56-.546.15 0 .275.047.378.14.112.084.168.22.168.406 0 .187-.056.327-.168.42a.577.577 0 01-.378.126zm-.462 5.152V4.046h.924v4.508h-.924z"
                            fill="#8C14FC">
                        </path>
                    </svg>
                </div>
                
                <label for="">in</label>
                <div class="col-md-4">
                    <select name="f_state" id="" class="form-control change-state">
                        <option value="Wyoming"> Wyoming </option>
                        <option value="Texas"> Texas </option>
                        <option value="Florida"> Florida </option>
                    </select>
                </div>
            </div>

            <center>

                <input type="hidden" name="pkg_id" class="pkg_id_cc"
                    value="{{ isset($package->id) ? $package->id : '' }}">
                <div class="row justify-content-center"
                    style="width:50%; height:auto; margin: 0px; padding:12px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                    <div
                        style="width: 100%; height: 70px; background: linear-gradient(180deg, rgb(248 100 71) 0%, rgba(0,0,0,0.073564459963673) 84%); margin-bottom: 23px;">
                    </div>

                    <div> </div>
                    <div style="text-align: center;">
                        <h2>${{ isset($package->price) ? $package->price : '' }}</h2>
                        <p style="margin: 0px !important; font-size: 15px;"> Billed Once* </p>
                        <p style="margin: 0px !important; font-size: 13px; color: rgb(189, 189, 189)"> Includes all
                            state
                            filing fees
                            <svg width="13" height="13" viewBox="0 0 13 13" fill="#8C14FC"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.768 11.536c-.793 0-1.54-.15-2.24-.448A5.934 5.934 0 011.68 9.856 5.934 5.934 0 01.448 8.008 5.648 5.648 0 010 5.768c0-.803.15-1.55.448-2.24.299-.7.71-1.311 1.232-1.834A5.816 5.816 0 013.528.448 5.648 5.648 0 015.768 0c.803 0 1.55.15 2.24.448.7.299 1.311.714 1.834 1.246a5.655 5.655 0 011.246 1.834c.299.69.448 1.437.448 2.24 0 .793-.15 1.54-.448 2.24a5.816 5.816 0 01-1.246 1.848 5.766 5.766 0 01-1.834 1.232 5.582 5.582 0 01-2.24.448zm0-.784c.69 0 1.335-.126 1.932-.378a5.071 5.071 0 001.596-1.078 4.922 4.922 0 001.064-1.582 4.867 4.867 0 00.392-1.946c0-.69-.13-1.335-.392-1.932a4.882 4.882 0 00-2.66-2.66A4.767 4.767 0 005.768.784c-.69 0-1.34.13-1.946.392A4.922 4.922 0 002.24 2.24c-.457.457-.817.99-1.078 1.596a4.919 4.919 0 00-.378 1.932c0 .69.126 1.34.378 1.946.261.597.62 1.125 1.078 1.582.457.457.985.817 1.582 1.078a5.022 5.022 0 001.946.378zm0-7.35c-.373 0-.56-.182-.56-.546 0-.364.187-.546.56-.546.15 0 .275.047.378.14.112.084.168.22.168.406 0 .187-.056.327-.168.42a.577.577 0 01-.378.126zm-.462 5.152V4.046h.924v4.508h-.924z"
                                    fill="#8C14FC">
                                </path>
                            </svg>
                        </p>
                        <p style="margin: 0px !important; font-size: 18px" class="change-after-state"> Form Instantly
                        </p>
                    </div>

                    <div
                        style=" width: 85%; display: flex; justify-content: center; margin: auto; margin-bottom: 17px; margin-top: 18px;">
                        <button type="submit"
                            style="background-color: rgb(248 100 71); border-radius: 5px; border: 1px solid rgb(248 100 71); padding: 0.75em 2.5em;width: 100%;cursor: pointer;font-weight: 500;font-size: 18px;line-height: 25px;color: rgb(255, 255, 255);">
                            <div>
                                <span> Launch My LLC </span>
                            </div>
                        </button>
                    </div>

                    <div style="border-top: 1px solid gray; margin-bottom: 20px;"></div>
                        @php
                            $services = json_decode(isset($package->service_ids) ? $package->service_ids : '');
                        @endphp
                    <div class="container">
                        @if (!empty($services))
                            @foreach ($services as $val)
                                @php
                                    $service = SF::service($val);
                                @endphp
                                <div class="row justify-content-center col-md-12">
                                    <div
                                        style="display: flex; flex-direction: row; -webkit-box-align: center; align-items: center; margin: 5px 50px;">
                                        <div class="img-container" style="width:30px;">
                                            <img src="https://app.jumpstartfilings.co/services/employer-id.png"
                                                style="width: 65%;">
                                        </div>

                                        <p class="name"
                                            style="margin: 0px; font-style: normal;font-weight: normal;font-size: 16px;line-height: 22px;-webkit-box-align: center;align-items: center;color: rgb(52, 61, 72);overflow: hidden;display: inline-block;text-overflow: ellipsis;white-space: nowrap;">
                                            {{ $service->name }}</p>
                                        <div class="icon"
                                            style="margin-left: 5px; display: flex; -webkit-box-align: center; align-items: center;">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="#8C14FC"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.768 11.536c-.793 0-1.54-.15-2.24-.448A5.934 5.934 0 011.68 9.856 5.934 5.934 0 01.448 8.008 5.648 5.648 0 010 5.768c0-.803.15-1.55.448-2.24.299-.7.71-1.311 1.232-1.834A5.816 5.816 0 013.528.448 5.648 5.648 0 015.768 0c.803 0 1.55.15 2.24.448.7.299 1.311.714 1.834 1.246a5.655 5.655 0 011.246 1.834c.299.69.448 1.437.448 2.24 0 .793-.15 1.54-.448 2.24a5.816 5.816 0 01-1.246 1.848 5.766 5.766 0 01-1.834 1.232 5.582 5.582 0 01-2.24.448zm0-.784c.69 0 1.335-.126 1.932-.378a5.071 5.071 0 001.596-1.078 4.922 4.922 0 001.064-1.582 4.867 4.867 0 00.392-1.946c0-.69-.13-1.335-.392-1.932a4.882 4.882 0 00-2.66-2.66A4.767 4.767 0 005.768.784c-.69 0-1.34.13-1.946.392A4.922 4.922 0 002.24 2.24c-.457.457-.817.99-1.078 1.596a4.919 4.919 0 00-.378 1.932c0 .69.126 1.34.378 1.946.261.597.62 1.125 1.078 1.582.457.457.985.817 1.582 1.078a5.022 5.022 0 001.946.378zm0-7.35c-.373 0-.56-.182-.56-.546 0-.364.187-.546.56-.546.15 0 .275.047.378.14.112.084.168.22.168.406 0 .187-.056.327-.168.42a.577.577 0 01-.378.126zm-.462 5.152V4.046h.924v4.508h-.924z"
                                                    fill="#8C14FC">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </center>
        </form>

        <div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <form action="{{ url('/start-over') }}" method="post">
                            @csrf
                            <div class="row"
                                style="display: flex; justify-content: center; align-items: center;margin-bottom: 40px; margin-top: 41px;">
                                <div class="col-lg-8"
                                    style="padding: 0px; margin: 0px !important; display: flex; justify-content: center;">
                                    <img src="{{ asset('assets/img/header_logo3.png') }}"  style="width:50%;" alt="">
                                </div>
                            </div>

                            <div class="row" style="display: flex; justify-content: center;">
                                <div class="col-lg-8"
                                    style="display: flex;justify-content: center;margin: 0px;padding: 0px;">
                                    <h3> Welcome back! </h3>
                                </div>
                            </div>

                            <div class="row" style="display: flex; justify-content: center;">
                                <div class="col-lg-8"
                                    style="display: flex; justify-content: center; text-align:center;">
                                    <p>Continue where you left off or clear everything and start over?</p>
                                </div>
                            </div>

                            <div class="styles__ModalButtons-sc-kfcdse-22 jfCVhe"
                                style="display: flex;flex-direction: column;-webkit-box-align: center;align-items: center; margin-bottom: 40px;">
                                <button class="Button-sc-1q0i4nm-0 dXAhWu continue-proccess" type="button"
                                    style='padding: 1em 2em; width: 250px; margin-bottom: 0.25em;background-color: #ee8d22;color: white;border: 1px solid #ee8d22; border-radius: 5px;font-family: Avenir, "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: 500;font-size: 18px;cursor: pointer;'>Continue</button>
                                <button class="Button-sc-1q0i4nm-0 bhImxi" type="submit"
                                    style='padding: 1em 2em; width: 250px; background-color: transparent; color: #ee8d22; border: 1px solid #ee8d22; border-radius: 5px; font-family: Avenir, "Helvetica Neue", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 18px; cursor: pointer;'>Start
                                    Over</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer" style="display:none ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    @if(Session::has('visited'))
    
        <script>
            $(document).ready(function() {
                $('#resumeModal').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
            });
        </script>

    @else

        @php
            $session_id = uniqid('SF_');
            Session::put('visited', $session_id);
            SF::setUnique(session()->get('visited'));
        @endphp

    @endif

    <script>
        $(document).on('change', '.change-state', function() {
            let text = $(this).children('option:selected').text().trim();
            if (text === "Wyoming") {
                $('.change-after-state').text('Form Instantly');
            } else {
                $('.change-after-state').text('Form in 1-3 Business Days');
            }
        });

        $(document).on('click', '.continue-proccess', function() {
            let modal = $('#resumeModal');
            document.location.href = '{{ url('/launch-my-llc') }}' + '/' + $('.pkg_id_cc').val();

        });
    </script>
</body>

</html>
