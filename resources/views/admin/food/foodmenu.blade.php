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
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                                    <i class="mdi mdi-contacts menu-icon" style="background:#ce1212";></i>
                                </span> Menu
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
                        <!-- Succession notification -->
                        @if (count($errors) > 0)
                            <div class="alert alert-success">
                                <ul>
                                    @foreach ($error->all as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <!-- End of Succession notification -->
                        <!-- Scrollable modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" style="background:#ce1212">
                            Add Food
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Menu</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/add-menu') }}" method="POST" role="form"
                                            enctype="multipart/form-data" class="php-email-form p-3 p-md-4">
                                            @csrf
                                            <div class=" row">

                                                <div class="col-xl-6 form-group">
                                                    <label for="category_id">Category</label>
                                                    <select class="form-select" name="category_id"
                                                        aria-label="Default select example">
                                                        <option disabled selected>Category</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->category_name }}</option>
                                                        @endforeach


                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Title</label>
                                                    <input type="text" name="title" class="form-control"
                                                        id="title" placeholder="Food Name" required>
                                                </div>

                                                <div class=" form-group">
                                                    <label for="">Price</label>
                                                    <input type="number" name="price" class="form-control"
                                                        id="price" placeholder="Price" required>
                                                </div>

                                            </div>
                                            <label for="">Description</label>
                                            <div class="form-group">
                                                <textarea class="form-control" name="description" rows="5" id="description" placeholder="Description" required></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Load the image</label>
                                                <input class="form-control" type="file" name="image" id="image"
                                                    required>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            style="background:#ce1212">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--Form-->
                        <div class="row pt-3">


                            <table class="table ">
                                <thead class="thead-primary table-info" style="background:#ce1212">

                                    <tr>
                                        <th scope="col">Food Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->category->category_name }}</td>

                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td><img src="{{ asset('foodimage/' . $item->image) }}" alt="">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $item->id }}">
                                                    Update
                                                </button>
                                                {{-- <a href="{{ url('/delete-menu', $item->id) }}"
                                                    class="btn btn-danger">Delete</a> --}}



                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="exampleModal{{ $item->id }}Label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Update Category</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('/update-menu/' . $item->id) }}"
                                                                    method="POST" role="form"
                                                                    enctype="multipart/form-data"
                                                                    class="php-email-form p-3 p-md-4">
                                                                    @csrf
                                                                    <div class=" row">

                                                                        <div class="col-xl-6 form-group">
                                                                            <label for="category_id">Category</label>
                                                                            <select class="form-select"
                                                                                name="category_id"
                                                                                aria-label="Default select example">
                                                                                <option disabled selected>Category
                                                                                </option>
                                                                                @foreach ($categories as $category)
                                                                                    <option
                                                                                        value="{{ $category->id }}"
                                                                                        {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                                                                        {{ $category->category_name }}
                                                                                    </option>
                                                                                @endforeach


                                                                            </select>

                                                                        </div>
                                                                        <div class="col-xl-6 form-group">
                                                                            <div class="form-group">

                                                                                <label for="">Title</label>
                                                                                <input type="text" name="title"
                                                                                    class="form-control"
                                                                                    id="title"
                                                                                    value="{{ $item->title }}"
                                                                                    placeholder="Food Name" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-6 form-group">
                                                                            <label for="">Price</label>
                                                                            <input type="number" name="price"
                                                                                class="form-control" id="price"
                                                                                value="{{ $item->price }}"required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="">Description</label>
                                                                            <textarea class="form-control" name="description" rows="5" id="description" required>{{ $item->description }}</textarea>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="formFile"
                                                                                class="form-label">Old image</label>
                                                                            <img height="200" width="200"
                                                                                src="{{ asset('foodimage/' . $item->image) }}"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="formFile"
                                                                                class="form-label">New image</label>

                                                                            <input class="form-control" type="file"
                                                                                name="image" id="image"
                                                                                required>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            style="background:#ce1212">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>





                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $item->id }}">
                                                    Delete
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal{{ $item->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="deleteModal{{ $item->id }}Label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Delete</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('/delete-menu/' . $item->id) }}"
                                                                    method="POST" role="form"
                                                                    enctype="multipart/form-data"
                                                                    class="php-email-form p-3 p-md-4">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <h5>Are you sure you want to delete
                                                                        '{{ $item->title }}'?</h5>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    style="background:#ce1212">Delete</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
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
                <!-- End custom js for this page -->

        </body>

        </html>
</body>

</html>
</x-app-layout>

</body>

</html>
