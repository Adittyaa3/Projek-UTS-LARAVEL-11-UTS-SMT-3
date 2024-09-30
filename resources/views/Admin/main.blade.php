<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>Document</title>
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/favicon.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
</head>
<body>


    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="relative">
    
        <!-- Navbar berada di luar sidebar dan konten -->
        @include('Admin.navbar')
      
        
        
        <!-- Wrapper dengan Flexbox untuk sidebar dan konten -->
        <div class="body-wrapper" style="display: flex;" >
            
            <!-- Sidebar -->
           
            <div class="sidebar-wrapper" style="width: 250px;">
                @include('Admin.sidebar')
            </div>

    
            
         <!-- Konten utama berada di samping sidebar -->
<div class="content-wrapper" style="flex-grow: 1;">
    <div class="container-fluid">
        <!-- Konten pertama -->
        @yield('content')
    </div>

    <div class="container-fluid">
        <!-- Konten kedua, misal untuk bagian yang berbeda -->
        @yield('content2')
    </div>
</div>

{{--             
        </div>
        @include('Admin.footer')
    </div> --}}
    

  





    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('dist/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('dist/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="{{ asset('dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('dist/assets/js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('dist/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dist/assets/js/template.js') }}"></script>
    <script src="{{ asset('dist/assets/js/settings.js') }}"></script>
    <script src="{{ asset('dist/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('dist/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dist/assets/js/dashboard.js') }}"></script>
     <script src="{{ asset('dist/assets/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('description');
        </script>
</body>
</html>