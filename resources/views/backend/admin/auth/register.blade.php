<!doctype html>
<html lang="en">

   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--favicon-->
      <link type="image/png" href="{{ asset('backend') }}/assets/images/favicon-32x32.png" rel="icon" />
      <!--plugins-->
      <link href="{{ asset('backend') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
      <link href="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
      <link href="{{ asset('backend') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
      <!-- loader-->
      <link href="{{ asset('backend') }}/assets/css/pace.min.css" rel="stylesheet" />
      <script src="{{ asset('backend') }}/assets/js/pace.min.js"></script>
      <!-- Bootstrap CSS -->
      <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="{{ asset('backend') }}/assets/css/bootstrap-extended.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      <link href="{{ asset('backend') }}/assets/css/app.css" rel="stylesheet">
      <link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet">
      <title>Register Now</title>
   </head>

   <body class="">
      <!--wrapper-->
      <div class="wrapper">
         <div class="section-authentication-cover">
            <div class="">
               <div class="row g-0">

                  <div
                     class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                     <div class="card rounded-0 mb-0 bg-transparent shadow-none shadow-none">
                        <div class="card-body">
                           <img class="img-fluid auth-img-cover-login"
                              src="{{ asset('backend') }}/assets/images/login-images/register-cover.svg" alt=""
                              width="550" />
                        </div>
                     </div>

                  </div>

                  <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                     <div class="card rounded-0 m-3 mb-0 bg-transparent shadow-none">
                        <div class="card-body p-sm-5">
                           <div class="">
                              <div class="mb-3 text-center">
                                 <img src="{{ asset('backend') }}/assets/images/logo-icon.png" alt=""
                                    width="60" />
                              </div>
                              <div class="mb-4 text-center">
                                 <h5 class="">Rocker Admin</h5>
                                 <p class="mb-0">Please fill the below details to create your account</p>
                              </div>
                              <div class="form-body">
                                 <form class="row g-3" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                       <label class="form-label" for="inputEmailAddress">Full Name</label>
                                       <input class="form-control @error('name') is-invalid @enderror" id="name"
                                          name="name" type="text" value="{{ old('name') }}"
                                          placeholder="Mohammad Hossen">

                                       @error('name')
                                          <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>

                                    <div class="col-12">
                                       <label class="form-label" for="inputEmailAddress">Email</label>
                                       <input class="form-control @error('email') is-invalid @enderror" id="email"
                                          name="email" type="email" value="{{ old('email') }}"
                                          placeholder="jhon@example.com">

                                       @error('email')
                                          <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                    <div class="col-12">
                                       <label class="form-label" for="inputChoosePassword">Password</label>
                                       <div class="input-group" id="show_hide_password">
                                          <input
                                             class="form-control border-end-0 @error('password') is-invalid @enderror"
                                             id="password" name="password" type="password"
                                             placeholder="Enter Password"> <a class="input-group-text bg-transparent"
                                             href="javascript:;"><i class='bx bx-hide'></i>
                                          </a>
                                       </div>
                                       @error('password')
                                          <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                    <div class="col-12">
                                       <label class="form-label" for="inputChoosePassword">Confirm Password</label>
                                       <div class="input-group" id="show_hide_password">
                                          <input class="form-control border-end-0" id="password_confirmation"
                                             name="password_confirmation" type="password"
                                             placeholder="Confirm Password">
                                          <a class="input-group-text bg-transparent" href="javascript:;"><i
                                                class='bx bx-hide'>
                                             </i>
                                          </a>

                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="d-grid">
                                          <button class="btn btn-primary" type="submit">Sign up</button>
                                       </div>
                                    </div>

                                 </form>
                                 <div class="col-12">
                                    <div class="text-center">
                                       <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign
                                             in here</a></p>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>

               </div>
               <!--end row-->
            </div>
         </div>
      </div>
      <!--end wrapper-->
      <!-- Bootstrap JS -->
      <script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
      <!--plugins-->
      <script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
      <script src="{{ asset('backend') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
      <script src="{{ asset('backend') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
      <script src="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
      <!--Password show & hide js -->
      <script>
         $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
               event.preventDefault();
               if ($('#show_hide_password input').attr("type") == "text") {
                  $('#show_hide_password input').attr('type', 'password');
                  $('#show_hide_password i').addClass("bx-hide");
                  $('#show_hide_password i').removeClass("bx-show");
               } else if ($('#show_hide_password input').attr("type") == "password") {
                  $('#show_hide_password input').attr('type', 'text');
                  $('#show_hide_password i').removeClass("bx-hide");
                  $('#show_hide_password i').addClass("bx-show");
               }
            });
         });
      </script>
      <!--app JS-->
      <script src="{{ asset('backend') }}/assets/js/app.js"></script>
   </body>

</html>
