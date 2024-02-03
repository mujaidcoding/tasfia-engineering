@extends('backend.app')

@section('admin')
   <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Change Password</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Change Password</li>
               </ol>
            </nav>
         </div>

      </div>
      <!--end breadcrumb-->
      <div class="container">
         <div class="main-body">
            <div class="row">
               <div class="col-lg-4">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                           <img class="rounded-circle bg-primary p-1"
                              src="{{ $profileData->photo && file_exists(public_path($profileData->photo)) ? asset($profileData->photo) : asset('backend/assets/images/icons/user.png') }}"
                              alt="Admin" width="110">

                           <div class="mt-3">
                              <h4>{{ $profileData->name }}</h4>
                              <p class="btn btn-warning mb-1"> <i class="bx bx-crown align-middle"></i>
                                 {{ $profileData->role }}
                              </p>
                              <br>
                              <a class="btn btn-danger mt-2 px-5" id="delete"
                                 href="{{ route('user.profile.delete', ['id' => Auth::user()->id]) }}">Delete Profile
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8">
                  <div class="card">

                     <form class="row g-3 needs-validation" novalidate method="post"
                        action="{{ route('user.password.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="form-label mb-0">Current Password</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <input
                                    class="form-control @error('old_password')
                                    is-invalid
                                 @enderror"
                                    id="old_password" name="old_password" type="password" value="{{ old('old_password') }}"
                                    placeholder="Current Password" />
                                 @error('old_password')
                                    <span class="text-danger">
                                       {{ $message }}
                                    </span>
                                 @enderror
                              </div>

                           </div>
                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="form-label mb-0">New Password</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <input class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                                    name="new_password" type="password" value="{{ old('new_password') }}"
                                    placeholder="New Password" />

                                 @error('new_password')
                                    <span class="text-danger">
                                       {{ $message }}
                                    </span>
                                 @enderror
                              </div>

                           </div>
                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="form-label mb-0">Confirm Password</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <input class="form-control" id="new_password_confirmation"
                                    name="new_password_confirmation" type="password" placeholder="Confirm Password" />
                              </div>

                           </div>

                           <div class="row">
                              <div class="col-sm-3"></div>
                              <div class="col-sm-9 text-secondary">
                                 <input class="btn btn-primary px-4" type="submit" value="Save Changes" />
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
