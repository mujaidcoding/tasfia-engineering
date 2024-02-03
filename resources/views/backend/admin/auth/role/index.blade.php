@extends('backend.app')

@section('admin')
   {{-- -- @if ($action === 'create')
      <div class="main-content" id="content">
         <div class="container">
            <div class="container">
               <!-- BREADCRUMB -->
               <div class="page-meta">
                  <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href>Roles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                     </ol>
                  </nav>
               </div>
               <!-- /BREADCRUMB -->

               <div class="row">
                  <div class="col-lg-12 layout-spacing col-md-12" id="tooltips">
                     <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">

                           <div class="widget-header">
                              <div class="row">
                                 <div class="col-xl-12 col-md-12 col-sm-12 col-12"
                                    style="padding: 10px; margin-left:27px;">
                                    <a class="btn btn-primary" href="{{ route('admin.roles.index') }}">Show Roles</a>
                                 </div>
                              </div>
                           </div>

                           @if ($errors->any())
                              <div class="alert alert-danger">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                              </div>
                           @endif

                           @if (session('success'))
                              <div class="alert alert-success">
                                 {{ session('success') }}
                              </div>
                           @endif

                           @if (session('warning'))
                              <div class="alert alert-warning">
                                 {{ session('warning') }}
                              </div>
                           @endif

                           @if (session('error'))
                              <div class="alert alert-danger">
                                 {{ session('error') }}
                              </div>
                           @endif

                           <form class="row g-3 needs-validation" style="padding: 30px 0px 30px 30px"
                              action="{{ route('admin.roles.store') }}" method="post" novalidate
                              enctype="multipart/form-data">
                              @csrf
                              <div class="row mb-6">
                                 <div class="col-md-6 position-relative">
                                    <label class="form-label" for="validationTooltip03">Role Name: </label>
                                    <input class="form-control" id="validationTooltip03" name="name" type="text"
                                       placeholder="admin, writter, manager" required>
                                 </div>
                              </div>

                              <div class="row mb-6">
                                 <div class="col-md-6 position-relative">
                                    <label class="form-label" for="validationTooltip03">Designation Name: </label>
                                    <div class="w-fit grid-cols-4 justify-between gap-2">
                                       @foreach ($permission as $index => $value)
                                          <span class="badge badge-light-success mt-1 w-fit">
                                             <input class="form-check-input" id="form-check-success" name="permission[]"
                                                type="checkbox" value="{{ $value->id }}">
                                             {{ $value->name }}
                                          </span>
                                          @if (($index + 1) % 4 === 0)
                                             <div></div>
                                          @endif
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                 <button class="btn btn-success" type="submit">
                                    <span class="btn-text-inner">Submit</span>
                                 </button>
                              </div>
                           </form>

                           {{--  <form action="{{ route('admin.roles.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                <input type="text" name="name" placeholder="Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Permission:</strong>
                                                <br/>
                                                @foreach ($permission as $value)
                                                    <label>
                                                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                                        {{ $value->name }}
                                                    </label>
                                                    <br/>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="text-center col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>

                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>

   @endif --}}
   {{--
   @if ($action === 'edit')
      <div class="main-content" id="content">
         <div class="container">
            <div class="container">
               <!-- BREADCRUMB -->
               <div class="page-meta" style="margin: 20px 0px 20px 0px;">
                  <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href>Role</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                     </ol>
                  </nav>

                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif

                  @if (session('success'))
                     <div class="alert alert-success">
                        {{ session('success') }}
                     </div>
                  @endif

                  @if (session('warning'))
                     <div class="alert alert-warning">
                        {{ session('warning') }}
                     </div>
                  @endif

                  @if (session('error'))
                     <div class="alert alert-danger">
                        {{ session('error') }}
                     </div>
                  @endif
               </div>
               <!-- /BREADCRUMB -->

               <div class="row">
                  <div class="col-lg-12 layout-spacing col-md-12" id="tooltips">
                     <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">

                           <div class="widget-header">
                              <div class="row">
                                 <div class="col-xl-12 col-md-12 col-sm-12 col-12"
                                    style="padding: 10px; margin-left:35px; margin-top: 30px;">
                                    <a class="btn btn-primary" href="{{ route('admin.roles.index') }}">Show Roles</a>
                                 </div>
                              </div>
                           </div>

                           <form class="row g-3 needs-validation" style="padding: 30px 0px 30px 30px"
                              action="{{ route('admin.roles.update', $role) }}" method="post" novalidate
                              enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              <div class="row mb-6">
                                 <div class="col-md-6 position-relative">
                                    <label class="form-label" for="validationTooltip03">Designation Name: </label>
                                    <input class="form-control" id="validationTooltip03" name="name" type="text"
                                       value="{{ $role->name }}" placeholder="admin, manager" required>
                                 </div>
                              </div>

                              <div class="row mb-6">
                                 <div class="col-md-6 position-relative">
                                    <label class="form-label" for="validationTooltip03">Permissions: </label>

                                    <div class="w-fit grid-cols-4 justify-between gap-1">
                                       @foreach ($permission as $index => $value)
                                          <span class="badge badge-light-success mt-1 w-fit">
                                             <input class="form-check-input" id="form-check-success" name="permission[]"
                                                type="checkbox" value="{{ $value->id }}"
                                                @if (in_array($value->id, $rolePermissions)) checked @endif>
                                             {{ $value->name }}
                                          </span>
                                          @if (($index + 1) % 4 === 0)
                                             <div></div>
                                          @endif
                                       @endforeach
                                    </div>
                                 </div>
                              </div>

                              <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                 <button class="btn btn-success" type="submit">
                                    <span class="btn-text-inner">Submit</span>
                                 </button>
                              </div>
                           </form>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      </div>
   @endif
   --}}

   {{--   @if ($action === 'index')
      <!--  BEGIN CONTENT AREA  -->
      <div class="main-content" id="content">
         <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

               <!-- BREADCRUMB -->
               <div class="page-meta">
                  <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href>Role</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                     </ol>
                  </nav>
               </div>
               <!-- /BREADCRUMB -->

               <div class="row layout-spacing">
                  <div class="col-lg-12">
                     <div class="statbox widget box box-shadow">

                        @if (session('success'))
                           <div class="alert alert-success">
                              {{ session('success') }}
                           </div>
                        @endif

                        @if (session('warning'))
                           <div class="alert alert-warning">
                              {{ session('warning') }}
                           </div>
                        @endif

                        @if (session('error'))
                           <div class="alert alert-danger">
                              {{ session('error') }}
                           </div>
                        @endif

                        <div class="widget-content widget-content-area">

                           <div class="widget-header">
                              <div class="row">
                                 @can('role-create')
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12"
                                       style="padding: 10px; margin-left:27px;">
                                       <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">Create Roles</a>
                                    </div>
                                 @endcan

                              </div>
                           </div>

                           <table class="style-3 dt-table-hover table" id="style-3">
                              <thead>
                                 <tr>
                                    <th class="checkbox-column text-center"> Record Id </th>
                                    <th>Role Name</th>
                                    <th>Permissions</th>
                                    <th class="dt-no-sorting text-center">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($roles as $key => $role)
                                    <tr>
                                       <td class="checkbox-column text-center">{{ $loop->index + 1 }}</td>
                                       <td>{{ $role->name }}</td>
                                       <td>
                                          <div class="ml-10 w-fit grid-cols-4 justify-between gap-2">

                                             @if ($role->name === 'super-admin' && Auth::user()->is_active === 1)
                                                <span class="badge badge-light-success mt-1 w-fit">Has All
                                                   Permissions</span>
                                             @else
                                                @foreach ($role->permissions as $index => $role_permission)
                                                   <span
                                                      class="badge badge-light-success mt-1 w-fit">{{ $role_permission->name }}</span>
                                                   @if (($index + 1) % 3 === 0)
                                                      <div></div>
                                                      <!-- Empty div to create a new line after every 3 elements -->
                                                   @endif
                                                @endforeach
                                             @endif
                                          </div>
                                       </td>
                                       <td class="text-center">
                                          @if (Auth::user()->hasRole('super-admin') && $role->name == 'super-admin')
                                             <ul class="table-controls" style="display: none">
                                             </ul>
                                          @else
                                             <ul class="table-controls">
                                                @can('role-show')
                                                   <li>
                                                      <a class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                                         data-placement="top"
                                                         href="{{ route('admin.roles.show', $role->id) }}" title="View">
                                                         <svg class="feather feather-eye" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                         </svg>
                                                      </a>
                                                   </li>
                                                @endcan

                                                @can('role-edit')
                                                   <li>
                                                      <a class="bs-tooltip" data-bs-toggle="tooltip"
                                                         data-bs-placement="top" data-original-title="Edit"
                                                         href="{{ route('admin.roles.edit', $role->id) }}" title="Edit">
                                                         <svg class="feather feather-edit-2 br-8 mb-1 p-1"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                         </svg>
                                                      </a>
                                                   </li>
                                                @endcan
                                                @can('role-delete')
                                                   <li>
                                                      <a class="action-btn btn-delete bs-tooltip" data-toggle="tooltip"
                                                         data-placement="top" title="Delete"
                                                         onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this Role?')) { document.getElementById('delete-form-{{ $role->id }}').submit(); }">
                                                         <svg class="feather feather-trash-2"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                               d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10"
                                                               y2="17"></line>
                                                            <line x1="14" y1="11" x2="14"
                                                               y2="17"></line>
                                                         </svg>
                                                      </a>
                                                      <form id="delete-form-{{ $role->id }}" style="display: none;"
                                                         action="{{ route('admin.roles.destroy', $role->id) }}"
                                                         method="POST">
                                                         @csrf
                                                         @method('delete')
                                                      </form>
                                                   </li>
                                                @endcan
                                             </ul>
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

            </div>

         </div>

         <!--  END CONTENT AREA  -->
      </div>
   @endif --}}
   {{--
   @if ($action === 'show')

      {{-- <div class="main-content" id="content">
         <div class="container">
            <div class="container">
               <!-- BREADCRUMB -->
               <div class="page-meta" style="margin: 20px 0px 20px 0px;">
                  <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href>Role</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                     </ol>
                  </nav>

                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif

                  @if (session('success'))
                     <div class="alert alert-success">
                        {{ session('success') }}
                     </div>
                  @endif

                  @if (session('warning'))
                     <div class="alert alert-warning">
                        {{ session('warning') }}
                     </div>
                  @endif

                  @if (session('error'))
                     <div class="alert alert-danger">
                        {{ session('error') }}
                     </div>
                  @endif
               </div>
               <!-- /BREADCRUMB -->

               <div class="row">
                  <div class="col-lg-12 layout-spacing col-md-12" id="tooltips">
                     <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">

                           <div class="widget-header">
                              <div class="row">
                                 <div class="col-xl-12 col-md-12 col-sm-12 col-12"
                                    style="padding: 10px; margin-left:35px; margin-top: 20px;">
                                    <a class="btn btn-primary" href="{{ route('admin.roles.index') }}">Show Roles</a>
                                 </div>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <label class="form-label ml-10">Role Name: <span
                                       class="text-secondary">{{ $role->name }}</span></label>

                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <label class="form-label ml-10">Designation Name: </label>
                                 <div class="ml-10 w-fit grid-cols-4 justify-between gap-1">
                                    @foreach ($rolePermissions as $index => $permission)
                                       <span class="badge badge-light-success mt-1 w-fit">{{ $permission->name }}</span>
                                       @if (($index + 1) % 3 === 0)
                                          <div></div> <!-- Empty div to create a new line after every 3 elements -->
                                       @endif
                                    @endforeach
                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      </div>
   @endif --}}

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
