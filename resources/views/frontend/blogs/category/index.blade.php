@extends('frontend.app')

@section('seo')
   <title>{{ $category->category_name ?? 'Category - Tasfia Engineering' }}</title>
   <meta name="title" content="{{ $category->category_name ?? 'Category - Tasfia Engineering' }}">
   <meta name="description" content="{{ $meta_desc ?? 'Default Description' }}">
   <meta name="keywords" content="{{ $meta_keywords ?? 'Default Keywords' }}">
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
                     <h3 class="breadcrumb__title">Blog sidebar</h3>
                  </div>
                  <div class="breadcrumb__list">
                     <span><a href="index.html">Home</a></span>
                     <span class="dvdr"><i>/</i></span>
                     <span>Blog sidebar</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb area end -->

   <!-- postbox area start -->
   <section class="postbox__area pt-120 pb-120">
      <div class="container">
         <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
               <div class="postbox__wrapper-2">

                  @forelse ($blogs as $blog)
                     <article class="postbox__item format-image mb-30 transition-3">
                        <div class="postbox__thumb w-img">
                           <a href="{{ route('blog.detail', $blog->slug) }}">
                              <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                           </a>
                           <div class="postbox__thumb-text">
                              <span>{{ $blog->created_at->format('F d Y') }}</span>
                           </div>
                        </div>
                        <div class="postbox__content">
                           <div class="postbox__meta">
                              <span>By {{ $blog->author }}</span>
                           </div>
                           <h3 class="postbox__title">

                              <a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                           </h3>
                           <div class="postbox__text">
                              <p>{{ Str::limit($blog->desc, 200) }}</p>
                           </div>
                           <div class="postbox__read-more">
                              <a class="tp-btn-black" href="{{ route('blog.detail', $blog->slug) }}"><span>read
                                    more</span></a>
                           </div>
                        </div>
                     </article>
                  @empty
                     <!-- Display this when there are no blogs -->
                     <div class="alert alert-info">
                        <strong>No blogs found!</strong> Sorry, there are no blogs available at the moment.
                     </div>
                  @endforelse

               </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
               <div class="sidebar__wrapper">
                  <div class="sidebar__widget sidebar__widget-theme-bg mb-30">
                     <div class="sidebar__widget-content">
                        <div class="sidebar__search">
                           <form id="searchForm"
                              action="{{ route('all.category', ['slug' => $category->category_slug]) }}" method="GET">
                              <div class="sidebar__search-input-2">
                                 <input id="searchInput" name="search" type="text" value="{{ old('search') }}"
                                    placeholder="Search here">
                                 <button type="submit"><i class="far fa-search"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="sidebar__widget mb-30">
                     <h3 class="sidebar__widget-title">Our Latest Post</h3>
                     <div class="sidebar__widget-content">
                        <div class="sidebar__post">
                           @foreach ($blogs as $blog)
                              <div class="rc__post mb-25 d-flex align-items-center">
                                 <div class="rc__post-thumb mr-20">
                                    <a href="{{ route('blog.detail', $blog->slug) }}"><img
                                          src="{{ asset($blog->image) }}" alt="" width="70px"
                                          height="70px"></a>
                                 </div>
                                 <div class="rc__post-content">
                                    <div class="rc__meta">
                                       <span><i class="fa-light fa-clock"></i>{{ $blog->created_at->format('F d Y') }}
                                       </span>
                                    </div>
                                    <h3 class="rc__post-title">
                                       <a href="{{ route('blog.detail', $blog->slug) }}">
                                          {{ Str::limit($blog->title, 30) }}</a>
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
                           @foreach ($bcats as $bcat)
                              <li
                                 class="{{ Route::currentRouteName() === 'all.category' && request()->slug === $bcat->category_slug ? 'active' : '' }}">
                                 <a href="{{ route('all.category', ['slug' => $bcat->category_slug]) }}">
                                    {{ $bcat->category_name }}
                                    <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span>
                                 </a>
                              </li>
                           @endforeach

                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- postbox area end -->
@endsection
