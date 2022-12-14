@extends('front.app', ['page_name' => 'About US'])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css'>

{{--  --}}

@section('content')

<section class="about_US_Page">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Why Our Customers Love Us </h2>
                <p>At 800,000 (and counting!) customers served, we’re doubling down on our commitment to power big business ideas for small business owners, entrepreneurs and future founders.</p>

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

                  <div style="margin-top: 25%">
                    <div class="result-container">
                         <div class="rate-bg" style="width:{{$rate_bg}}%;"></div>
                         <div class="rate-stars"></div>
                    </div>

                          {{-- @for($star = 1; $star <= 5; $star++)
                              @if($total_user_rating >= $star)
                                <i class="fa fa-star mr-1 main_star text-warning"></i>
                                @else
                                <i class="fa fa-star star-light mr-1 main_star"></i>
                              @endif
                          @endfor --}}

                      <br>
                     <span class="text-dark"><b> {{str_replace(".", "", $total_review)}} ratings</b></span>
                 </div>
             {{-- Reviews nd rating --}}

            </div>
          </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/img/webicon/Why Our Customers Love Us.png') }}" style="width: 100%;">
            </div>
        </div>
    </div>
</section>

<section class="about_US_Page2 mt-5 text-center">
    <div class="container">
       <h2>Zero Dollars. Zero Hassle. Zero Catch.<br> Business owners trust Incfile to give them a lot more…for a lot less.</h2>
    

<div class="row text-center row2" align="center">
    <div class="col-md-4">
        <div class="cardbox">
            <img src="{{ asset('assets/img/tt.png') }}">
            <p>Gain peace of mind <br>GET
                knowing your business<br>
                is in expert and<br>
                experienced hands.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="cardbox">
            <img src="{{ asset('assets/img/tt.png') }}">
            <p>Join the Incfile<br>
                community of close to a<br>
                million like-minded<br>
                business owners.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="cardbox">
            <img src="{{ asset('assets/img/tt.png') }}">
            <p>Access expert support,<br> services and guidance<br> that will last for the life<br> of your business.</p>
        </div>
    </div>
</div>

<h5>From Bright Idea to Brilliant Success Story — It All Begins with Incfile</h5>

<div class="heading2 text-left">
   <div class="col-md-6">
    <h2>We’ve Been in Your Shoes...</h2>
    <p>Incfile began as a small business, too. Our founders
        bootstrapped their way to success and never took a
        dime from big-money investors.</p>
    <p>So if you’re just starting out, we know how stressed you
        may feel right now. We also know you’d rather be
        building your big idea than dealing with all the
        administrative details.</p>
   </div>
   <div class="col-md-6 imgs" >
    <img src="{{ asset('assets/img/webicon/We_Been_in_Your_Shoes.png') }}">
   </div>
</div>


<div class="heading3 text-left">
    <div class="row reo">
        <div class="col-md-6">
           <img src="{{ asset('assets/img/webicon/..And We Know What It Takes.png') }}" class="a2">
       </div>
    <div class="col-md-6 imgs">
        <h2>...And We Know What It Takes</h2>
        <p>Successful business ownership is a lot more than
            formation — it takes the right attitude, motivation and
            support. Plus, a little moxie. And a lot of paperwork.</p>
        <p>That’s where Incfile comes in. We manage the
            paperwork and handle other services so you can focus
            on the parts of your business that inspire you.</p>
    </div>
 </div>

 <div class="row">
    <div class="col-md-6">
        <h2>What Does Incfile Do Differently?</h2>
        <h3><span class="text-danger">$0</span> Gets You More</h3>
    <p>Sit back and relax knowing your business is in good
        hands, or jump straight into planning to make your
        business a success. Whatever you do, we'll spring into
        action and take care of the paperwork, hassle and
        hoops for you.</p>
   </div>
    <div class="col-md-6 imgs text-right" align="text-right">
        <img src="{{ asset('assets/img/a3.png') }}" class="a3">
        
    </div>
</div>

