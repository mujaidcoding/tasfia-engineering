@extends('backend.admin.admin_dashboard')

@section('admin')
   <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">User Profile</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                              src="{{ $profileData->photo && file_exists(public_path($profileData->photo)) ? asset($profileData->photo) : asset('frontend/no_image.jpg') }}"
                              alt="Admin" width="110">

                           <div class="mt-3">
                              <h4>{{ $profileData->name }}</h4>
                              <p class="btn btn-warning mb-1"> <i class="bx bx-crown align-middle"></i>
                                 {{ $profileData->role }}
                              </p>
                              <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                              <button class="btn btn-primary">Follow</button>
                              <button class="btn btn-outline-primary">Message</button>
                           </div>
                        </div>
                        <hr class="my-4" />
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                              <h6 class="mb-0"><svg class="feather feather-globe icon-inline me-2"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                       d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                 </svg>Website</h6>
                              <span class="text-secondary">https://codervent.com</span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8">
                  <div class="card">

                     <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="form-label mb-0">User Name</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <input class="form-control" name="username" type="text"
                                    value="{{ old('username') ?? $profileData->username }}" required />
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Full Name</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <input class="form-control" name="name" type="text"
                                    value="{{ old('name') ?? $profileData->name }}" />
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Email</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <input class="form-control" name="email" type="text"
                                    value="{{ old('email') ?? $profileData->email }}" />
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Phone</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <input class="form-control" name="phone" type="text"
                                    value="{{ old('phone') ?? $profileData->phone }}" />
                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Address</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <input class="form-control" name="address" type="text"
                                    value="{{ old('address') ?? $profileData->address }}" />
                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Profile Image</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <label class="image" for="image"><input id="image" name="photo"
                                       type='file' accept=".png, .jpg, .jpeg" />
                                    <i class="lni lni-pencil-alt"></i>
                                 </label>
                                 <img class="rounded-circle bg-primary p-1" id="preview"
                                    src="{{ !$profileData->photo ? asset('frontend/no_image.jpg') : asset($profileData->photo) }}"
                                    alt="Admin">
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
