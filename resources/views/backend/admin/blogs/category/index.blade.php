@extends('backend.app')

@section('admin')
   @if ($action === 'index')
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog Categories Data</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Blog Category</li>
                  </ol>
               </nav>
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

            <div class="ms-auto">
               <div class="btn-group">
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Add
                     Blog Category</button>
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
                           <th>Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($category as $key => $item)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->category_name }}</td>
                              <td>
                                 <div class="btn-group">
                                    <button class="btn btn-info px-5" id="{{ $item->id }}" data-bs-toggle="modal"
                                       data-bs-target="#category" type="button"
                                       onclick="categoryEdit(this.id)">Edit</button>
                                 </div>
                                 <a class="btn btn-danger px-5" id="delete"
                                    href="{{ route('delete.blog.category', $item->id) }}">Delete </a>
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

            function categoryEdit(id) {
               $.ajax({
                  type: 'GET',
                  url: '/edit/blog/category/' + id,
                  dataType: 'Json',

                  success: function(data) {
                     $('#cat').val(data.category_name);
                     $('#cat_id').val(data.id);
                  }
               })
            }
         </script>
      @endpush
   @endif

   {{-- Add Modal --}}
   <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1"
      style="display: none;">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Blog Category</h5>
               <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="{{ route('store.blog.category') }}" method="POST">
                  @csrf

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Blog Category Name</label>
                     <input class="form-control @error('category_name') is-invalid @enderror" id="input1"
                        name="category_name" type="text" value="{{ old('category_name') }}" placeholder="Category Name">

                     @error('category_name')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
               <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            </form>
         </div>
      </div>
   </div>

   {{-- Edit Modal --}}
   <div class="modal fade" id="category" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1"
      style="display: none;">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Edit Blog Category</h5>
               <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="{{ route('update.blog.category') }}" method="POST">
                  @csrf

                  <input id="cat_id" name="cat_id" type="hidden">

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Blog Category Name</label>
                     <input class="form-control @error('category_name') is-invalid @enderror" id="cat"
                        name="category_name" type="text" value="{{ old('category_name') }}" placeholder="Category Name">

                     @error('category_name')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
               <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            </form>
         </div>
      </div>
   </div>
@endsection
