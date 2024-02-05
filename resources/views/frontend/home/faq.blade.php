<div class="tp-faq-area p-relative pt-120 pb-120">
   <div class="tp-faq-thumb" data-background="{{ asset('frontend/assets') }}/img/cta/faq-bg.jpg"></div>
   <div class="tp-faq-text d-none d-xxl-block">
      <h5>OUR FAQ’S</h5>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-xxl-7 col-xl-6 col-lg-6 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".s">
            <div class="tp-custom-accordion">
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

                  {{-- <div class="accordion-items tp-faq-active">
                    <h2 class="accordion-header" id="headingOne">
                       <button class="accordion-buttons" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                          type="button" aria-expanded="true" aria-controls="collapseOne">
                          {{ $faq->question }}
                       </button>
                    </h2>
                    <div class="accordion-collapse show collapse" id="collapseOne"
                       data-bs-parent="#accordionExample" aria-labelledby="headingOne">
                       <div class="accordion-body">{{ $faq->answer }}</div>
                    </div>
                 </div> --}}
                  {{-- <div class="accordion-items">
                     <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-buttons collapsed" data-bs-toggle="collapse"
                           data-bs-target="#collapseTwo" type="button" aria-expanded="false"
                           aria-controls="collapseTwo">
                           Can’t I just call a handyman to fix minor electrical problems?
                        </button>
                     </h2>
                     <div class="accordion-collapse collapse" id="collapseTwo" data-bs-parent="#accordionExample"
                        aria-labelledby="headingTwo">
                        <div class="accordion-body">
                           The transfer of an immigrant visa application from USCIS to the National takes about
                           30-60 days.
                           Before phoning to confirm receipt of an application, the National Visa Center
                           recommends waiting
                           at least 60 days from
                        </div>
                     </div>
                  </div>
                  <div class="accordion-items">
                     <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-buttons collapsed" data-bs-toggle="collapse"
                           data-bs-target="#collapseThree" type="button" aria-expanded="false"
                           aria-controls="collapseThree">
                           Do I need to be present when your team is working?
                        </button>
                     </h2>
                     <div class="accordion-collapse collapse" id="collapseThree" data-bs-parent="#accordionExample"
                        aria-labelledby="headingThree">
                        <div class="accordion-body">
                           The transfer of an immigrant visa application from USCIS to the National takes about
                           30-60 days.
                           Before phoning to confirm receipt of an application, the National Visa Center
                           recommends waiting
                           at least 60 days from
                        </div>
                     </div>
                  </div>
                  <div class="accordion-items">
                     <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-buttons collapsed" data-bs-toggle="collapse"
                           data-bs-target="#collapseFour" type="button" aria-expanded="false"
                           aria-controls="collapseFour">
                           How do you handle emergency electrical issues?
                        </button>
                     </h2>
                     <div class="accordion-collapse collapse" id="collapseFour" data-bs-parent="#accordionExample"
                        aria-labelledby="headingFour">
                        <div class="accordion-body">
                           The transfer of an immigrant visa application from USCIS to the National takes about
                           30-60 days.
                           Before phoning to confirm receipt of an application, the National Visa Center
                           recommends waiting
                           at least 60 days from
                        </div>
                     </div>
                  </div>
                  <div class="accordion-items mb-0">
                     <h2 class="accordion-header" id="headingFour4">
                        <button class="accordion-buttons collapsed" data-bs-toggle="collapse"
                           data-bs-target="#collapseFour4" type="button" aria-expanded="false"
                           aria-controls="collapseFour4">
                           Are You Licensed and Insured?
                        </button>
                     </h2>
                     <div class="accordion-collapse collapse" id="collapseFour4" data-bs-parent="#accordionExample"
                        aria-labelledby="headingFour4">
                        <div class="accordion-body">
                           The transfer of an immigrant visa application from USCIS to the National takes about
                           30-60 days.
                           Before phoning to confirm receipt of an application, the National Visa Center
                           recommends waiting
                           at least 60 days from
                        </div>
                     </div>
                  </div> --}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
