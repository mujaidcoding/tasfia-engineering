@extends('frontend.app')

@section('seo')
   <title>{{ $service->meta_title ?? 'Faqs - Tasfia Engineering' }}</title>
   <meta name="title" content="{{ $service->meta_title ?? 'Faqs - Tasfia Engineering' }}">
   <meta name="description" content="{{ $service->meta_desc ?? 'Default Description' }}">
   <meta name="keywords"
      content="{{ isset($service->meta_keywords) ? implode(', ', explode(',', $blog->meta_keywords)) : 'Default Keywords' }}">
@endsection

@section('content')
   <!-- breadcrumb area start -->
   <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
      data-background="{{ 'frontend' }}/assets/img/breadcurmb/breadcurmb.jpg">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="breadcrumb__content z-index d-flex justify-content-between align-items-end">
                  <div class="breadcrumb__section-title-box">
                     <h4 class="breadcrumb__subtitle">Tasfia Engineering</h4>
                     <h3 class="breadcrumb__title">Our faq’s</h3>
                  </div>
                  <div class="breadcrumb__list">
                     <span><a href="index.html">Home</a></span>
                     <span class="dvdr"><i>/</i></span>
                     <span>Our faq’s</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb area end -->

   <!-- faq area start -->
   <div class="tp-faq-area pt-120">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="tp-faq-title-box pb-60 text-center">
                  <h4 class="tp-section-title text-black">
                     Steel need help?
                  </h4>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
               <div class="tp-faq-item p-relative">
                  <div class="tp-faq-thumb-box">
                     <img src="{{ 'frontend' }}/assets/img/faq/thumb-1.jpg" alt="">
                  </div>
                  <div class="tp-faq-thumb-text">
                     <h4 class="tp-faq-title">24/7 Support</h4>
                     <a href="contact.html"><i class="flaticon-right-arrow"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
               <div class="tp-faq-item p-relative">
                  <div class="tp-faq-thumb-box">
                     <img src="{{ 'frontend' }}/assets/img/faq/thumb-2.jpg" alt="">
                  </div>
                  <div class="tp-faq-thumb-text">
                     <h4 class="tp-faq-title">Community</h4>
                     <a href="contact.html"><i class="flaticon-right-arrow"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
               <div class="tp-faq-item p-relative">
                  <div class="tp-faq-thumb-box">
                     <img src="{{ 'frontend' }}/assets/img/faq/thumb-3.jpg" alt="">
                  </div>
                  <div class="tp-faq-thumb-text">
                     <h4 class="tp-faq-title">News & Update</h4>
                     <a href="contact.html"><i class="flaticon-right-arrow"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- faq area end -->

   <!-- faw area start -->
   <div class="tp-faq-area tp-faq-space grey-bg-2">
      <div class="container">
         <div class="row">
            <div class="col-xl-5 col-lg-5 mb-50 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
               <div class="tp-faq-left-box">
                  <h4 class="tp-section-title">
                     Our most popular <br> question
                  </h4>
               </div>
            </div>
            <div class="col-xl-7 col-lg-7 mb-50 wow tpfadeRight" data-wow-duration=".9s" data-wow-delay=".7s">
               <div class="tp-custom-accordion-2">
                  <div class="accordion" id="accordionExample">
                     @foreach ($faqs as $key => $faq)
                        <div class="accordion-items {{ $key === 0 ? 'tp-faq-active' : '' }}">
                           <h2 class="accordion-header" id="heading{{ $key }}">
                              <button class="accordion-buttons {{ $key === 0 ? '' : 'collapsed' }}"
                                 data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" type="button"
                                 aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                 aria-controls="collapse{{ $key }}">
                                 {{ $faq->question }}
                              </button>
                           </h2>
                           <div class="accordion-collapse {{ $key === 0 ? 'show' : 'collapse' }}"
                              id="collapse{{ $key }}" data-bs-parent="#accordionExample"
                              aria-labelledby="heading{{ $key }}">
                              <div class="accordion-body">{{ $faq->answer }}</div>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- faw area end -->
@endsection
