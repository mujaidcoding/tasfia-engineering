@extends('frontend.app')

@section('seo')
   <title>{{ $service->meta_title ?? 'Tasfia Engineering' }}</title>
   <meta name="title" content="{{ $service->meta_title ?? 'Default Title' }}">
   <meta name="description" content="{{ $service->meta_desc ?? 'Default Description' }}">
   <meta name="keywords"
      content="{{ isset($service->meta_keywords) ? implode(', ', explode(',', $blog->meta_keywords)) : 'Default Keywords' }}">
@endsection

@section('content')
   <!-- hero area start -->
   @include('frontend.home.slider')
   <!-- hero area end -->

   <!-- order-form area start -->
   <div class="tp-order-form-area p-relative grey-bg" data-background="{{ asset('frontend/assets') }}/img/feature/bg-1.png">
      <!-- order form area start -->
      <div class="tp-order-form-area d-none d-md-block">
         <div class="custom-container-2 container">
            <div class="tp-order-form-space wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
               <div class="tp-order-form-wrap d-flex align-items-center justify-content-between">
                  <div class="tp-order-form-group">
                     <input type="text" placeholder="Your name">
                  </div>
                  <div class="tp-order-form-group">
                     <input type="text" placeholder="Your email">
                  </div>
                  <div class="tp-order-form-group">
                     <input type="text" placeholder="Phone">
                  </div>
                  <div class="tp-order-form-group">
                     <input type="text" placeholder="Your Subject">
                  </div>
                  <div class="tp-order-form-group">
                     <button class="tp-btn-black"><span>GET SERVICES</span></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- order form area end -->

      <div class="tp-feature-2-bg pt-90 pb-90">
         <div class="tp-feature-2-shape-1 d-none d-xxl-block">
            <img src="{{ asset('frontend/assets') }}/img/feature/shape-1-1.png" alt="">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                  <div class="tp-feature-2-item">
                     <div class="tp-feature-2-icon">
                        <span><i class="flaticon-lowest-price"></i></span>
                     </div>
                     <div class="tp-feature-2-text">
                        <h5 class="tp-feature-2-title">Affradable price</h5>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                  <div class="tp-feature-2-item">
                     <div class="tp-feature-2-icon">
                        <span><i class="flaticon-guaranteed"></i></span>
                     </div>
                     <div class="tp-feature-2-text">
                        <h5 class="tp-feature-2-title">100% Gurantee</h5>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                  <div class="tp-feature-2-item active">
                     <div class="tp-feature-2-icon">
                        <span><i class="flaticon-repair"></i></span>
                     </div>
                     <div class="tp-feature-2-text">
                        <h5 class="tp-feature-2-title">24/7 Availabilty</h5>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                  <div class="tp-feature-2-item">
                     <div class="tp-feature-2-icon">
                        <span><i class="flaticon-award"></i></span>
                     </div>
                     <div class="tp-feature-2-text">
                        <h5 class="tp-feature-2-title">Award winning</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- feature area end -->

   <!-- service area start -->
   @include('frontend.home.service')
   <!-- service area end -->

   <!-- project area start -->
   @include('frontend.home.project')
   <!-- project area end -->

   <!-- choose area start -->
   @include('frontend.home.choose_area')
   <!-- choose area end -->

   <!-- contact area start -->
   @include('frontend.home.contact')
   <!-- contact area end -->

   <!-- faq area start -->
   @include('frontend.home.faq')
   <!-- faq area end -->

   <!-- testimonial area start -->
   @include('frontend.home.testimonial')
   <!-- testimonial area end -->
@endsection
