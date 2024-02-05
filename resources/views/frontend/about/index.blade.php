@extends('frontend.app')
@section('seo')
   <title>{{ $category->category_name ?? 'About Us - Tasfia Engineering' }}</title>
   <meta name="title" content="{{ $category->category_name ?? 'About - Tasfia Engineering' }}">
   <meta name="description" content="{{ $meta_desc ?? 'Default Description' }}">
   <meta name="keywords" content="{{ $meta_keywords ?? 'Default Keywords' }}">
@endsection

@section('content')
   <!-- breadcrumb area start -->
   <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
      data-background="{{ asset('frontend') }}/assets/img/breadcurmb/breadcurmb.jpg">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="breadcrumb__content z-index d-flex justify-content-between align-items-end">
                  <div class="breadcrumb__section-title-box">
                     <h4 class="breadcrumb__subtitle">Tasfia Engineering</h4>
                     <h3 class="breadcrumb__title">About us</h3>
                  </div>
                  <div class="breadcrumb__list">
                     <span><a href="index.html">Home</a></span>
                     <span class="dvdr"><i>/</i></span>
                     <span>About us</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb area end -->

   <!-- about area start -->
   <div class="tp-about-area p-relative pt-120 pb-120">
      <div class="tp-about-shape-3">
         <img src="{{ asset('frontend/assets') }}/img/about/shape-1-4.png" alt="">
      </div>
      <div class="tp-about-shape-4 d-none d-xl-block">
         <img src="{{ asset('frontend/assets') }}/img/about/shape-1-5.png" alt="">
      </div>
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-6 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
               <div class="tp-about-left-box">
                  <div class="tp-about-section-box mb-15">
                     <span class="tp-section-subtitle"><i class="flaticon-flash"></i> WE ARE BIDDUT ELECTRIC
                        COMPANY</span>
                     <h4 class="tp-section-title">Produce your own clean save the environment</h4>
                  </div>
                  <div class="tp-about-text">
                     <p>Nullam eu nibh vitae est tempor molestie id sed ex. Quisque dignissim maximus ipsum, sed
                        rutrum metus tincidunt et. Sed eget tincidunt ipsum.</p>
                     <span>We create experience and build products that make business grow</span>
                     <div class="tp-about-icon-wrap p-relative d-flex justify-content-between mb-45">
                        <div class="tp-about-icon-shape d-none d-xl-block">
                           <img src="{{ asset('frontend/assets') }}/img/about/shape-1-6.png" alt="">
                        </div>
                        <div class="tp-about-icon-box d-flex align-items-center mb-20">
                           <div class="tp-about-icon">
                              <span><i class="flaticon-electrician"></i></span>
                           </div>
                           <div class="tp-about-icon-text">
                              <h5>Expert <br> electrician</h5>
                           </div>
                        </div>
                        <div class="tp-about-icon-box d-flex align-items-center mb-20">
                           <div class="tp-about-icon">
                              <span><i class="flaticon-plug"></i></span>
                           </div>
                           <div class="tp-about-icon-text">
                              <h5>Safety <br>assurance</h5>
                           </div>
                        </div>
                     </div>
                     <div class="tp-about-button-box d-flex align-items-center">
                        <a class="tp-btn-black" href="about-us.html"><span>KNOW MORE</span></a>
                        <img src="{{ asset('frontend/assets') }}/img/about/shape-1-1.png" alt="">
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 wow tpfadeRight" data-wow-duration=".9s" data-wow-delay=".7s">
               <div class="tp-about-right-box p-relative text-end">
                  <div class="tp-about-main-thumb">
                     <img src="{{ asset('frontend/assets') }}/img/about/thumb-1-1.jpg" alt="">
                  </div>
                  <div class="tp-about-thumb-sm">
                     <img src="{{ asset('frontend/assets') }}/img/about/thumb-1-2.jpg" alt="">
                  </div>
                  <div class="tp-about-shape-1 d-none d-lg-block">
                     <img src="{{ asset('frontend/assets') }}/img/about/shape-1-2.png" alt="">
                  </div>
                  <div class="tp-about-shape-2 d-none d-lg-block">
                     <img src="{{ asset('frontend/assets') }}/img/about/shape-1-3.png" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- about area end -->

   <div class="tp-service-area tp-service-bg p-relative pt-120 pb-90"
      data-background="{{ 'frontend' }}/assets/img/service/bg-1-2.jpg">
      <div class="tp-service-shape-2 d-none d-xxl-block">
         <img src="{{ 'frontend' }}/assets/img/service/shape-1-3.png" alt="">
      </div>
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="tp-service-section-box mb-50 text-center">
                  <span class="tp-section-subtitle">OUR BIDDUT SERVICES</span>
                  <h4 class="tp-section-title">Outstanding residential & <br> commercial services</h4>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
               <div class="tp-service-item p-relative">
                  <div class="tp-service-thumb">
                     <img src="{{ 'frontend' }}/assets/img/service/sv-1-1.jpg" alt="">
                  </div>
                  <div class="tp-service-content-box">
                     <div class="tp-service-content fix">
                        <div class="tp-service-icon p-relative">
                           <span><i class="flaticon-lamp"></i></span>
                           <div class="tp-service-icon-shape">
                              <img src="{{ 'frontend' }}/assets/img/service/shape-1-1.png" alt="">
                           </div>
                        </div>
                        <div class="tp-service-text pb-5">
                           <h4 class="tp-service-title">
                              <a href="service-details.html">Electrical panels</a>
                           </h4>
                           <p>This box could corrode over time, by
                              losse connection, dust or debris.</p>
                        </div>
                        <div class="tp-service-arrow">
                           <a href="service-details.html">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="tp-service-shape-1">
                     <img src="{{ 'frontend' }}/assets/img/service/shape-1-2.png" alt="">
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
               <div class="tp-service-item p-relative">
                  <div class="tp-service-thumb">
                     <img src="{{ 'frontend' }}/assets/img/service/sv-1-2.jpg" alt="">
                  </div>
                  <div class="tp-service-content-box">
                     <div class="tp-service-content fix">
                        <div class="tp-service-icon p-relative">
                           <span><i class="flaticon-air-conditioner"></i></span>
                           <div class="tp-service-icon-shape">
                              <img src="{{ 'frontend' }}/assets/img/service/shape-1-1.png" alt="">
                           </div>
                        </div>
                        <div class="tp-service-text pb-5">
                           <h4 class="tp-service-title">
                              <a href="service-details.html">Air condition</a>
                           </h4>
                           <p>Air conditioning isn't just used to keep
                              homes and offices cool.</p>
                        </div>
                        <div class="tp-service-arrow">
                           <a href="service-details.html">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="tp-service-shape-1">
                     <img src="{{ 'frontend' }}/assets/img/service/shape-1-2.png" alt="">
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
               <div class="tp-service-item p-relative">
                  <div class="tp-service-thumb">
                     <img src="{{ 'frontend' }}/assets/img/service/sv-1-3.jpg" alt="">
                  </div>
                  <div class="tp-service-content-box">
                     <div class="tp-service-content fix">
                        <div class="tp-service-icon p-relative">
                           <span><i class="flaticon-ac"></i></span>
                           <div class="tp-service-icon-shape">
                              <img src="{{ 'frontend' }}/assets/img/service/shape-1-1.png" alt="">
                           </div>
                        </div>
                        <div class="tp-service-text pb-5">
                           <h4 class="tp-service-title">
                              <a href="service-details.html">Heating service</a>
                           </h4>
                           <p>This box could corrode over time, by
                              losse connection, dust or debris.</p>
                        </div>
                        <div class="tp-service-arrow">
                           <a href="service-details.html">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="tp-service-shape-1">
                     <img src="{{ 'frontend' }}/assets/img/service/shape-1-2.png" alt="">
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".8s">
               <div class="tp-service-item p-relative">
                  <div class="tp-service-thumb">
                     <img src="{{ 'frontend' }}/assets/img/service/sv-1-4.jpg" alt="">
                  </div>
                  <div class="tp-service-content-box">
                     <div class="tp-service-content fix">
                        <div class="tp-service-icon p-relative">
                           <span><i class="flaticon-lamp"></i></span>
                           <div class="tp-service-icon-shape">
                              <img src="{{ 'frontend' }}/assets/img/service/shape-1-1.png" alt="">
                           </div>
                        </div>
                        <div class="tp-service-text pb-5">
                           <h4 class="tp-service-title">
                              <a href="service-details.html">Ceiling fan instalation</a>
                           </h4>
                           <p>This box could corrode over time, by
                              losse connection, dust or debris.</p>
                        </div>
                        <div class="tp-service-arrow">
                           <a href="service-details.html">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="tp-service-shape-1">
                     <img src="{{ 'frontend' }}/assets/img/service/shape-1-2.png" alt="">
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1s">
               <div class="tp-service-item p-relative">
                  <div class="tp-service-thumb">
                     <img src="{{ 'frontend' }}/assets/img/service/sv-1-5.jpg" alt="">
                  </div>
                  <div class="tp-service-content-box">
                     <div class="tp-service-content fix">
                        <div class="tp-service-icon p-relative">
                           <span><i class="flaticon-short-circuit"></i></span>
                           <div class="tp-service-icon-shape">
                              <img src="{{ 'frontend' }}/assets/img/service/shape-1-1.png" alt="">
                           </div>
                        </div>
                        <div class="tp-service-text pb-5">
                           <h4 class="tp-service-title">
                              <a href="service-details.html">Short circuit repair</a>
                           </h4>
                           <p>Air conditioning isn't just used to keep
                              homes and offices cool.</p>
                        </div>
                        <div class="tp-service-arrow">
                           <a href="service-details.html">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="tp-service-shape-1">
                     <img src="{{ 'frontend' }}/assets/img/service/shape-1-2.png" alt="">
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1.2s">
               <div class="tp-service-item p-relative">
                  <div class="tp-service-thumb">
                     <img src="{{ 'frontend' }}/assets/img/service/sv-1-6.jpg" alt="">
                  </div>
                  <div class="tp-service-content-box">
                     <div class="tp-service-content fix">
                        <div class="tp-service-icon p-relative">
                           <span><i class="flaticon-lighting"></i></span>
                           <div class="tp-service-icon-shape">
                              <img src="{{ 'frontend' }}/assets/img/service/shape-1-1.png" alt="">
                           </div>
                        </div>
                        <div class="tp-service-text pb-5">
                           <h4 class="tp-service-title">
                              <a href="service-details.html">Outdoor lighting</a>
                           </h4>
                           <p>This box could corrode over time, by
                              losse connection, dust or debris.</p>
                        </div>
                        <div class="tp-service-arrow">
                           <a href="service-details.html">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="tp-service-shape-1">
                     <img src="{{ 'frontend' }}/assets/img/service/shape-1-2.png" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- choose area start -->
   <div class="tp-choose-3-area p-relative black-bg-2 pt-120 pb-70">
      <div class="tp-choose-3-bg" data-background="{{ asset('frontend') }}/assets/img/choose/bg-3-1.jpg">
         <div class="tp-choose-3-shape d-none d-lg-block">
            <img src="{{ asset('frontend') }}/assets/img/choose/shape-3-1.png" alt="">
         </div>
         <div class="tp-choose-3-text d-none d-lg-block">
            <span>For emmergency</span>
            <a href="tel:+99934564234297">+999 345 6423 4297</a>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-6 offset-xl-6">
               <div class="tp-choose-content tp-choose-item-wrap z-index">
                  <div class="tp-choose-section-box mb-30">
                     <span class="tp-section-subtitle text-color"><span>//</span>WHY CHOOSE OUR BIDDUT</span>
                     <h4 class="tp-section-title text-white">Great reason for the people <br>choose our biddut</h4>
                  </div>
                  <div class="tp-choose-text mb-50">
                     <p>For more than a decade, we’ve been building the fueling network of the future. We have delivered
                        more places to charge than anyone else, and people <br>count on us for charging systemtic</p>
                  </div>
                  <div class="tp-choose-wrap">
                     <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                           <div class="tp-choose-item d-flex align-items-center">
                              <span><i class="flaticon-battery"></i></span>
                              <h5 class="tp-choose-item-title">Custom support</h5>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                           <div class="tp-choose-item d-flex align-items-center">
                              <span><i class="flaticon-electrician-1"></i></span>
                              <h5 class="tp-choose-item-title">Insured expert</h5>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                           <div class="tp-choose-item d-flex align-items-center">
                              <span><i class="flaticon-price-tag"></i></span>
                              <h5 class="tp-choose-item-title">Flat rate</h5>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                           <div class="tp-choose-item d-flex align-items-center">
                              <span><i class="flaticon-service"></i></span>
                              <h5 class="tp-choose-item-title">24/7 Available</h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- choose area end -->

   <!-- project area start -->
   <div class="tp-project-area p-relative pt-120 pb-90">
      <div class="tp-project-shape-1 d-none d-xl-block">
         <img src="assets/img/project/shape-1-1.png" alt="">
      </div>
      <div class="container">
         <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1.2s">
               <div class="tp-project-item p-relative">
                  <div class="tp-project-thumb">
                     <img src="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg" alt="">
                  </div>
                  <div class="tp-project-content">
                     <div class="tp-slider-2-play-icon d-flex align-items-center justify-content-around">
                        <a class="popup-image" href="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg"><i
                              class="fa-sharp fa-light fa-eye"></i>
                        </a>
                        <a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i
                              class="fas fa-play"></i>
                        </a>
                     </div>

                     <span>Repair</span>
                     <h4 class="tp-project-title"><a href="project-details.html">Data System Wiring</a></h4>
                  </div>
               </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1.2s">
               <div class="tp-project-item p-relative">
                  <div class="tp-project-thumb">
                     <img src="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg" alt="">
                  </div>
                  <div class="tp-project-content">
                     <div class="tp-slider-2-play-icon d-flex align-items-center justify-content-around">
                        <a class="popup-image" href="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg"><i
                              class="fa-sharp fa-light fa-eye"></i>
                        </a>
                        <a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i
                              class="fas fa-play"></i>
                        </a>
                     </div>

                     <span>Repair</span>
                     <h4 class="tp-project-title"><a href="project-details.html">Data System Wiring</a></h4>
                  </div>
               </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1.2s">
               <div class="tp-project-item p-relative">
                  <div class="tp-project-thumb">
                     <img src="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg" alt="">
                  </div>
                  <div class="tp-project-content">
                     <div class="tp-slider-2-play-icon d-flex align-items-center justify-content-around">
                        <a class="popup-image" href="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg"><i
                              class="fa-sharp fa-light fa-eye"></i>
                        </a>
                        <a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i
                              class="fas fa-play"></i>
                        </a>
                     </div>

                     <span>Repair</span>
                     <h4 class="tp-project-title"><a href="project-details.html">Data System Wiring</a></h4>
                  </div>
               </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1.2s">
               <div class="tp-project-item p-relative">
                  <div class="tp-project-thumb">
                     <img src="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg" alt="">
                  </div>
                  <div class="tp-project-content">
                     <div class="tp-slider-2-play-icon d-flex align-items-center justify-content-around">
                        <a class="popup-image" href="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg"><i
                              class="fa-sharp fa-light fa-eye"></i>
                        </a>
                        <a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i
                              class="fas fa-play"></i>
                        </a>
                     </div>

                     <span>Repair</span>
                     <h4 class="tp-project-title"><a href="project-details.html">Data System Wiring</a></h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- project area end -->

   <!-- team area start -->
   {{-- <div class="tp-team-area pb-90">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="tp-team-section-box mb-60 text-center">
                  <span class="tp-section-subtitle"><i class="flaticon-flash"></i>OUR EXPERT TEAM</span>
                  <h4 class="tp-section-title">Meet our experienced <br>team people</h4>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
               <div class="tp-team-item text-center">
                  <div class="tp-team-thumb-box p-relative">
                     <div class="tp-team-thumb">
                        <img src="{{ asset('frontend') }}/assets/img/team/team-1-2.jpg" alt="">
                     </div>
                     <div class="tp-team-social-wrap">
                        <span><i class="fa-solid fa-share-nodes"></i></span>
                        <div class="tp-team-social-box">
                           <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                           <a href="#"><i class="fa-brands fa-instagram"></i></a>
                           <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="tp-team-content">
                     <h4 class="tp-team-title"><a href="team-details.html">Alberta Infantino</a></h4>
                     <span>Electrician</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
   <!-- team area end -->
@endsection
