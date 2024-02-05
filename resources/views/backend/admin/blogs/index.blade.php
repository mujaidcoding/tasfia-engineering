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
                     <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                  </ol>
               </nav>
            </div>

         </div>
         <!--end breadcrumb-->

         <div class="card">
            <div class="card-body p-4">
               <h5 class="mb-4">Add Blog</h5>
               <form class="row g-3" id="myForm" action="{{ route('store.blog') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1"> Category Name</label>
                     <select class="@error('blogcat_id') is-invalid @enderror form-select mb-3" name="blogcat_id"
                        aria-label="Default select example">
                        <option selected="" disabled>Select Category</option>
                        @foreach ($blogcat as $cat)
                           <option value="{{ $cat->id }}">
                              {{ $cat->category_name }}
                           </option>
                        @endforeach
                     </select>
                     @error('blogcat_id')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Blog Name</label>
                     <input class="form-control @error('title') is-invalid @enderror" id="input1" name="title"
                        type="text" value="{{ old('title') }}" placeholder="Service Name">

                     @error('title')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Blog Description</label>
                     <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc">{!! old('desc') !!}</textarea>
                     @error('desc')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Blog Tags</label>
                     <input class="form-control @error('tags') is-invalid @enderror" name="tags" data-role="tagsinput"
                        type="text" value="{{ old('tags') }}" visually-hidden" placeholder="Blog Tags">
                     @error('tags')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <div>
                        <label class="form-label" for="input1">Blog Image</label>
                     </div>
                     <label class="image" for="image"><input id="image" name="image" type='file'
                           accept=".png, .jpg, .jpeg, .webp" />
                        <i class="lni lni-pencil-alt"></i>
                     </label>
                     <img class="rounded-circle bg-primary p-1" id="preview"
                        src="{{ asset('backend/assets/images/icons/user.png') }}" alt="Admin">
                  </div>

                  <h5 class="mb-4">SEO Settings</h5>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Meta Title</label>
                     <input class="form-control @error('meta_title') is-invalid @enderror" id="input1" name="meta_title"
                        type="text" value="{{ old('meta_title') }}" placeholder="Meta Title">

                     @error('meta_title')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Meta Description</label>

                     <textarea class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc" cols="20" rows="5"
                        placeholder="Meta Description">{!! old('meta_desc') !!}</textarea>

                     @error('meta_desc')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Meta Keywords</label>
                     <input class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords"
                        data-role="tagsinput" type="text" value="{{ old('meta_keywords') }}" visually-hidden"
                        placeholder="Meta Keywords" autocomplete="off">
                     @error('meta_keywords')
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
                     <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
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
               <h5 class="mb-4">Edit Blog</h5>
               <form class="row g-3" id="myForm" action="{{ route('update.blog') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <input name="id" type="hidden" value="{{ $blog->id }}">

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1"> Category Name</label>
                     <select class="@error('blogcat_id') is-invalid @enderror form-select mb-3" name="blogcat_id"
                        aria-label="Default select example">
                        <option selected="" disabled>Select Category</option>
                        @foreach ($blogcat as $cat)
                           <option value="{{ $cat->id }}" {{ $cat->id === $blog->blogcat_id ? 'selected' : '' }}>
                              {{ $cat->category_name }}
                           </option>
                        @endforeach
                     </select>

                     @error('blogcat_id')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Blog Title</label>
                     <input class="form-control @error('title') is-invalid @enderror" id="input1" name="title"
                        type="text" value="{{ $blog->title }}" placeholder="Blog Title">

                     @error('title')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Blog Description</label>
                     <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc">{!! $blog->desc !!}</textarea>
                     @error('desc')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Blog Tags</label>
                     <input class="form-control @error('tags') is-invalid @enderror" name="tags"
                        data-role="tagsinput" type="text" value="{{ $blog->tags }}" visually-hidden"
                        placeholder="Blog Tags">
                     @error('tags')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <div>
                        <label class="form-label" for="input1">Blog Image</label>
                     </div>
                     <label class="image" for="image"><input id="image" name="image" type='file'
                           accept=".png, .jpg, .jpeg, .webp" />
                        <i class="lni lni-pencil-alt"></i>
                     </label>
                     <img class="rounded-circle bg-primary p-1" id="preview"
                        src="{{ !empty($blog->image) ? asset($blog->image) : asset('backend/assets/images/icons/user.png') }}"
                        alt="{{ $blog->title }}">
                  </div>

                  <h5 class="mb-4">SEO Settings</h5>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Meta Title</label>
                     <input class="form-control @error('meta_title') is-invalid @enderror" id="input1"
                        name="meta_title" type="text" value="{{ $blog->meta_title }}" placeholder="Meta Title">

                     @error('meta_title')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Meta Description</label>

                     <textarea class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc" cols="20"
                        rows="5" placeholder="Meta Description">{!! $blog->meta_desc !!}</textarea>

                     @error('meta_desc')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Meta Keywords</label>
                     <input class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords"
                        data-role="tagsinput" type="text" value="{{ $blog->meta_keywords }}" visually-hidden"
                        placeholder="Meta Keywords" autocomplete="off">
                     @error('meta_keywords')
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
   @endif

   @if ($action === 'index')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blogs Data</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Blogs</li>
                  </ol>
               </nav>
            </div>
            <div class="ms-auto">
               <div class="btn-group">
                  <a class="btn btn-primary px-5" href="{{ route('add.blog') }}">Add Blog</a>
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
                           <th>Category</th>
                           <th>Title</th>
                           <th>Publish Date</th>
                           <th>Author</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($blogs as $key => $item)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>
                                 <img
                                    src=" {{ !empty($item->image) ? asset($item->image) : asset('backend/assets/images/icons/user.png') }}"
                                    alt="" height="50px" width="50px">
                              </td>
                              <td>{{ $item['blog']['category_name'] }}</td>
                              <td>{{ $item->title }}</td>
                              <td>{{ $item->created_at->format('d/m/Y') }}</td>
                              <td>
                                 {{ $item->author }}
                              </td>
                              <td>
                                 <a class="btn btn-info px-5" href="{{ route('edit.blog', $item->id) }}">Edit
                                 </a>
                                 <a class="btn btn-danger px-5" id="delete"
                                    href="{{ route('delete.blog', $item->id) }}">Delete </a>
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
