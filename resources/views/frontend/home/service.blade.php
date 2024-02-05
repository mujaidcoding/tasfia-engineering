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
         @if ($services)
            @foreach ($services as $service)
               <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                  <div class="tp-service-item p-relative">
                     <div class="tp-service-thumb">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}">
                     </div>
                     <div class="tp-service-content-box">
                        <div class="tp-service-content fix">
                           <div class="tp-service-icon p-relative">
                              <span><i class="fa-light fa-briefcase"></i></span>
                              <div class="tp-service-icon-shape">
                                 <img src="{{ asset('frontend') }}/assets/img/service/shape-1-1.png" alt="">
                              </div>
                           </div>
                           <div class="tp-service-text pb-5">
                              <h4 class="tp-service-title">
                                 <a
                                    href="{{ route('service.detail', ['slug' => $service->slug]) }}">{{ $service->title }}</a>
                              </h4>
                              <p>{!! $service->meta_desc !!}</p>
                           </div>
                           <div class="tp-service-arrow">
                              <a href="{{ route('service.detail', ['slug' => $service->slug]) }}">Read More<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="tp-service-shape-1">
                        <img src="{{ 'frontend' }}/assets/img/service/shape-1-2.png" alt="">
                     </div>
                  </div>
               </div>
            @endforeach
         @else
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
               <div class="tp-service-item p-relative">
                  <div class="tp-service-thumb">
                     <img src="assets/img/service/sv-1-1.jpg" alt="">
                  </div>
                  <div class="tp-service-content-box">
                     <div class="tp-service-content fix">
                        <div class="tp-service-icon p-relative">
                           <span><i class="flaticon-lamp"></i></span>
                           <div class="tp-service-icon-shape">
                              <img src="assets/img/service/shape-1-1.png" alt="">
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
                     <img src="assets/img/service/shape-1-2.png" alt="">
                  </div>
               </div>
            </div>
         @endif

      </div>
   </div>
</div>
