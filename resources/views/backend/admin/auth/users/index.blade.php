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
                     <li class="breadcrumb-item active" aria-current="page">Add User</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Add User</h5>
               <form class="row g-3" id="myForm" action="{{ route('store.user') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text" value="{{ old('name') }}">

                     @error('name')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Email</label>
                     <input class="form-control @error('email') is-invalid @enderror" id="input1" name="email"
                        type="text" value="{{ old('email') }}">

                     @error('email')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">New Password</label>
                     <input class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                        name="new_password" type="password" value="{{ old('new_password') }}" placeholder="New Password"
                        autocomplete="off" />

                     @error('new_password')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Confirm Password</label>
                     <input class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                        type="password" placeholder="Confirm Password" autocomplete="off" />
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Status</label>
                     <div class="form-check form-switch form-check-success">
                        <input class="form-check-input" id="flexSwitchCheckSuccess" type="checkbox" role="switch">
                        <!-- Hidden input to store the value -->
                        <input name="status" type="hidden" value="0">
                     </div>
                  </div>

                  <script>
                     $(document).ready(function() {
                        $('#flexSwitchCheckSuccess').change(function() {
                           // Update the value of the hidden input based on checkbox state
                           if ($(this).prop('checked')) {
                              $('input[name="status"]').val('1');
                           } else {
                              $('input[name="status"]').val('0');
                           }
                        });
                     });
                  </script>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1"> Role Name</label>
                     <select class="@error('role') is-invalid @enderror form-select mb-3" name="role"
                        aria-label="Default select example">
                        <option selected="" disabled>Select Role</option>
                        @foreach ($roles as $role)
                           <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                     </select>

                     @error('role')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
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
                     <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Edit User</h5>
               <form class="row g-3" id="myForm" action="{{ route('update.user') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <input name="id" type="hidden" value="{{ $user->id }}">

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Name</label>
                     <input class="form-control" id="input1" name="name" type="text"
                        value="{{ $user->name }}">
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Email</label>
                     <input class="form-control" id="input1" name="email" type="text"
                        value="{{ $user->email }}">
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">New Password</label>
                     <input class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                        name="new_password" type="password" value="{{ old('new_password') }}"
                        placeholder="New Password" autocomplete="off" />

                     @error('new_password')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Confirm Password</label>
                     <input class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                        type="password" placeholder="Confirm Password" autocomplete="off" />
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1">Status</label>
                     <div class="form-check form-switch form-check-success">
                        <input class="form-check-input" id="flexSwitchCheckSuccess" type="checkbox" role="switch"
                           {{ $user->status === 1 ? 'checked' : '' }}>
                        <!-- Hidden input to store the value -->
                        <input name="status" type="hidden" value="0">
                     </div>
                  </div>

                  <script>
                     $(document).ready(function() {
                        $('#flexSwitchCheckSuccess').change(function() {
                           // Update the value of the hidden input based on checkbox state
                           if ($(this).prop('checked')) {
                              $('input[name="status"]').val('1');
                           } else {
                              $('input[name="status"]').val('0');
                           }
                        });
                     });
                  </script>

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1"> Role Name</label>
                     <select class="form-select mb-3" name="role" aria-label="Default select example">
                        <option selected="" disabled>Select Role</option>
                        @foreach ($roles as $role)
                           <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                              {{ $role->name }}
                           </option>
                        @endforeach
                     </select>
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

   @if ($action === 'index')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Users Data</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Users</li>
                  </ol>
               </nav>
            </div>
            <div class="ms-auto">
               <div class="btn-group">
                  <a class="btn btn-primary px-5" href="{{ route('add.user') }}">Add User</a>
               </div>
            </div>
         </div>
         <!--end breadcrumb-->
         <hr />
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table-striped table-bordered table" id="datatable">
                     <thead>
                        <tr>
                           <th>Sl</th>
                           <th>Image</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Status</th>
                           <th>Active</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $key => $item)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td><img
                                    src=" {{ !empty($item->photo) ? $item->photo : asset('backend/assets/images/icons/user.png') }}"
                                    alt="" height="50px" width="50px"></td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->email }}</td>
                              <td>
                                 @foreach ($item->roles as $role)
                                    <span class="badge badge-pill bg-primary">{{ $role->name }}</span>
                                 @endforeach

                                 @if ($item->roles->isEmpty())
                                    <!-- Show default role if the user doesn't have any assigned roles -->
                                    <span class="badge badge-pill bg-dark">{{ $item->role }}</span>
                                 @endif

                              </td>
                              <td>
                                 <form id="updateStatusForm_{{ $item->id }}"
                                    action="{{ route('update.user.status', $item->id) }}" method="post">
                                    @csrf
                                    <input name="id" type="hidden" value="{{ $item->id }}">
                                    <div class="form-check form-switch form-check-success status">
                                       <input class="form-check-input update-status-checkbox"
                                          id="updatestatus_{{ $item->id }}" data-user-id="{{ $item->id }}"
                                          type="checkbox" role="switch" {{ $item->status === 1 ? 'checked' : '' }}>
                                    </div>
                                 </form>
                              </td>
                              <td>
                                 @if ($item->UserOnline())
                                    <span class="badge badge-pill bg-success">Active Now</span>
                                 @else
                                    <span
                                       class="badge badge-pill bg-danger">{{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</span>
                                 @endif
                              </td>
                              <td>
                                 <a class="btn btn-info px-5" href="{{ route('edit.user', $item->id) }}">Edit </a>
                                 <a class="btn btn-danger px-5" id="delete"
                                    href="{{ route('delete.user', $item->id) }}">Delete </a>
                              </td>
                           </tr>
                        @endforeach

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>

      @push('scripts')
         <script>
            $(document).ready(function() {
               $('.status').change(function() {
                  var form = $(this).closest('form');
                  form.submit();
               });
            });
         </script>
      @endpush
   @endif

@endsection
