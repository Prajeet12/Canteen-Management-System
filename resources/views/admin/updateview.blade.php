<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin</title>
    <base href="/public">
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
                  <div class="content-wrapper">
                    
                    <div class="page-header">
                      <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                          <i class="mdi mdi-home"></i>
                        </span> Update Menu
                      </h3>

                      
                      <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                          <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                          </li>
                        </ul>
                      </nav>
                    </div>
                    
                    <div class="modal-body">
                        <form action="{{url('/update',$data->id)}}" method="POST" role="form" enctype="multipart/form-data" class="php-email-form p-3 p-md-4">
                          @csrf
                          <div class="row">
                            <div class="col-xl-6 form-group">
                              <label for="">Title</label>
                              <input type="text" name="title" class="form-control" id="title" value="{{$data->title}}" placeholder="Food Name" required>
                            </div>
                    
                            <div class="col-xl-6 form-group">
                              <label for="">Price</label>
                              <input type="num" name="price" class="form-control" id="price" value="{{$data->price}}"required>
                            </div>
                            
                          </div>
                          <label for="">Description</label>
                          <div class="form-group">
                            <textarea class="form-control" name="description" rows="5" id="description" value="{{$data->description}}" required></textarea>
                          </div>
                          
                          <div class="mb-3">
                            <label for="formFile" class="form-label">Old image</label>
                            <img height="200" width="200" src="{{asset('foodimage/'.$data->image)}}" alt="">
                          </div>
                          <div class="mb-3">
                            <label for="formFile" class="form-label">New image</label>
                           
                            <input class="form-control" type="file" name="image" id="image" required>
                          </div>
                          <div class="mb-3">
                           
                            <button type="submit" class="btn btn-primary" style="background:#ce1212">Save changes</button>
                          </div>
                          
                          
                      </div>
                      
                    </form>
                      

                    {{-- <div class="row">
                      <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                          <div class="card-body">
                            <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">$ 15,0000</h2>
                            <h6 class="card-text">Increased by 60%</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                          <div class="card-body">
                            <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Weekly Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">45,6334</h2>
                            <h6 class="card-text">Decreased by 10%</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-success card-img-holder text-white">

                          <div class="card-body">
                            <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">95,5741</h2>
                            <h6 class="card-text">Increased by 5%</h6>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                    

                    {{-- <div class="row">
                      <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="clearfix">
                              <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                            </div>
                            <canvas id="visit-sale-chart" class="mt-4"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Traffic Sources</h4>
                            <canvas id="traffic-chart"></canvas>
                            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                    
                    
                   
                      
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
    <!-- End custom js for this page -->
          </body>
        </html>
        
       
    </x-app-layout>
   
</body>
</html>