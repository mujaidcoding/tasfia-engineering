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
      data-background="assets/img/breadcurmb/breadcurmb.jpg">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="breadcrumb__content z-index d-flex justify-content-between align-items-end">
                  <div class="breadcrumb__section-title-box">
                     <h4 class="breadcrumb__subtitle">Tasfia Engineering</h4>
                     <h3 class="breadcrumb__title">Project</h3>
                  </div>
                  <div class="breadcrumb__list">
                     <span><a href="index.html">Home</a></span>
                     <span class="dvdr"><i>/</i></span>
                     <span>Project</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb area end -->

   <!-- project area start -->
   <div class="tp-project-area p-relative pt-120 pb-90">
      <div class="tp-project-shape-1 d-none d-xl-block">
         <img src="assets/img/project/shape-1-1.png" alt="">
      </div>
      <div class="container">
         <div class="row">
            @if ($projects)
               @foreach ($projects as $project)
                  <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1.2s">
                     <div class="tp-project-item p-relative">
                        <div class="tp-project-thumb rounded">
                           <img src="{{ asset($project->image) }}" alt="{{ $project->name }}">
                        </div>
                        <div class="tp-project-content">
                           <div class="tp-slider-2-play-icon d-flex align-items-center justify-content-around">
                              <a class="popup-image" href="{{ asset($project->image) }}"><i
                                    class="fa-sharp fa-light fa-eye"></i>
                              </a>
                              <a class="popup-video" href="{{ $project->video }}"><i class="fas fa-play"></i>
                              </a>
                           </div>
                           <br>
                           <h4 class="tp-project-title"><a class="popup-video"
                                 href="{{ $project->video }}">{{ $project->name }}</a></h4>
                        </div>
                     </div>
                  </div>
               @endforeach
            @else
               <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1.2s">
                  <div class="tp-project-item p-relative">
                     <div class="tp-project-thumb">
                        <img src="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg" alt="">
                     </div>
                     <div class="tp-project-content">
                        <div class="tp-slider-2-play-icon d-flex align-items-center justify-content-between">
                           <a class="popup-image mr-5" href="{{ asset('frontend/assets') }}/img/blog/blog-1-1.jpg"><i
                                 class="fa-sharp fa-light fa-eye"></i>
                           </a>
                           <a class="popup-video ml-5" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i
                                 class="fas fa-play"></i>
                           </a>
                        </div>

                        <a href="project-details.html"><i class="flaticon-right-arrow"></i></a>
                        <span>Repair</span>
                        <h4 class="tp-project-title"><a href="project-details.html">Data System Wiring</a></h4>
                     </div>
                  </div>
               </div>
            @endif
         </div>
      </div>
   </div>
   <!-- project area end -->
@endsection
