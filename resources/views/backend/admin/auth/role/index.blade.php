@extends('backend.app')

@section('admin')

   @if ($action === 'index')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Roles</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Roles</li>
                  </ol>
               </nav>
            </div>
            <div class="ms-auto">
               <div class="btn-group">
                  <a class="btn btn-primary px-5" href="{{ route('add.role') }}">Add Role</a>
               </div>
            </div>
         </div>
         <!--end breadcrumb-->

         <hr />
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table-striped table-bordered table text-center" id="datatable" style="width: 100%">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Roles Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($roles as $key => $item)
                           <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $item->name }}</td>
                              <td>
                                 <a class="btn btn-info px-5" href="{{ route('edit.role', $item->id) }}">Edit </a>
                                 <a class="btn btn-danger px-5" id="delete"
                                    href="{{ route('delete.role', $item->id) }}">Delete </a>
                              </td>
                           </tr>
                        @endforeach

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   @endif

   @if ($action === 'create')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Add Role</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Add Role</h5>
               <form class="row g-3" id="myForm" action="{{ route('store.role') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Role Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text" value="{{ old('name') }}">
                     @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>

                  <div class="col-md-12">
                     <div class="d-md-flex d-grid align-items-center gap-3">
                        <button class="btn btn-primary px-4" type="submit">Save Changes</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>

      </div>

      <script type="text/javascript">
         $(document).ready(function() {
            $('#myForm').validate({
               rules: {
                  name: {
                     required: true,
                  },

               },
               messages: {
                  name: {
                     required: 'Please Enter SubCategory Name',
                  },

               },
               errorElement: 'span',
               errorPlacement: function(error, element) {
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
               },
               highlight: function(element, errorClass, validClass) {
                  $(element).addClass('is-invalid');
               },
               unhighlight: function(element, errorClass, validClass) {
                  $(element).removeClass('is-invalid');
               },
            });
         });
      </script>
   @endif

   @if ($action === 'edit')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Edit Role</h5>
               <form class="row g-3" id="myForm" action="{{ route('update.role') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <input name="id" type="hidden" value="{{ $role->id }}">

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Role Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text" value="{{ $role->name }}">
                     @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>

                  <div class="col-md-12">
                     <div class="d-md-flex d-grid align-items-center gap-3">
                        <button class="btn btn-primary px-4" type="submit">Save Changes</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>

      </div>

      <script type="text/javascript">
         $(document).ready(function() {
            $('#myForm').validate({
               rules: {
                  name: {
                     required: true,
                  },

               },
               messages: {
                  name: {
                     required: 'Please Enter SubCategory Name',
                  },

               },
               errorElement: 'span',
               errorPlacement: function(error, element) {
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
               },
               highlight: function(element, errorClass, validClass) {
                  $(element).addClass('is-invalid');
               },
               unhighlight: function(element, errorClass, validClass) {
                  $(element).removeClass('is-invalid');
               },
            });
         });
      </script>
   @endif

@endsection
