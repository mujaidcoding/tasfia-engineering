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
                     <li class="breadcrumb-item active" aria-current="page">Add Feedback</li>
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
               <h5 class="mb-4">Add Feedback</h5>
               <form class="row g-3" id="myForm" action="{{ route('store.feedback') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Client Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text" value="{{ old('name') }}" placeholder="Hossain Rahman">

                     @error('name')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Star</label>
                     <input class="form-control @error('star') is-invalid @enderror" id="input1" name="star"
                        type="number" value="{{ old('star') }}" placeholder="5">

                     @error('star')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Feedback</label>
                     <textarea class="form-control @error('feedback') is-invalid @enderror" name="feedback" rows="5" cols="10"
                        placeholder="They are very professional.">{!! old('feedback') !!}</textarea>
                     @error('feedback')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <div>
                        <label class="form-label" for="input1">Client Image</label>
                     </div>
                     <label class="image" for="image"><input id="image" name="image" type='file'
                           accept=".png, .jpg, .jpeg, .webp" />
                        <i class="lni lni-pencil-alt"></i>
                     </label>
                     <img class="rounded-circle bg-primary p-1" id="preview"
                        src="{{ asset('backend/assets/images/icons/user.png') }}" alt="Admin">
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
                     <li class="breadcrumb-item active" aria-current="page">Edit Feedback</li>
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
               <h5 class="mb-4">Edit Feedback</h5>
               <form class="row g-3" id="myForm" action="{{ route('update.feedback') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <input name="id" type="hidden" value="{{ $feedback->id }}">

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Client Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="input1" name="name"
                        type="text" value="{{ $feedback->name }}" placeholder="Hossain Rahman">

                     @error('name')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Star</label>
                     <input class="form-control @error('star') is-invalid @enderror" id="input1" name="star"
                        type="number" value="{{ $feedback->star }}" placeholder="5">

                     @error('star')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Feedback</label>
                     <textarea class="form-control @error('feedback') is-invalid @enderror" name="feedback" rows="5" cols="10"
                        placeholder="They are very professional.">{!! $feedback->feedback !!}</textarea>
                     @error('feedback')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <div>
                        <label class="form-label" for="input1">Client Image</label>
                     </div>
                     <label class="image" for="image"><input id="image" name="image" type='file'
                           accept=".png, .jpg, .jpeg, .webp" />
                        <i class="lni lni-pencil-alt"></i>
                     </label>
                     <img class="rounded-circle bg-primary p-1" id="preview"
                        src="{{ !empty($feedback->image) ? asset($feedback->image) : asset('backend/assets/images/icons/user.png') }}"
                        alt="Admin">
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
            <div class="breadcrumb-title pe-3">Feedbacks Data</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Feedbacks</li>
                  </ol>
               </nav>
            </div>
            <div class="ms-auto">
               <div class="btn-group">
                  <a class="btn btn-primary px-5" href="{{ route('add.feedback') }}">Add Feedback</a>
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
                           <th>Star</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($feedbacks as $key => $item)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td><img
                                    src=" {{ !empty($item->image) ? asset($item->image) : asset('backend/assets/images/icons/user.png') }}"
                                    alt="" height="50px" width="50px"></td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->star }}</td>
                              <td>
                                 <a class="btn btn-info px-5" href="{{ route('edit.feedback', $item->id) }}">Edit </a>
                                 <a class="btn btn-danger px-5" id="delete"
                                    href="{{ route('delete.feedback', $item->id) }}">Delete </a>
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
