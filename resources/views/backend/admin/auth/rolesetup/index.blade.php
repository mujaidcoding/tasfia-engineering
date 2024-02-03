@extends('backend.app')

@section('admin')
   @if ($action === 'create')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

      <style>
         .form-check-label {
            text-transform: capitalize;
         }
      </style>

      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Add Role in Permission</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Add Permission</h5>
               <form class="row g-3" id="myForm" action="{{ route('store.roles.permission') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1"> Roles Name</label>
                     <select class="@error('role_id') is-invalid @enderror form-select mb-3" name="role_id"
                        aria-label="Default select example">
                        <option selected disabled>Open Roles</option>
                        @foreach ($roles as $role)
                           <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                              {{ $role->name }}</option>
                        @endforeach
                     </select>
                     @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>

                  <div class="form-check form-switch form-check-success">
                     <input class="form-check-input @error('allCheck') is-invalid @enderror" id="allCheck" name="allCheck"
                        type="checkbox" role="switch">
                     <label class="form-check-label" for="allCheck">Permission All</label>
                     @error('allCheck')
                        <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>

                  <hr>

                  @foreach ($permission_groups as $group)
                     <div class="row">
                        <div class="col-3">
                           <div class="form-check form-switch form-check-success">
                              <input class="form-check-input @error('flexSwitchCheckSuccess') is-invalid @enderror"
                                 id="flexSwitchCheckSuccess" name="flexSwitchCheckSuccess" type="checkbox" role="switch">
                              <label class="form-check-label" for="flexSwitchCheckSuccess">{{ $group->group_name }}</label>
                              @error('flexSwitchCheckSuccess')
                                 <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>

                        <div class="col-9">
                           @php
                              $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                           @endphp
                           @foreach ($permissions as $permission)
                              <div class="form-check form-switch form-check-success">
                                 <input class="form-check-input @error('permission') is-invalid @enderror"
                                    id="SwitchCheckSuccess{{ $permission->id }}" name="permission[]" type="checkbox"
                                    value="{{ $permission->id }}" role="switch">
                                 <label class="form-check-label"
                                    for="SwitchCheckSuccess{{ $permission->id }}">{{ $permission->name }}</label>
                              </div>
                           @endforeach
                           @error('permission')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <br>
                        </div>
                     </div>
                  @endforeach

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


         $('#allCheck').click(function() {
            if ($(this).is(':checked')) {
               $('input[type=checkbox]').prop('checked', true)
            } else {
               $('input[type=checkbox]').prop('checked', false)
            }
         })
      </script>
   @endif

   @if ($action === 'edit')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

      <style>
         .form-check-label {
            text-transform: capitalize;
         }
      </style>

      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Edit Role in Permission</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Edit Roles Permission</h5>
               <form class="row g-3" id="myForm" action="{{ route('update.roles.permission') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <input name="id" type="hidden" value="{{ $role->id }}">

                  <div class="form-group col-md-6">
                     <label class="form-label" for="input1"> Roles Name</label>
                     <h4>{{ $role->name }}</h4>
                  </div>

                  <div class="form-check form-switch form-check-success">
                     <input class="form-check-input" id="allCheck" type="checkbox" role="switch">
                     <label class="form-check-label" for="allCheck">Permission All</label>
                  </div>

                  <hr>

                  @foreach ($permission_groups as $group)
                     <div class="row">
                        <div class="col-3">

                           @php
                              $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                           @endphp

                           <div class="form-check form-switch form-check-success">
                              <input class="form-check-input" id="flexSwitchCheckSuccess" type="checkbox" role="switch"
                                 {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                              <label class="form-check-label"
                                 for="flexSwitchCheckSuccess">{{ $group->group_name }}</label>
                           </div>
                        </div>

                        <div class="col-9">

                           @foreach ($permissions as $permission)
                              <div class="form-check form-switch form-check-success">
                                 <input class="form-check-input" id="SwitchCheckSuccess{{ $permission->id }}"
                                    name="permission[]" type="checkbox" value="{{ $permission->id }}" role="switch"
                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                 <label class="form-check-label"
                                    for="SwitchCheckSuccess{{ $permission->id }}">{{ $permission->name }}</label>
                              </div>
                           @endforeach
                           <br>

                        </div>
                     </div>
                  @endforeach

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


         $('#allCheck').click(function() {
            if ($(this).is(':checked')) {
               $('input[type=checkbox]').prop('checked', true)
            } else {
               $('input[type=checkbox]').prop('checked', false)
            }
         })
      </script>
   @endif

   @if ($action === 'index')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Roles Assign Tables</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Roles ins Permission</li>
                  </ol>
               </nav>
            </div>
            <div class="ms-auto">
               <div class="btn-group">
                  <a class="btn btn-primary px-5" href="{{ route('add.roles.permission') }}">Assign Permission in
                     Role</a>
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
                           <th>Permission</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($roles as $key => $item)
                           <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $item->name }}</td>
                              <td>
                                 @if ($item->name === 'super-admin')
                                    <span class="badge bg-danger">Has all Permission</span>
                                 @else
                                    @foreach ($item->permissions as $permission)
                                       <span class="badge bg-danger">{{ $permission->name }}</span>
                                    @endforeach
                                 @endif
                              </td>
                              <td>
                                 @if ($item->name !== 'super-admin')
                                    <a class="btn btn-info px-5"
                                       href="{{ route('edit.roles.permission', $item->id) }}">Edit</a>
                                    <a class="btn btn-danger px-5" id="delete"
                                       href="{{ route('delete.roles.permission', $item->id) }}">Delete</a>
                                 @endif
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
