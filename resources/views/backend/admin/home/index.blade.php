@extends('backend.app')

@section('admin')
   <div class="page-content">
      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
         <div class="col">
            <div class="card radius-10 border-start border-info border-0 border-4">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div>
                        <p class="text-secondary mb-0">Total Orders</p>
                        <h4 class="text-info my-1">4805</h4>
                        <p class="font-13 mb-0">+2.5% from last week</p>
                     </div>
                     <div class="widgets-icons-2 rounded-circle bg-gradient-blues ms-auto text-white"><i
                           class='bx bxs-cart'></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="card radius-10 border-start border-danger border-0 border-4">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div>
                        <p class="text-secondary mb-0">Total Revenue</p>
                        <h4 class="text-danger my-1">$84,245</h4>
                        <p class="font-13 mb-0">+5.4% from last week</p>
                     </div>
                     <div class="widgets-icons-2 rounded-circle bg-gradient-burning ms-auto text-white"><i
                           class='bx bxs-wallet'></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="card radius-10 border-start border-success border-0 border-4">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div>
                        <p class="text-secondary mb-0">Bounce Rate</p>
                        <h4 class="text-success my-1">34.6%</h4>
                        <p class="font-13 mb-0">-4.5% from last week</p>
                     </div>
                     <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness ms-auto text-white"><i
                           class='bx bxs-bar-chart-alt-2'></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="card radius-10 border-start border-warning border-0 border-4">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div>
                        <p class="text-secondary mb-0">Total Customers</p>
                        <h4 class="text-warning my-1">8.4K</h4>
                        <p class="font-13 mb-0">+8.4% from last week</p>
                     </div>
                     <div class="widgets-icons-2 rounded-circle bg-gradient-orange ms-auto text-white"><i
                           class='bx bxs-group'></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!--end row-->

   </div>
@endsection
