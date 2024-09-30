<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skydash Admin - Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/favicon.png') }}" />
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-light shadow-sm" style="border-radius: 15px; border-color: #ccc; background-color: white;">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center">LOGIN</h4>
                        <p class="card-description text-center">To Access Menu</p>
                        <form class="forms-sample" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Login" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password Login" required>
                            </div>
                            <span class="d-block text-left my-4 text-muted">Don't have an account? <a href="{{ url('registerform') }}" style="text-decoration: none;"><b>Register</b></a></span>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="button" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('dist/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('dist/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
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
</body>
</html>