<div class="col-md-12 cardbox mt-5 mb-5">
    <div class="col-md-6">
        <ul> 
            <li style="display: inline-flex;"><img src="{{ asset('assets/img/tt.png') }}" class="">
            <h4>One time formation fee</h4></li>
            <li style="display: inline-flex;"><img src="{{ asset('assets/img/tt.png') }}" class="">
            <h4>$0 to incorporate through Incfile</h4></li>
            <li style="display: inline-flex;"><img src="{{ asset('assets/img/tt.png') }}" class="">
                    <h4>Free next day business filing</h4></li>
        </ul>
    </div>
    <div class="col-md-6">
        <ul> 
            <li style="display: inline-flex;"><img src="{{ asset('assets/img/tt.png') }}" class="">
            <h4>Filing date reminders for life</h4></li>
            <li style="display: inline-flex;"><img src="{{ asset('assets/img/tt.png') }}" class="">
            <h4>Free tax consultation</h4></li>
            <li style="display: inline-flex;"><img src="{{ asset('assets/img/tt.png') }}" class="">
                    <h4>One year of free Registered Agent service</h4></li>
        </ul>
    </div>
</div>
</div>

<div class="heading4">
<div class="row">
<div class="col-md-4">
    <img src="{{ asset('assets/img/webicon/Transparent Pricing and...png') }}" class="">
</div>
<div class="col-md-6" align="left">
    <h2>Transparent Pricing and<br>
        No Surprises</h2>
        <h4>When we say “zero,” we mean it. No annual fees, no<br>
            hidden or forced membership charges — just quick,<br>
            easy business formation to get you on your way to<br>
            success. Plus some included extras:</h4>
            <div class="trans_para">
                <p>Registered Agent service for 12 months ($119 value)</p>
                <p>Same business day processing</p>
                <p>Lifetime business alerts and notifications</p>
                <p>Unlimited business name searches</p>
            </div>
</div>
</div>
</div>


<div class="heading5">
<div class="row">
    <div class="col-md-6" align="left">
        <h2>Everything You Need, All<br>
            in One Place</h2>
            <p>Incfile offers several packages to choose from that
                start at $0, with a variety of services and products that
                offer tremendous value. Or you can build your own
                package from our à la carte services. No one else in the
                industry offers this level of flexible customization</p>
    </div>
    <div class="col-md-4">
      <img src="{{ asset('assets/img/webicon/Everything You Need, All....png') }}" class="">
    </div>
</div>
</div>

<div class="heading6">
    <div class="row">
        <div class="col-md-12" align="center">
            <h2>Trust Issues? We Don’t Blame You.</h2>
            <p>And we don’t expect you to just take our word for it. We’re proud of our<br>
                “Excellent” rating on TrustPilot, our 4.8-star rating from ShopperApproved and<br>
                our combined 32,000+ five-star reviews.</p>
        </div>

        {{-- review slider start --}}
        <div class="col-md-12">
            @if(!empty($reviews))
            <main>
                <section>
                  <div class="testimonial">
                    <div class="container">
                     <div class="testimonial__inner">
                       <div class="testimonial-slider">

                        @foreach($reviews as $review)
                         <div class="testimonial-slide">
                           <div class="testimonial_box" style="height: 130%;">
                             <div class="testimonial_box-inner">
                               <div class="testimonial_box-top">
                                 <div class="testimonial_box-icon">

                                   @if($review->rating == 1)
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   @elseif($review->rating == 2)
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   @elseif($review->rating == 3)
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   @elseif($review->rating == 4)
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   @elseif($review->rating == 5)
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   <i class="fa fa-star text-warning mr-1 main_star"></i>
                                   @elseif($review->rating == 0)
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   <i class="fa fa-star star-light mr-1 main_star"></i>
                                   @endif


                                 </div>
                                 <div class="testimonial_box-img">
                                    @if(!empty($review->image))
                                  <img src="{{ asset('testimonials_img/' . $review->image) }}" alt="profile">
                                  @else
                                  <img src="{{ asset('assets/img/dumy.jpg') }}" alt="profile">
                                  @endif
                                </div>
                                <div class="testimonial_box-name">
                                  <h4>{{$review->name}}</h4>
                               </div>
                               <div class="testimonial_box-text text-left" align="left">
                                 <p>{{ $review->comment }}</p>
                               </div>
                               </div>
                             </div>
                           </div>
                         </div>
                         @endforeach
                       </div>
                     </div>
                    </div>
                  </div>
                </section>
              </main>
              @endif
        </div>
        {{-- review slider end --}}

        <div class="col-md-12 lastheading mt-5" align="center">
            <h2>Don’t Settle for Less. Get More with Incfile.</h2>
            <p>Join the Incfile community and ignite your business dreams today.</p>
            <a href="{{ url('/launch-my-llc') }}"><img src="{{ asset('assets/img/getst.png') }}"></a>
        </div>
    </div>
  </div>
</div>
</section>

@endsection


