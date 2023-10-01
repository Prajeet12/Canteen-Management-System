<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    {{-- @include("admin.adminnav") --}}
    <x-app-layout>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Purple Admin</title>
            <!-- plugins:css -->
            <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
            <!-- endinject -->
            <!-- Plugin css for this page -->
            <!-- End plugin css for this page -->
            <!-- inject:css -->
            <!-- endinject -->
            <!-- Layout styles -->
            <link rel="stylesheet" href="admin/assets/css/style.css">
            <!-- End layout styles -->
            <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
        </head>

        <body>


            <!-- partial -->
            <div class="container-fluid page-body-wrapper">

                <!-- partial:partials/_sidebar.html -->
                @include('admin.sidebar')
                <!-- partial -->
                <div class="main-panel">
                    {{-- <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon  text-white me-2" style="background:#ce1212";>
                                    <i class="mdi mdi-home" style="background:#ce1212";></i>
                                </span> Dashboard
                            </h3>
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <span></span>Overview <i
                                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> --}}
                    <!DOCTYPE html>



                    <script src="{{ asset('js/script.js') }}"></script>

                    <div class="d-flex flex-row mb-3 grid gap-0 ">
                        <div class="col-sm-6 mb-2 mb-sm-0 bg-gray p-2 g-col-6  ">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            <hr class="y-4">
                            <div class="row">
                                <div class="col-sm-6  mb-sm-0">
                                    <div class="card text-bg-primary mb-3 " style="max-width: 18rem;">
                                        <div class="card-body">
                                            <h4 class="card-text">Special</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6  mb-sm-0">
                                    <a href="{{ url('breakfast') }}">
                                        <div class="card text-bg-primary mb-3 " style="max-width: 18rem;">
                                            <div class="card-body">
                                                <h4 class="card-text">Breakfast</h4>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="col-sm-6  mb-sm-0">
                                    <div class="card text-bg-primary mb-2 " style="max-width: 18rem;">
                                        <div class="card-body">
                                            <h4 class="card-text">Lunch</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6  mb-sm-0">
                                    <div class="card text-bg-primary mb-3 " style="max-width: 18rem;">
                                        <div class="card-body">
                                            <h4 class="card-text">Drinks</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @include('admin.order.invoice')

                        <div class="row">
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-danger card-img-holder text-white">
                                    <div class="card-body">

                                        <h4 class="font-weight-normal mb-3">Weekly Sales <i
                                                class="mdi mdi-chart-line mdi-24px float-right"></i>
                                        </h4>
                                        <h2 class="mb-5">$ 15,0000</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 stretch-card grid-margin mr-0.6">
                                <div class="card bg-gradient-success card-img-holder text-white">

                                    <div class="card-body">
                                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute"
                                            alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3">Visitors Online <i
                                                class="mdi mdi-diamond mdi-24px float-right"></i>
                                        </h4>
                                        <h2 class="mb-5">95,5741</h2>
                                        <h6 class="card-text">Increased by 5%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- endinject -->
                        <!-- Custom js for this page -->
                        <script src="admin/assets/js/dashboard.js"></script>
                        <script src="admin/assets/js/todolist.js"></script>
                        <!-- End custom js for this page -->
                        <!-- plugins:js -->
                        <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
                        <!-- endinject -->
                        <!-- Plugin js for this page -->
                        <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
                        <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
                        <!-- End plugin js for this page -->
                        <!-- inject:js -->
                        <script src="admin/assets/js/off-canvas.js"></script>
                        <script src="admin/assets/js/hoverable-collapse.js"></script>
                        <script src="admin/assets/js/misc.js"></script>
                        <!-- endinject -->
                        <!-- Custom js for this page -->
                        <script src="admin/assets/js/dashboard.js"></script>
                        <script src="admin/assets/js/todolist.js"></script>
                        <script src="admin/assets/js/script.js"></script>
                        <!-- End custom js for this page -->
        </body>

        </html>


    </x-app-layout>

</body>

</html>
