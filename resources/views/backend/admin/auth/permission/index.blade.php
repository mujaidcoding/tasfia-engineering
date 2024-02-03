@extends('backend.app')

@section('admin')

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
                     <li class="breadcrumb-item active" aria-current="page">Add Permission</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Add Permission</h5>
               <form class="row g-3" id="myForm" action="{{ route('store.permission') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Permission Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text">
                     @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1"> Group Name</label>
                     <select class="@error('group_name') is-invalid @enderror form-select mb-3" name="group_name"
                        aria-label="Default select example">
                        <option selected disabled>Open this select menu</option>
                        <option value="All User">All User</option>
                        <option value="Role and Permission">Role & Permission</option>
                     </select>
                     @error('group_name')
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
                  group_name: {
                     required: true,
                  },

               },
               messages: {
                  name: {
                     required: 'Please Enter SubCategory Name',
                  },
                  group_name: {
                     required: 'Please Select Category Name',
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
                     <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Edit Permission</h5>
               <form class="row g-3" id="myForm" action="{{ route('update.permission') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <input name="id" type="hidden" value="{{ $permission->id }}">

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Permission Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text" value="{{ old('name', $permission->name) }}">
                     @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Group Name</label>
                     <select class="@error('group_name') is-invalid @enderror form-select mb-3" name="group_name"
                        aria-label="Default select example">
                        <option selected disabled>Open this select menu</option>
                        <option value="All User"
                           {{ old('group_name', $permission->group_name) == 'All User' ? 'selected' : '' }}>All User
                        </option>
                        <option value="Role and Permission"
                           {{ old('group_name', $permission->group_name) == 'Role and Permission' ? 'selected' : '' }}>Role
                           & Permission</option>
                     </select>
                     @error('group_name')
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
                  group_name: {
                     required: true,
                  },

               },
               messages: {
                  name: {
                     required: 'Please Enter SubCategory Name',
                  },
                  group_name: {
                     required: 'Please Select Category Name',
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

   @if ($action === 'show')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Permission</li>
                  </ol>
               </nav>
            </div>
            <div class="ms-auto">
               <div class="btn-group">
                  <a class="btn btn-primary px-5" href="{{ route('add.permission') }}">Add Permission</a>
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
                           <th>Permission Name</th>
                           <th>Group Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($permissions as $key => $item)
                           <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->group_name }}</td>
                              <td>
                                 <a class="btn btn-info px-5" href="{{ route('edit.permission', $item->id) }}">Edit </a>
                                 <a class="btn btn-danger px-5" id="delete"
                                    href="{{ route('delete.permission', $item->id) }}">Delete </a>
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
@endsection
