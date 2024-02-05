<div class="sidebar-wrapper" data-simplebar="true">
   <div class="sidebar-header">
      <div>
         <img class="logo-icon" src="{{ asset('backend/') }}/assets/images/logo-icon.png" alt="logo icon">
      </div>
      <div>
         <h4 class="logo-text">Admin</h4>
      </div>
      <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
      </div>
   </div>
   <!--navigation-->
   <ul class="metismenu" id="menu">

      @if (Auth::user()->can('a'))
         <li>
            <a href="{{ route('admin.dashboard') }}">
               <div class="parent-icon"><i class='bx bx-home-alt'></i>
               </div>
               <div class="menu-title">Dashboard</div>
            </a>
         </li>
      @endif

      <li class="menu-label">Menus</li>
      <li>
         <a href="{{ route('all.services') }}">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Services</div>
         </a>
      </li>
      <li>
         <a href="{{ route('all.projects') }}">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Projects</div>
         </a>
      </li>
      <li>
         <a href="{{ route('all.feedbacks') }}">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Testimonials</div>
         </a>
      </li>
      <li>
         <a href="{{ route('all.faqs') }}">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Faqs</div>
         </a>
      </li>
      <li>
         <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">Blogs Management</div>
         </a>
         <ul>
            <li> <a href="{{ route('blog.category') }}"><i class='bx bx-radio-circle'></i>Blog Catrgorirs</a>
            </li>
            <li> <a href="{{ route('all.blogs') }}"><i class='bx bx-radio-circle'></i>Blogs</a>
            </li>

         </ul>
      </li>

      {{-- <li>
         <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">Admin</div>
         </a>
         <ul>
            <li> <a href=""><i class='bx bx-radio-circle'></i>Manage All User</a>
            </li>
         </ul>
      </li>

      <li>
         <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">Manage Category</div>
         </a>
         <ul>
            <li> <a href="#"><i class='bx bx-radio-circle'></i>All Catrgory</a>
            </li>
            <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product
                  Details</a>
            </li>

         </ul>
      </li>
      <li>
         <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
            </div>
            <div class="menu-title">Components</div>
         </a>
         <ul>
            <li> <a href="component-alerts.html"><i class='bx bx-radio-circle'></i>Alerts</a>
            </li>
            <li> <a href="component-accordions.html"><i class='bx bx-radio-circle'></i>Accordions</a>
            </li>
         </ul>
      </li> --}}

      @if (Auth::user()->hasRole('super-admin'))
         <li class="menu-label">Role & Permission</li>
         <li>
            <a class="has-arrow" href="javascript:;">
               <div class="parent-icon"><i class="bx bx-lock"></i>
               </div>
               <div class="menu-title">Role & Permission</div>
            </a>
            <ul>
               <li class="{{ request()->routeIs('smtp.settings') ? 'mm-active' : '' }}">
                  <a href="{{ route('smtp.settings') }}"><i class='bx bx-radio-circle'></i>Manage SMTP</a>
               </li>

               <li class="{{ request()->routeIs(['add.user', 'edit.user', 'all.user']) ? 'mm-active' : '' }}">
                  <a href="{{ route('all.user') }}"><i class='bx bx-radio-circle'></i>All Users</a>
               </li>

               <li
                  class="{{ request()->routeIs(['all.permission', 'add.permission', 'edit.permission']) ? 'mm-active' : '' }}">
                  <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permissions</a>
               </li>

               <li class="{{ request()->routeIs(['all.roles', 'add.role', 'edit.role']) ? 'mm-active' : '' }}">
                  <a href="{{ route('all.roles') }}"><i class='bx bx-radio-circle'></i>All Roles</a>
               </li>

               <li
                  class="{{ request()->routeIs(['all.roles.permission', 'add.roles.permission', 'edit.roles.permission']) ? 'mm-active' : '' }}">
                  <a href="{{ route('all.roles.permission') }}"><i class='bx bx-radio-circle'></i>Role in
                     Permissions</a>
               </li>

            </ul>
         </li>
      @endif
   </ul>
   <!--end navigation-->
</div>
