@extends('backend.app')

@section('admin')
   <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Profile</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
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

                     <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
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
                                 <h6 class="mb-0">Profile Image</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                 <label class="image" for="image"><input id="image" name="photo" type='file'
                                       accept=".png, .jpg, .jpeg, .webp" />
                                    <i class="lni lni-pencil-alt"></i>
                                 </label>
                                 <img class="rounded-circle bg-primary p-1" id="preview"
                                    src="{{ !$profileData->photo ? asset('backend/assets/images/icons/user.png') : asset($profileData->photo) }}"
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
