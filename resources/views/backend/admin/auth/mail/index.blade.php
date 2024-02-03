@extends('backend.app')

@section('admin')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

   <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">SMTP Settings</li>
               </ol>
            </nav>
         </div>

      </div>
      <!--end breadcrumb-->

      <div class="card">
         <div class="card-body p-4">
            <h5 class="mb-4">SMTP Settings</h5>
            <form class="row g-3" id="myForm" action="{{ route('update.smtp') }}" method="post"
               enctype="multipart/form-data">
               @csrf

               <input name="id" type="hidden" value="{{ $smtp->id ?? '' }}">

               <div class="form-group col-md-6">
                  <label class="form-label" for="input1">Mailer</label>
                  <input class="form-control @error('mailer') is-invalid @enderror" id="input1" name="mailer"
                     type="text" value="{{ $smtp->mailer ?? '' }}">
                  @error('mailer')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>

               <div class="form-group col-md-6">
                  <label class="form-label" for="input1">Host</label>
                  <input class="form-control @error('host') is-invalid @enderror" id="input1" name="host"
                     type="text" value="{{ $smtp->host ?? '' }}">
                  @error('host')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>

               <div class="form-group col-md-6">
                  <label class="form-label" for="input1">Port</label>
                  <input class="form-control @error('port') is-invalid @enderror" id="input1" name="port"
                     type="text" value="{{ $smtp->port ?? '' }}">
                  @error('port')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>

               <div class="form-group col-md-6">
                  <label class="form-label" for="input1">User Name</label>
                  <input class="form-control @error('username') is-invalid @enderror" id="input1" name="username"
                     type="text" value="{{ $smtp->username ?? '' }}">
                  @error('username')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>

               <div class="form-group col-md-6">
                  <label class="form-label" for="input1">Password</label>
                  <input class="form-control @error('password') is-invalid @enderror" id="input1" name="password"
                     type="text" value="{{ $smtp->password ?? '' }}">
                  @error('password')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>

               <div class="form-group col-md-6">
                  <label class="form-label" for="input1">Encryption</label>
                  <input class="form-control @error('encryption') is-invalid @enderror" id="input1" name="encryption"
                     type="text" value="{{ $smtp->encryption ?? '' }}">
                  @error('encryption')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>

               <div class="form-group col-md-6">
                  <label class="form-label" for="input1">From Address</label>
                  <input class="form-control @error('from_address') is-invalid @enderror" id="input1"
                     name="from_address" type="text" value="{{ $smtp->from_address ?? '' }}">
                  @error('from_address')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>

               <div class="form-group col-md-6">
                  <label class="form-label" for="input1">From Name</label>
                  <input class="form-control @error('from_name') is-invalid @enderror" id="input1" name="from_name"
                     type="text" value="{{ $smtp->from_name ?? '' }}">
                  @error('from_name')
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
@endsection
