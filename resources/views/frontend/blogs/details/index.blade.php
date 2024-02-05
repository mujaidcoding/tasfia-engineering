@extends('frontend.app')

@section('seo')
   <title>{{ $blog->meta_title ?? 'Tasfia Engineering' }}</title>
   <meta name="title" content="{{ $blog->meta_title ?? 'Default Title' }}">
   <meta name="description" content="{{ $blog->meta_desc ?? 'Default Description' }}">
   <meta name="keywords"
      content="{{ isset($blog->meta_keywords) ? implode(', ', explode(',', $blog->meta_keywords)) : 'Default Keywords' }}">
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
                     <h3 class="breadcrumb__title">{{ Str::limit($blog->title, 40) }}</h3>
                  </div>
                  <div class="breadcrumb__list">
                     <span><a href="index.html">Home</a></span>
                     <span class="dvdr"><i>/</i></span>
                     <span>Blog details</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb area end -->

   <!-- postbox area start -->
   <section class="postbox__area pt-120 pb-70">
      <div class="container">
         <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8 mb-50">
               <div class="postbox__wrapper">
                  <article class="postbox__item format-image transition-3">
                     <div class="postbox__thumb p-relative m-img">
                        <div class="postbox__thumb-text-2 d-none d-md-block">
                           <span>{{ $blog->created_at->format('d F') }}</span>
                        </div>
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                     </div>
                     <div class="postbox__content mb-70">
                        <div class="postbox__meta-box d-flex justify-content-between align-items-center pb-5">
                           <div class="postbox__meta">
                              <span><i class="fa-light fa-user"></i>By {{ $blog->author }}</span>
                              <span><a href="#"><i class="fa-light fa-tag tag"></i>Solution</a></span>
                           </div>
                        </div>
                        <h3 class="postbox__title pb-5">{{ $blog->title }}</h3>
                        <div class="postbox__text">
                           <p>{!! $blog->desc !!}</p>

                           <div class="postbox__thumb m-img p-relative">
                              <div class="postbox__details-share-wrapper">
                                 <div class="row">
                                    <div class="col-xl-5 col-lg-6 col-md-6">
                                       <div class="postbox__details-tag tagcloud">
                                          <span>Tag:</span>

                                          @foreach ($tags_all as $tag)
                                             <a href="#">{{ ucwords($tag) }}</a>
                                          @endforeach
                                       </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-6 col-md-6">
                                       <div class="postbox__details-share text-lg-end">
                                          <span>Share:</span>
                                          <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                             target="_blank">
                                             <i class="fab fa-facebook-f"></i>
                                          </a>

                                          <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"
                                             target="_blank">
                                             <i class="fab fa-twitter"></i>
                                          </a>

                                          <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}"
                                             target="_blank">
                                             <i class="fab fa-linkedin"></i>
                                          </a>

                                          <a href="https://www.pinterest.com/pin/create/button/?url={{ url()->current() }}"
                                             target="_blank">
                                             <i class="fa-brands fa-pinterest"></i>
                                          </a>

                                       </div>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                  </article>
               </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 mb-50">
               <div class="sidebar__wrapper">
                  <div class="sidebar__widget mb-30">
                     <h3 class="sidebar__widget-title">Our Services</h3>
                     <div class="sidebar__widget-content">
                        <ul>
                           @foreach ($services as $service)
                              <li>
                                 <a href="{{ route('service.detail', ['slug' => $service->slug]) }}">
                                    {{ Str::limit($service->title, 20) }}
                                    <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span>
                                 </a>
                              </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  <div class="sidebar__widget mb-30">
                     <h3 class="sidebar__widget-title">Our Latest Post</h3>
                     <div class="sidebar__widget-content">
                        <div class="sidebar__post">

                           @foreach ($post as $post)
                              <div class="rc__post mb-25 d-flex align-items-center">
                                 <div class="rc__post-thumb mr-20">
                                    <a href="blog-details.html"><img src="{{ asset($post->image) }}" alt=""
                                          height="70px" width="70px"></a>
                                 </div>
                                 <div class="rc__post-content">
                                    <div class="rc__meta">
                                       <span><i class="fa-light fa-clock"></i>
                                          {{ $post->created_at->format('F d, Y') }}
                                       </span>
                                    </div>
                                    <h3 class="rc__post-title">
                                       <a href="blog-details.html">
                                          {{ Str::limit($post->title, 30) }}
                                       </a>
                                    </h3>
                                 </div>
                              </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
                  <div class="sidebar__widget mb-30">
                     <h3 class="sidebar__widget-title">Catagories</h3>
                     <div class="sidebar__widget-content">
                        <ul>
                           @foreach ($bcategory as $bcat)
                              <li
                                 class="{{ request()->routeIs('blog.detail') && $blog->blogcat_id === $bcat->id ? 'active' : '' }}">
                                 <a href="{{ route('all.category', ['slug' => $bcat->category_slug]) }}">
                                    {{ $bcat->category_name }}
                                    <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span>
                                 </a>
                              </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  <div class="sidebar__widget mb-30">
                     <h3 class="sidebar__widget-title">Tags</h3>
                     <div class="sidebar__widget-content">
                        <div class="tagcloud">
                           @foreach ($tags_all as $tag)
                              <a href="#">{{ ucwords($tag) }}</a>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- postbox area end -->
@endsection
