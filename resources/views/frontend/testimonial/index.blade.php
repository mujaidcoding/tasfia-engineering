@extends('frontend.app')
@section('seo')
   <title>{{ $service->meta_title ?? 'Testimonial - Tasfia Engineering' }}</title>
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
                     <h3 class="breadcrumb__title">Testimonials</h3>
                  </div>
                  <div class="breadcrumb__list">
                     <span><a href="index.html">Home</a></span>
                     <span class="dvdr"><i>/</i></span>
                     <span>Testimonials</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb area end -->

   <!-- testimonial area start -->
   <div class="tp-testimonial-3-area tp-testimonial-3-item-box pt-120 pb-150 p-relative fix">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="tp-testimonial-3-section-box z-index mb-50 text-center">
                  <span class="tp-section-subtitle"><span>//</span>OUR CLIENTS REVIEW</span>
                  <h4 class="tp-section-title">What they’re talking about <br>our biddut services</h4>
               </div>
            </div>
            <div class="col-xl-12">
               <div class="tp-testimonial-3-wrapper">
                  <div class="swiper-container tp-testimonial-3-active">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="tp-testimonial-3-item-wrap p-relative">
                              <div class="tp-testimonial-3-item p-relative text-center">
                                 <div class="tp-testimonial-3-shape-1">
                                    <img src="assets/img/testimonial/shape-3-1.png" alt="">
                                 </div>
                                 <div class="tp-testimonial-3-avata">
                                    <img src="assets/img/testimonial/author-1-3.png" alt="">
                                 </div>
                                 <div class="tp-testimonial-3-content z-index-5">
                                    <div class="tp-testimonial-3-author-info pb-20">
                                       <h5 class="tp-testimonial-3-title">Jessica Robinson</h5>
                                       <span>Electrician</span>
                                    </div>
                                    <div class="tp-testimonial-3-text pb-5">
                                       <p>Our experienced electricians are highly trained aspects electrical and many
                                          security to emergency </p>
                                    </div>
                                    <div class="tp-testimonial-3-star">
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-testimonial-3-item-wrap p-relative">
                              <div class="tp-testimonial-3-item p-relative text-center">
                                 <div class="tp-testimonial-3-shape-1">
                                    <img src="assets/img/testimonial/shape-3-1.png" alt="">
                                 </div>
                                 <div class="tp-testimonial-3-avata">
                                    <img src="assets/img/testimonial/author-1-4.png" alt="">
                                 </div>
                                 <div class="tp-testimonial-3-content z-index-5">
                                    <div class="tp-testimonial-3-author-info pb-20">
                                       <h5 class="tp-testimonial-3-title">Alberta Infantio</h5>
                                       <span>Engineer</span>
                                    </div>
                                    <div class="tp-testimonial-3-text pb-5">
                                       <p>Our experienced electricians are highly trained aspects electrical and many
                                          security to emergency </p>
                                    </div>
                                    <div class="tp-testimonial-3-star">
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-testimonial-3-item-wrap p-relative">
                              <div class="tp-testimonial-3-item p-relative text-center">
                                 <div class="tp-testimonial-3-shape-1">
                                    <img src="assets/img/testimonial/shape-3-1.png" alt="">
                                 </div>
                                 <div class="tp-testimonial-3-avata">
                                    <img src="assets/img/testimonial/author-1-5.png" alt="">
                                 </div>
                                 <div class="tp-testimonial-3-content z-index-5">
                                    <div class="tp-testimonial-3-author-info pb-20">
                                       <h5 class="tp-testimonial-3-title">Robinson Cruze</h5>
                                       <span>Electrician</span>
                                    </div>
                                    <div class="tp-testimonial-3-text pb-5">
                                       <p>Our experienced electricians are highly trained aspects electrical and many
                                          security to emergency </p>
                                    </div>
                                    <div class="tp-testimonial-3-star">
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-testimonial-3-item-wrap p-relative">
                              <div class="tp-testimonial-3-item p-relative text-center">
                                 <div class="tp-testimonial-3-shape-1">
                                    <img src="assets/img/testimonial/shape-3-1.png" alt="">
                                 </div>
                                 <div class="tp-testimonial-3-avata">
                                    <img src="assets/img/testimonial/author-1-4.png" alt="">
                                 </div>
                                 <div class="tp-testimonial-3-content z-index-5">
                                    <div class="tp-testimonial-3-author-info pb-20">
                                       <h5 class="tp-testimonial-3-title">Alberta Infantio</h5>
                                       <span>Engineer</span>
                                    </div>
                                    <div class="tp-testimonial-3-text pb-5">
                                       <p>Our experienced electricians are highly trained aspects electrical and many
                                          security to emergency </p>
                                    </div>
                                    <div class="tp-testimonial-3-star">
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- testimonial area end -->
@endsection
