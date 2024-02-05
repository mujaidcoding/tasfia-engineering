@extends('frontend.app')
@section('seo')
   <title>{{ $service->meta_title ?? 'Blogs - Tasfia Engineering' }}</title>
   <meta name="title" content="{{ $service->meta_title ?? 'Blogs - Tasfia Engineering' }}">
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
                     <h3 class="breadcrumb__title">Our blog</h3>
                  </div>
                  <div class="breadcrumb__list">
                     <span><a href="index.html">Home</a></span>
                     <span class="dvdr"><i>/</i></span>
                     <span>Our blog</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb area end -->

   <!-- blog area start -->
   <div class="tp-blog-3-area pt-120 pb-90">
      <div class="container">
         <div class="row">
            @foreach ($blogs as $blog)
               <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                  <div class="tp-blog-3-item">
                     <div class="tp-blog-3-thumb p-relative">
                        <img src="{{ 'frontend' }}/assets/img/blog/blog-3-1.jpg" alt="">
                        <div class="tp-blog-3-icon">
                           <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}"><i
                                 class="fa-sharp fa-solid fa-arrow-right"></i></a>
                        </div>
                     </div>
                     <div class="tp-blog-3-content z-index text-center">
                        <div class="tp-blog-meta pb-10">
                           <span><i class="fa-light fa-circle-user"></i>{{ $blog->author }}</span>
                           <span><i class="flaticon-price-tag"></i>Repair</span>
                        </div>
                        <h4 class="tp-blog-3-title"><a
                              href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                        </h4>
                     </div>
                  </div>
               </div>
            @endforeach

         </div>
      </div>
   </div>
   <!-- blog area end -->
@endsection
