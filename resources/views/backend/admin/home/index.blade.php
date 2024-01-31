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

      <div class="row">
         <div class="col-12 col-lg-8 d-flex">
            <div class="card radius-10 w-100">
               <div class="card-header">
                  <div class="d-flex align-items-center">
                     <div>
                        <h6 class="mb-0">Sales Overview</h6>
                     </div>
                     <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="#"><i
                              class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="javascript:;">Action</a>
                           </li>
                           <li><a class="dropdown-item" href="javascript:;">Another action</a>
                           </li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="d-flex align-items-center font-13 mb-3 ms-auto gap-2">
                     <span class="cursor-pointer rounded border px-1"><i class="bx bxs-circle me-1"
                           style="color: #14abef"></i>Sales</span>
                     <span class="cursor-pointer rounded border px-1"><i class="bx bxs-circle me-1"
                           style="color: #ffc107"></i>Visits</span>
                  </div>
                  <div class="chart-container-1">
                     <canvas id="chart1"></canvas>
                  </div>
               </div>
               <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group border-top text-center">
                  <div class="col">
                     <div class="p-3">
                        <h5 class="mb-0">24.15M</h5>
                        <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i>
                              2.43%</span></small>
                     </div>
                  </div>
                  <div class="col">
                     <div class="p-3">
                        <h5 class="mb-0">12:38</h5>
                        <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i>
                              12.65%</span></small>
                     </div>
                  </div>
                  <div class="col">
                     <div class="p-3">
                        <h5 class="mb-0">639.82</h5>
                        <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i>
                              5.62%</span></small>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-4 d-flex">
            <div class="card radius-10 w-100">
               <div class="card-header">
                  <div class="d-flex align-items-center">
                     <div>
                        <h6 class="mb-0">Trending Products</h6>
                     </div>
                     <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="#"><i
                              class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="javascript:;">Action</a>
                           </li>
                           <li><a class="dropdown-item" href="javascript:;">Another action</a>
                           </li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart-container-2">
                     <canvas id="chart2"></canvas>
                  </div>
               </div>
               <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-top bg-transparent">
                     Jeans <span class="badge bg-success rounded-pill">25</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     T-Shirts <span class="badge bg-danger rounded-pill">10</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     Shoes <span class="badge bg-primary rounded-pill">65</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     Lingerie <span class="badge bg-warning text-dark rounded-pill">14</span>
                  </li>
               </ul>
            </div>
         </div>
      </div><!--end row-->

      <div class="card radius-10">
         <div class="card-header">
            <div class="d-flex align-items-center">
               <div>
                  <h6 class="mb-0">Recent Orders</h6>
               </div>
               <div class="dropdown ms-auto">
                  <a class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="#"><i
                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="javascript:;">Action</a>
                     </li>
                     <li><a class="dropdown-item" href="javascript:;">Another action</a>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="mb-0 table align-middle">
                  <thead class="table-light">
                     <tr>
                        <th>Product</th>
                        <th>Photo</th>
                        <th>Product ID</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Shipping</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Iphone 5</td>
                        <td><img class="product-img-2" src="{{ asset('backend/') }}/assets/images/products/01.png"
                              alt="product img"></td>
                        <td>#9405822</td>
                        <td><span class="badge bg-gradient-quepal w-100 text-white shadow-sm">Paid</span>
                        </td>
                        <td>$1250.00</td>
                        <td>03 Feb 2020</td>
                        <td>
                           <div class="progress" style="height: 6px;">
                              <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                           </div>
                        </td>
                     </tr>

                     <tr>
                        <td>Earphone GL</td>
                        <td><img class="product-img-2" src="{{ asset('backend/') }}/assets/images/products/02.png"
                              alt="product img"></td>
                        <td>#8304620</td>
                        <td><span class="badge bg-gradient-blooker w-100 text-white shadow-sm">Pending</span>
                        </td>
                        <td>$1500.00</td>
                        <td>05 Feb 2020</td>
                        <td>
                           <div class="progress" style="height: 6px;">
                              <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
                           </div>
                        </td>
                     </tr>

                     <tr>
                        <td>HD Hand Camera</td>
                        <td><img class="product-img-2" src="{{ asset('backend/') }}/assets/images/products/03.png"
                              alt="product img"></td>
                        <td>#4736890</td>
                        <td><span class="badge bg-gradient-bloody w-100 text-white shadow-sm">Failed</span>
                        </td>
                        <td>$1400.00</td>
                        <td>06 Feb 2020</td>
                        <td>
                           <div class="progress" style="height: 6px;">
                              <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 70%"></div>
                           </div>
                        </td>
                     </tr>

                     <tr>
                        <td>Clasic Shoes</td>
                        <td><img class="product-img-2" src="{{ asset('backend/') }}/assets/images/products/04.png"
                              alt="product img"></td>
                        <td>#8543765</td>
                        <td><span class="badge bg-gradient-quepal w-100 text-white shadow-sm">Paid</span>
                        </td>
                        <td>$1200.00</td>
                        <td>14 Feb 2020</td>
                        <td>
                           <div class="progress" style="height: 6px;">
                              <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>Sitting Chair</td>
                        <td><img class="product-img-2" src="{{ asset('backend/') }}/assets/images/products/06.png"
                              alt="product img"></td>
                        <td>#9629240</td>
                        <td><span class="badge bg-gradient-blooker w-100 text-white shadow-sm">Pending</span>
                        </td>
                        <td>$1500.00</td>
                        <td>18 Feb 2020</td>
                        <td>
                           <div class="progress" style="height: 6px;">
                              <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>Hand Watch</td>
                        <td><img class="product-img-2" src="{{ asset('backend/') }}/assets/images/products/05.png"
                              alt="product img"></td>
                        <td>#8506790</td>
                        <td><span class="badge bg-gradient-bloody w-100 text-white shadow-sm">Failed</span>
                        </td>
                        <td>$1800.00</td>
                        <td>21 Feb 2020</td>
                        <td>
                           <div class="progress" style="height: 6px;">
                              <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 40%"></div>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <div class="row row-cols-1 row-cols-lg-3">
         <div class="col d-flex">
            <div class="card radius-10 w-100">
               <div class="card-body">
                  <p class="font-weight-bold text-secondary mb-1">Weekly Revenue</p>
                  <div class="d-flex align-items-center mb-4">
                     <div>
                        <h4 class="mb-0">$89,540</h4>
                     </div>
                     <div class="">
                        <p class="align-self-center font-weight-bold text-success mb-0 ms-2">4.4% <i
                              class="bx bxs-up-arrow-alt mr-2"></i>
                        </p>
                     </div>
                  </div>
                  <div class="chart-container-0 mt-5">
                     <canvas id="chart3"></canvas>
                  </div>
               </div>
            </div>
         </div>
         <div class="col d-flex">
            <div class="card radius-10 w-100">
               <div class="card-header bg-transparent">
                  <div class="d-flex align-items-center">
                     <div>
                        <h6 class="mb-0">Orders Summary</h6>
                     </div>
                     <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="#"><i
                              class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="javascript:;">Action</a>
                           </li>
                           <li><a class="dropdown-item" href="javascript:;">Another action</a>
                           </li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart-container-1 mt-3">
                     <canvas id="chart4"></canvas>
                  </div>
               </div>
               <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-top bg-transparent">
                     Completed <span class="badge bg-gradient-quepal rounded-pill">25</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     Pending <span class="badge bg-gradient-ibiza rounded-pill">10</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     Process <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col d-flex">
            <div class="card radius-10 w-100">
               <div class="card-header bg-transparent">
                  <div class="d-flex align-items-center">
                     <div>
                        <h6 class="mb-0">Top Selling Categories</h6>
                     </div>
                     <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="#"><i
                              class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="javascript:;">Action</a>
                           </li>
                           <li><a class="dropdown-item" href="javascript:;">Another action</a>
                           </li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart-container-0">
                     <canvas id="chart5"></canvas>
                  </div>
               </div>
               <div class="row row-group border-top g-0">
                  <div class="col">
                     <div class="p-3 text-center">
                        <h4 class="text-danger mb-0">$45,216</h4>
                        <p class="mb-0">Clothing</p>
                     </div>
                  </div>
                  <div class="col">
                     <div class="p-3 text-center">
                        <h4 class="text-success mb-0">$68,154</h4>
                        <p class="mb-0">Electronic</p>
                     </div>
                  </div>
               </div><!--end row-->
            </div>
         </div>
      </div><!--end row-->

   </div>
@endsection
