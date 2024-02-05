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
                     <li class="breadcrumb-item active" aria-current="page">Add Faq</li>
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
               <h5 class="mb-4">Add Faq</h5>
               <form class="row g-3" id="myForm" action="{{ route('store.faq') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Serial</label>
                     <input class="form-control @error('serial') is-invalid @enderror" id="input1" name="serial"
                        type="number" value="{{ old('serial') }}" placeholder="5">

                     @error('serial')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Question</label>
                     <input class="form-control @error('question') is-invalid @enderror" id="input1" name="question"
                        type="text" value="{{ old('question') }}" placeholder="Can I get Your Service When I need?">

                     @error('question')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Answer</label>
                     <textarea class="form-control @error('answer') is-invalid @enderror" name="answer" rows="5" cols="10"
                        placeholder="The transfer of an immigrant visa application from USCIS to the National takes about 30-60 days. Before phoning to confirm receipt of an application, the National Visa Center recommends waiting at least 60 days from.">{!! old('answer') !!}</textarea>
                     @error('answer')
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
               <form class="row g-3" id="myForm" action="{{ route('update.faq') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  <input name="id" type="hidden" value="{{ $faq->id }}">

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Serial</label>
                     <input class="form-control @error('serial') is-invalid @enderror" id="input1" name="serial"
                        type="number" value="{{ $faq->serial }}" placeholder="5">

                     @error('serial')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Question</label>
                     <input class="form-control @error('question') is-invalid @enderror" id="input1" name="question"
                        type="text" value="{{ $faq->question }}" placeholder="Can I get Your Service When I need?">

                     @error('question')
                        <span class="text-danger">
                           {{ $message }}
                        </span>
                     @enderror
                  </div>

                  <div class="form-group col-md-12">
                     <label class="form-label" for="input1">Answer</label>
                     <textarea class="form-control @error('answer') is-invalid @enderror" name="answer" rows="5" cols="10"
                        placeholder="The transfer of an immigrant visa application from USCIS to the National takes about 30-60 days. Before phoning to confirm receipt of an application, the National Visa Center recommends waiting at least 60 days from">{!! $faq->answer !!}</textarea>
                     @error('answer')
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
            <div class="breadcrumb-title pe-3">Faqs Data</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">All Faqs</li>
                  </ol>
               </nav>
            </div>
            <div class="ms-auto">
               <div class="btn-group">
                  <a class="btn btn-primary px-5" href="{{ route('add.faq') }}">Add Faq</a>
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
                           <th>Q:</th>
                           <th>Ans:</th>
                           <th>Serial</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($faqs as $key => $item)
                           <tr>
                              <td>{{ $loop->iteration }}</td>

                              <td>{{ Str::limit($item->question, 50) }}</td>

                              <td>{{ Str::limit($item->answer, 50) }}</td>
                              <td>{{ $item->serial }}</td>

                              <td>
                                 <a class="btn btn-info px-5" href="{{ route('edit.faq', $item->id) }}">Edit </a>
                                 <a class="btn btn-danger px-5" id="delete"
                                    href="{{ route('delete.faq', $item->id) }}">Delete </a>
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
