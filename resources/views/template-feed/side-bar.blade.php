 <!-- Sidebar Start -->
 <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-center position-relative w-100">
        {{-- <img src="{{ asset('assets2/src/assets/images/logos/dark-logo.svg') }}" width="40" alt="" class="me-2" />
        <h1 class="mb-0" style="font-family: unset;"> Feed</h1> --}}
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer position-absolute end-0 me-3" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
    </div>
    
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          {{-- <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url((''))}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li> --}}
          {{-- <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">User</span>
          </li> --}}
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/articlesall') }}" aria-expanded="false">
              <span>
                <i class="ti ti-file-description"></i>
              </span>
              <span class="hide-menu">Admin Upload</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{url('/user-activities')}}" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
                
              </span>
              <span class="hide-menu">User Activity</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/eror-log') }}" aria-expanded="false">
              <span>
              
                <i class="ti ti-alert-circle"></i>
              </span>
              <span class="hide-menu">Erors Log</span>
            </a>
          </li>
          
       
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->