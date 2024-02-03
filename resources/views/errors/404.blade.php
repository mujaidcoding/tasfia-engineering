<!DOCTYPE html>
<html lang="en">

   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--favicon-->
      <link type="image/png" href="{{ asset('backend') }}/assets/images/favicon-32x32.png" rel="icon" />
      <!-- loader-->
      <link href="{{ asset('backend') }}/assets/css/pace.min.css" rel="stylesheet" />
      <script src="{{ asset('backend') }}/assets/js/pace.min.js"></script>
      <!-- Bootstrap CSS -->
      <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="{{ asset('backend') }}/assets/css/bootstrap-extended.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      <link href="{{ asset('backend') }}/assets/css/app.css" rel="stylesheet">
      <link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet">
      <title>Error 404</title>
   </head>

   <body>
      <!-- wrapper -->
      <div class="wrapper">
         <nav class="navbar navbar-expand-lg navbar-light fixed-top rounded-0 rounded bg-white shadow-sm">
            <div class="container-fluid">
               <a class="navbar-brand" href="#">
                  <img src="{{ asset('backend') }}/assets/images/logo-img.png" alt="" width="140" />
               </a>
               <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1"
                  type="button" aria-controls="navbarSupportedContent1" aria-expanded="false"
                  aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
               </button>
               <div class="navbar-collapse collapse" id="navbarSupportedContent1">
                  <ul class="navbar-nav mb-lg-0 mb-2 ms-auto">
                     <li class="nav-item"> <a class="nav-link active" href="#" aria-current="page"><i
                              class='bx bx-home-alt me-1'></i>Home</a>
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-user me-1'></i>About</a>
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="#"><i
                              class='bx bx-category-alt me-1'></i>Features</a>
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="#"><i
                              class='bx bx-microphone me-1'></i>Contact</a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
         <div class="error-404 d-flex align-items-center justify-content-center">
            <div class="container">
               <div class="card py-5">
                  <div class="row g-0">
                     <div class="col col-xl-5">
                        <div class="card-body p-4">
                           <h1 class="display-1"><span class="text-primary">4</span><span
                                 class="text-danger">0</span><span class="text-success">4</span></h1>
                           <h2 class="font-weight-bold display-4">Lost in Space</h2>
                           <p>You have reached the edge of the universe.
                              <br>The page you requested could not be found.
                              <br>Dont'worry and return to the previous page.
                           </p>
                           <div class="mt-5"> <a class="btn btn-primary btn-lg px-md-5 radius-30"
                                 href="javascript:;">Go Home</a>
                              <a class="btn btn-outline-dark btn-lg px-md-5 radius-30 ms-3" href="javascript:;">Back</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-7">
                        <img class="img-fluid"
                           src="https://cdn.searchenginejournal.com/wp-content/uploads/2019/03/shutterstock_1338315902.png"
                           alt="">
                     </div>
                  </div>
                  <!--end row-->
               </div>
            </div>
         </div>
         <div class="fixed-bottom border-top bg-white p-3 shadow">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
               <ul class="list-inline mb-0">
                  <li class="list-inline-item">Follow Us :</li>
                  <li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-facebook me-1'></i>Facebook</a>
                  </li>
                  <li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-twitter me-1'></i>Twitter</a>
                  </li>
                  <li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-google me-1'></i>Google</a>
                  </li>
               </ul>
               <p class="mb-0">Copyright © 2023. All right reserved.</p>
            </div>
         </div>
      </div>
      <!-- end wrapper -->
      <!-- Bootstrap JS -->
      <script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
   </body>

</html>
