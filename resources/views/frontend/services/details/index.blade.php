@extends('frontend.app')

@section('seo')
   <title>{{ $service->meta_title ?? 'Projects - Tasfia Engineering' }}</title>
   <meta name="title" content="{{ $service->meta_title ?? 'Projects - Tasfia Engineering' }}">
   <meta name="description" content="{{ $service->meta_desc ?? 'Default Description' }}">
   <meta name="keywords"
      content="{{ isset($service->meta_keywords) ? implode(', ', explode(',', $blog->meta_keywords)) : 'Default Keywords' }}">
@endsection

@section('content')
   <!-- breadcrumb area start -->
   <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
      data-background="{{ asset($service->image) }}">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="breadcrumb__content z-index d-flex justify-content-between align-items-end">
                  <div class="breadcrumb__section-title-box">
                     <h4 class="breadcrumb__subtitle">Tasfia Engineering</h4>
                     <h3 class="breadcrumb__title">Service details</h3>
                  </div>
                  <div class="breadcrumb__list">
                     <span><a href="index.html">Home</a></span>
                     <span class="dvdr"><i>/</i></span>
                     <span>Service details</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb area end -->

   <!-- service-details area start -->
   <div class="tp-service-details-area pt-120 pb-120">
      <div class="container">
         <div class="row">
            <div class="col-xl-4 col-lg-4">
               <div class="tp-service-details-left-box">
                  <div class="tp-service-details-widget mb-30">
                     <div class="tp-service-details-category">
                        <h4 class="tp-service-details-title">Our Services</h4>
                        <ul>
                           @if ($service)
                              @foreach ($services as $service)
                                 <li
                                    class="{{ request()->routeIs('service.detail') && request()->slug == $service->slug ? 'active' : '' }}">
                                    <a class="p-relative {{ request()->routeIs('service.detail') && request()->slug == $service->slug ? 'active' : '' }}"
                                       href="{{ route('service.detail', ['slug' => $service->slug]) }}"><span>{{ Str::limit($service->title, 30) }}</span><i
                                          class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                 </li>
                              @endforeach
                           @else
                              <li class="active">
                                 <a class="p-relative active" href="#"><span>Electric panel repair</span><i
                                       class="flaticon-right-arrow"></i></a>
                              </li>
                              <li class="active">
                                 <a class="p-relative active" href="#"><span>Electric panel repair</span><i
                                       class="flaticon-right-arrow"></i></a>
                              </li>
                              <li class="active">
                                 <a class="p-relative active" href="#"><span>Electric panel repair</span><i
                                       class="flaticon-right-arrow"></i></a>
                              </li>
                              <li class="active">
                                 <a class="p-relative active" href="#"><span>Electric panel repair</span><i
                                       class="flaticon-right-arrow"></i></a>
                              </li>
                           @endif

                        </ul>
                     </div>
                  </div>
                  <div class="tp-service-details-widget mb-30">
                     <div class="tp-service-details-thumb-box text-center">
                        <a href="index.html"><img src="{{ 'frontend' }}/assets/img/logo/black-logo.png"
                              alt=""></a>
                        <h4 class="tp-service-details-title mt-35 mb-25">Get full range <br> of premium services</h4>
                        <div class="tp-service-details-thumb">
                           <img src="{{ 'frontend' }}/assets/img/service/Service-Details.png" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="tp-service-details-widget mb-30">
                     <div class="tp-service-details-contact-box d-flex align-items-center">
                        <div class="tp-service-details-contact-icon">
                           <span><i class="flaticon-phone-call"></i></span>
                        </div>
                        <div class="tp-service-details-contact-text">
                           <span>Talk to an expert </span>
                           <a href="tel:9978687655689"><span>Free</span> +99 (786) 8765 5689</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-8 col-lg-8">
               <div class="tp-service-details-right-wrap">
                  {{-- <div class="tp-service-details-text pb-40">
                     <h4 class="tp-section-title pb-20">Electric panel reapiring. <br>Biddut have 25 years experience</h4>
                     <p>
                        We embrace holistic development and support for employees with the aim of being a first-choice
                        employer within our sectors. Through a unique combination of engineering, construction and design
                        disciplines and expertise
                     </p>
                  </div> --}}
                  <div class="tp-service-details-right-thumb mb-50">
                     <img class="w-100" src="{{ asset($service->image) }}" alt="">
                  </div>
                  <div class="tp-service-details-text pb-25">
                     <h4 class="tp-section-title pb-20">{{ $service->title }}</h4>
                     <p>{!! $service->desc !!}</p>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- service-details area end -->
@endsection
