<!DOCTYPE html>
<html class="no-js" lang="zxx">

   <head>

      <!-- Meta Tags -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      @yield('seo')
      <meta name="author" content="Tasfia Engineering & Construction PTE Ltd">
      <meta property="fb:app_id" content="{{ $fbAppId ?? '' }}">
      <meta property="og:title" content="{{ $ogTitle ?? '' }}">
      <meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
      <meta property="og:description" content="{{ $ogDescription ?? '' }}">
      <meta property="og:image"
         content="{{ $ogImage ?? 'https://mujaid.com/uploads/img/general/1678516228-Mujaid.png' }}">
      <meta itemprop="image" content="{{ $ogImage ?? 'https://mujaid.com/uploads/img/general/1678516228-Mujaid.png' }}">
      <meta property="og:type" content="{{ $ogType ?? 'website' }}">

      <meta name="twitter:card" content="{{ $twitterCard ?? 'summary_large_image' }}">
      <meta name="twitter:image"
         content="{{ $twitterImage ?? 'https://mujaid.com/uploads/img/general/1678516228-Mujaid.png' }}">
      <meta property="twitter:title" content="{{ $twitterTitle ?? '' }}">
      <meta property="twitter:description" content="{{ $twitterDescription ?? '' }}">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      @include('frontend.includes.css')
   </head>

   <body>
      <!-- pre loader area start -->
      <div id="loading">
         <div id="loading-center">
            <div id="loading-center-absolute">
               <div class="object" id="object_four"></div>
               <div class="object" id="object_three"></div>
               <div class="object" id="object_two"></div>
               <div class="object" id="object_one"></div>
            </div>
         </div>
      </div>
      <!-- pre loader area end -->

      <!-- back to top start -->
      <div class="back-to-top-wrapper">
         <button class="back-to-top-btn" id="back_to_top" type="button">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round" />
            </svg>
         </button>
      </div>
      <!-- back to top end -->

      @include('frontend.includes.header')

      <main>
         @yield('content')
      </main>

      @include('frontend.includes.footer')

      <!-- JS here -->
      @include('frontend.includes.script')
   </body>

</html>
