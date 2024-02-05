@extends('backend.app')

@section('admin')

   @if ($action === 'create')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Add Project</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         @endif

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Add Project</h5>
               <form class="row g-3" id="myForm" action="{{ route('store.project') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Serial Number</label>
                     <input class="form-control @error('serial') is-invalid @enderror" id="input1" name="serial"
                        type="number" value="{{ old('serial') }}" placeholder="Project Serial">

                     @error('serial')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Project Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text" value="{{ old('name') }}" placeholder="Project Name">

                     @error('name')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Project Video Link</label>
                     <input class="form-control @error('video') is-invalid @enderror" id="input1" name="video"
                        type="link" value="{{ old('video') }}" placeholder="https://youtube.com/watch?v=?????????">

                     @error('video')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <div>
                        <label class="form-label" for="input1">Project Image</label>
                     </div>
                     <label class="image" for="image"><input id="image" name="image" type='file'
                           accept=".png, .jpg, .jpeg, .webp" />
                        <i class="lni lni-pencil-alt"></i>
                     </label>
                     <img class="rounded-circle bg-primary p-1" id="preview"
                        src="{{ asset('backend/assets/images/icons/user.png') }}" alt="Project Image">
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
   @endif

   @if ($action === 'edit')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
                  </ol>
               </nav>
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

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Edit Service</h5>
               <form class="row g-3" id="myForm" action="{{ route('update.project') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <input name="id" type="hidden" value="{{ $project->id }}">

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Serial Number</label>
                     <input class="form-control @error('serial') is-invalid @enderror" id="input1" name="serial"
                        type="number" value="{{ $project->serial }}" placeholder="Project Serial">

                     @error('serial')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Project Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text" value="{{ $project->name }}" placeholder="Project Name">

                     @error('name')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Project Video Link</label>
                     <input class="form-control @error('video') is-invalid @enderror" id="input1" name="video"
                        type="text" value="{{ $project->video }}"
                        placeholder="https://youtube.com/watch?v=??????????">

                     @error('video')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <div>
                        <label class="form-label" for="input1">Project Image</label>
                     </div>
                     <label class="image" for="image"><input id="image" name="image" type='file'
                           accept=".png, .jpg, .jpeg, .webp" />
                        <i class="lni lni-pencil-alt"></i>
                     </label>
                     <img class="rounded-circle bg-primary p-1" id="preview"
                        src="{{ !empty($project->image) ? asset($project->image) : asset('backend/assets/images/icons/user.png') }}"
                        alt="{{ $project->name }}">
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
   @endif

   @if ($action === 'index')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Projects Data</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Projects</li>
                  </ol>
               </nav>
            </div>
            <div class="ms-auto">
               <div class="btn-group">
                  <a class="btn btn-primary px-5" href="{{ route('add.project') }}">Add Project</a>
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
                           <th>Order</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($projects as $key => $item)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>
                                 <img
                                    src=" {{ !empty($item->image) ? asset($item->image) : asset('backend/assets/images/icons/user.png') }}"
                                    alt="" height="50px" width="50px">
                              </td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->serial }}</td>
                              <td>
                                 <a class="btn btn-info px-5" href="{{ route('edit.project', $item->id) }}">Edit </a>
                                 <a class="btn btn-danger px-5" id="delete"
                                    href="{{ route('delete.project', $item->id) }}">Delete </a>
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
