@extends('backend.app')

@section('admin')

   @if ($action === 'create')
      <div class="main-content" id="content">
         <div class="container">
            <div class="container">
               <!-- BREADCRUMB -->
               <div class="page-meta">
                  <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href>Users</a></li>
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
                                    style="padding: 10px; margin-left:27px; margin-top: 15px;">
                                    <a class="btn btn-primary" href="{{ route('admin.users.index') }}">Show Users</a>
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

                           <form class="row g-3 needs-validation" style="padding: 30px"
                              action="{{ route('admin.users.store') }}" method="post" novalidate
                              enctype="multipart/form-data">
                              @csrf

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input class="form-control mb-3" id="name" name="name" type="text"
                                       value="{{ old('name') }}" placeholder="Full Name" required autofocus
                                       autocomplete="name">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="col-md-6 position-relative">
                                    <label class="form-label" for="validationTooltip03">Role: </label>
                                    <select class="form-control" name="roles[]" required>
                                       <option value="" disabled selected>Select Right Role</option>
                                       @foreach ($roles as $role)
                                          @if ($role->name !== 'super-admin')
                                             {{-- Exclude super-admin role --}}
                                             <option value="{{ $role->id }}">{{ $role->name }}</option>
                                          @endif
                                       @endforeach
                                    </select>
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control mb-3" id="email" name="email" type="text"
                                       type="email" value="{{ old('email') }}" placeholder="Write your email here"
                                       required autocomplete="username">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="mb-3">
                                       <label for="image">Upload Image(40*40)</label>
                                       <input class="form-control file-upload-input" id="formFile" name="image"
                                          type="file" placeholder="Image" autocomplete="image">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input class="form-control mb-3" id="password" name="password" type="password"
                                       autocomplete="new-password" required>
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input class="form-control mb-3" id="password_confirmation"
                                       name="password_confirmation" type="password" autocomplete="new-password" required>
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
   @endif

   @if ($action === 'edit')

      <div class="main-content" id="content">
         <div class="container">
            <div class="container">
               <!-- BREADCRUMB -->
               <div class="page-meta">
                  <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href>Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                    style="padding: 10px; margin-left:27px; margin-top: 15px;">
                                    <a class="btn btn-primary" href="{{ route('admin.users.index') }}">Show Users</a>
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

                           <div class="col-md-6" style="padding: 30px ">
                              <div class="form-group">
                                 <label for="password">Status: </label>
                                 <span class="switch form-switch-custom switch-inline form-switch-success">
                                    <input class="switch-input float-none" id="form-custom-switch-{{ $user->id }}"
                                       name="is_active" type="checkbox" role="switch"
                                       {{ $user->is_active ? 'checked' : '' }}
                                       onchange="toggleUserStatus('{{ $user->id }}')">
                                 </span>
                              </div>
                           </div>

                           <form class="row g-3 needs-validation" style="padding: 30px"
                              action="{{ route('admin.users.update', $user->id) }}" method="post" novalidate
                              enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input class="form-control mb-3" id="name" name="name" type="text"
                                       value="{{ old('name', $user->name) }}" placeholder="Full Name" required autofocus
                                       autocomplete="name">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="col-md-6 position-relative">
                                    <label class="form-label" for="validationTooltip03">Role: </label>
                                    <select class="form-control" name="roles[]" required>
                                       <option value="" disabled selected>Select Right Role</option>
                                       @foreach ($roles as $roleId => $roleName)
                                          @if ($roleName !== 'super-admin')
                                             <option value="{{ $roleId }}"
                                                @if (in_array($roleId, $userRoles)) selected @endif>{{ $roleName }}
                                             </option>
                                          @endif
                                       @endforeach
                                    </select>
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control mb-3" id="email" name="email" type="text"
                                       type="email" value="{{ old('email', $user->email) }}"
                                       placeholder="Write your email here" required autocomplete="username">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="mb-3">
                                       <label for="image">Upload Image(40*40)</label>
                                       <input class="form-control file-upload-input" id="formFile" name="image"
                                          type="file" placeholder="Image" autocomplete="image">
                                    </div>
                                 </div>
                                 <span>
                                    @if ($user->image && file_exists($user->image))
                                       <img class="profile-img" src="{{ asset($user->image) }}"
                                          alt="{{ $user->image }}"
                                          style="height: 100px; width: 100px; border-radius:50%;">
                                    @endif
                                 </span>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input class="form-control mb-3" id="password" name="password" type="password"
                                       autocomplete="new_password">
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input class="form-control mb-3" id="password_confirmation"
                                       name="password_confirmation" type="password" autocomplete="new-password">
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
   @endif

   @if ($action === 'index')
      <!--  BEGIN CONTENT AREA  -->
      <div class="main-content" id="content">
         <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

               <!-- BREADCRUMB -->
               <div class="page-meta" style="margin: 20px 0px 20px 0px;">
                  <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href>Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
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

               <div class="row layout-spacing">
                  <div class="col-lg-12">
                     <div class="statbox widget box box-shadow">

                        <div class="widget-content widget-content-area">

                           <div class="widget-header">
                              <div class="row">
                                 @can('user-create')
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12"
                                       style="padding: 10px; margin-left:35px; margin-top:30px;">
                                       <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Create User</a>
                                    </div>
                                 @endcan

                              </div>
                           </div>

                           <table class="style-3 dt-table-hover table" id="style-3">
                              <thead>
                                 <tr>
                                    <th class="checkbox-column text-center"> Record Id </th>
                                    <th class="text-center"> Image </th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th class="dt-no-sorting text-center">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($users as $user)
                                    @if (!$user->hasRole('super-admin'))
                                       <tr>
                                          <td class="checkbox-column text-center">{{ $loop->index + 1 }}</td>
                                          <td class="text-center">
                                             <span>
                                                @if ($user->image && file_exists($user->image))
                                                   <img class="profile-img" src="{{ asset($user->image) }}"
                                                      alt="{{ $user->image }}">
                                                @endif
                                             </span>
                                          </td>
                                          <td>
                                             @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                   <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                             @endif
                                          </td>
                                          <td>{{ $user->name }}</td>
                                          <td>{{ $user->email }}</td>
                                          <td>
                                             <div class="switch form-switch-custom switch-inline form-switch-success">
                                                <input class="switch-input" id="form-custom-switch-{{ $user->id }}"
                                                   name="is_active" type="checkbox" role="switch"
                                                   {{ $user->is_active ? 'checked' : '' }}
                                                   onchange="toggleUserStatus('{{ $user->id }}')">
                                             </div>
                                          </td>
                                          <td class="text-center">
                                             <ul class="table-controls">
                                                @can('user-show')
                                                   <li>
                                                      <a class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                                         data-placement="top"
                                                         href="{{ route('admin.users.show', $user->id) }}" title="View">
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

                                                @can('user-edit')
                                                   <li>
                                                      <a class="bs-tooltip" data-bs-toggle="tooltip"
                                                         data-bs-placement="top" data-original-title="Edit"
                                                         href="{{ route('admin.users.edit', $user->id) }}" title="Edit">
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

                                                @can('user-delete')
                                                   <li>
                                                      <a class="bs-tooltip" data-bs-toggle="tooltip"
                                                         data-bs-placement="top" data-original-title="Delete"
                                                         title="Delete"
                                                         onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this User?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }">
                                                         <svg class="feather feather-trash br-8 mb-1 p-1"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                               d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                         </svg>
                                                      </a>

                                                      <form id="delete-form-{{ $user->id }}" style="display: none;"
                                                         action="{{ route('admin.users.destroy', $user->id) }}"
                                                         method="POST">
                                                         @csrf
                                                         @method('delete')
                                                      </form>
                                                   </li>
                                                @endcan
                                             </ul>

                                          </td>
                                       </tr>
                                    @endif
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>

            </div>

         </div>
      </div>
      <!--  END CONTENT AREA  -->

   @endif

   @if ($action === 'show')

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
                                    style="padding: 10px; margin-left:35px; margin-top: 20px;">
                                    <a class="btn btn-primary" href="{{ route('admin.users.index') }}">Show Users</a>
                                 </div>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <label class="form-label ml-10">Name: <span
                                       class="text-secondary">{{ $user->name }}</span></label>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <label class="form-label ml-10">Email: <span
                                       class="text-secondary">{{ $user->email }}</span></label>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="ml-10" for="password">Status: </label>
                                    <span class="switch form-switch-custom switch-inline form-switch-success">
                                       <input class="switch-input float-none"
                                          id="form-custom-switch-{{ $user->id }}" name="is_active" type="checkbox"
                                          role="switch" {{ $user->is_active ? 'checked' : '' }}
                                          onchange="toggleUserStatus('{{ $user->id }}')">
                                    </span>
                                 </div>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <label class="form-label ml-10">Role: </label>
                                 @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                       <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                 @endif
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

      {{--
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if (!empty($user->getRoleNames()))
                @foreach ($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>  --}}
   @endif

@endsection
