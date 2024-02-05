<!doctype html>
<html lang="en">

   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--favicon-->
      <link type="image/png" href="{{ asset('backend/') }}/assets/images/favicon-32x32.png" rel="icon" />
      <!--plugins-->
      <link href="{{ asset('backend/') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
      <link href="{{ asset('backend/') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
      <link href="{{ asset('backend/') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
         rel="stylesheet" />
      <link href="{{ asset('backend/assets/plugins/tagify/tagify.css') }}" rel="stylesheet">
      <link href="{{ asset('backend/') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
      <link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
      <link href="{{ asset('backend/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css"
         rel="stylesheet" />
      <!-- loader-->
      <link href="{{ asset('backend/') }}/assets/css/pace.min.css" rel="stylesheet" />
      <script src="{{ asset('backend/') }}/assets/js/pace.min.js"></script>
      <!-- Bootstrap CSS -->
      <link href="{{ asset('backend/') }}/assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="{{ asset('backend/') }}/assets/css/bootstrap-extended.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      <link href="{{ asset('backend/') }}/assets/css/app.css" rel="stylesheet">
      <link href="{{ asset('backend/') }}/assets/css/icons.css" rel="stylesheet">
      <!-- Theme Style CSS -->
      <link href="{{ asset('backend/') }}/assets/css/dark-theme.css" rel="stylesheet" />
      <link href="{{ asset('backend/') }}/assets/css/semi-dark.css" rel="stylesheet" />
      <link href="{{ asset('backend/') }}/assets/css/header-colors.css" rel="stylesheet" />

      <link href="{{ asset('backend/') }}/assets/plugins/toaster/file.css" rel="stylesheet" />

      @stack('css')

      <title>Admin Dashboard</title>
   </head>

   <body>
      <!--wrapper-->
      <div class="wrapper">
         <!--sidebar wrapper -->
         @include('backend.admin.body.sidebar')
         <!--end sidebar wrapper -->
         <!--start header -->
         @include('backend.admin.body.header')
         <!--end header -->
         <!--start page wrapper -->
         <div class="page-wrapper">
            @yield('admin')
         </div>
         <!--end page wrapper -->
         <!--start overlay-->
         <div class="overlay toggle-icon"></div>
         <!--end overlay-->
         <!--Start Back To Top Button-->
         <a class="back-to-top" href="javaScript:;"><i class='bx bxs-up-arrow-alt'></i></a>
         <!--End Back To Top Button-->
         @include('backend.admin.body.footer')
      </div>
      <!--end wrapper-->

      <!-- search modal -->
      <div class="modal" id="SearchModal" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
            <div class="modal-content">
               <div class="modal-header gap-2">
                  <div class="position-relative popup-search w-100">
                     <input class="form-control form-control-lg border-3 border-primary border ps-5" type="search"
                        placeholder="Search">
                     <span class="position-absolute top-50 search-show translate-middle-y top-50 fs-4 start-0 ms-3"><i
                           class='bx bx-search'></i></span>
                  </div>
                  <button class="btn-close d-md-none" data-bs-dismiss="modal" type="button"
                     aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="search-list">
                     <p class="mb-1">Html Templates</p>
                     <div class="list-group">
                        <a class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
                     </div>
                     <p class="mb-1 mt-3">Web Designe Company</p>
                     <div class="list-group">
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-dropbox fs-4'></i>Html5 Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
                     </div>
                     <p class="mb-1 mt-3">Software Development</p>
                     <div class="list-group">
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
                     </div>
                     <p class="mb-1 mt-3">Online Shoping Portals</p>
                     <div class="list-group">
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
                        <a class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"
                           href="javascript:;"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end search modal -->

      <!-- Bootstrap JS -->
      <script src="{{ asset('backend/') }}/assets/js/bootstrap.bundle.min.js"></script>
      <!--plugins-->
      <script src="{{ asset('backend/') }}/assets/js/jquery.min.js"></script>
      <script src="{{ asset('backend/') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
      <script src="{{ asset('backend/') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
      <script src="{{ asset('backend/') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
      <script src="{{ asset('backend/') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
      <script src="{{ asset('backend/') }}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="{{ asset('backend/') }}/assets/plugins/chartjs/js/chart.js"></script>
      <script src="{{ asset('backend/') }}/assets/js/index.js"></script>
      <!--app JS-->
      <script src="{{ asset('backend/') }}/assets/js/app.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      {{-- Data Table Js Start --}}

      <script src="{{ asset('backend/') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
      <script src="{{ asset('backend/') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

      {{-- Input Tags Code --}}
      <script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
      <script src="{{ asset('backend/assets/plugins/tagify/tagify.js') }}"></script>
      <script>
         var tags = document.querySelector("#tags");

         // Initialize Tagify components on the above inputs
         new Tagify(tags);

         $(document).ready(function() {
            $('#desc').summernote({
               placeholder: 'Input Description',
               tabsize: 2,
               height: 300
            });
         });
      </script>

      <script>
         $(document).ready(function() {
            var table = $('#datatable').DataTable({
               lengthChange: false,
               lengthMenu: [10, 25, 50, 100],
               buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
         });

         $(function() {
            $(document).on('click', '#delete', function(e) {
               e.preventDefault();
               var link = $(this).attr("href");
               Swal.fire({
                  title: 'Are you sure?',
                  text: "Delete This Data?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                  if (result.isConfirmed) {
                     window.location.href = link;
                  }
               });
            });

            // Confirm
            $(document).on('click', '#confirm', function(e) {
               e.preventDefault();
               var link = $(this).attr("href");
               Swal.fire({
                  title: 'Are you sure?',
                  text: "Confirm This Data?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Confirm it!'
               }).then((result) => {
                  if (result.isConfirmed) {
                     window.location.href = link;
                     Swal.fire(
                        'Confirm!',
                        'Your file has been Confirm.',
                        'success'
                     );
                  }
               });
            });
         });
      </script>
      {{-- Data Table End --}}

      <script>
         @if (session('update'))
            var toast = @json(session('update'));
            toastr.options = {
               closeButton: true,
               closeDuration: 200,
               progressBar: true,
               showMethod: 'slideDown',
               hideMethod: 'slideUp',
               background: 'linear-gradient(to right, #ff7e5f, #feb47b)',
            };
            toastr[toast.type](toast.message);

            Swal.fire({
               icon: toast.type, // Use the toast type as the Swal icon
               title: toast.type.charAt(0).toUpperCase() + toast.type.slice(1) +
                  '!', // Capitalize the toast type for the title
               text: toast.message,
               timer: 5000, // Adjust the timer as needed
               showConfirmButton: true, // Hide the confirm button
            });
         @endif
      </script>

      @stack('scripts')

   </body>

</html>
