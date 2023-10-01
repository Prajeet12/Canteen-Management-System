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
                                </span> About Us
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
                        <div class="modal-body">
                            <form action="{{ url('add-about') }}" method="POST" role="form"
                                enctype="multipart/form-data" class="php-email-form p-3 p-md-4">
                                @csrf
                                <div class=" row">

                                    <div class="form-group">


                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                                placeholder="Food Name" required>
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
                                    <button type="submit" class="btn btn-primary" style="background:#ce1212">Save
                                        changes</button>
                                </div>
                            </form>
                            <table class="table table-striped">
                                <thead class="thead-primary table-info" style="background:#ce1212">

                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hero as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>

                                            <td class="vertical-align-top">{{ $item->description }}</td>
                                            <td><img src="{{ asset('foodimage/' . $item->image) }}" alt="">
                                            </td>
                                            <td>

                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $item->id }}">
                                                    Update
                                                </button>
                                            </td>


                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModal{{ $item->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Update Category</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/update-about/' . $item->id) }}"
                                                                method="POST" role="form"
                                                                enctype="multipart/form-data"
                                                                class="php-email-form p-3 p-md-4">
                                                                @csrf
                                                                <div class=" row">


                                                                    <div class=" form-group">
                                                                        <div class="form-group">

                                                                            <label for="">Title</label>
                                                                            <input type="text" name="title"
                                                                                class="form-control" id="title"
                                                                                value="{{ $item->title }}"
                                                                                placeholder="Food Name" required>
                                                                        </div>
                                                                    </div>



                                                                    <div class="form-group">
                                                                        <label for="">Description</label>
                                                                        <textarea class="form-control" name="description" rows="5" id="description" required>{{ $item->description }}</textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="formFile" class="form-label">Old
                                                                            image</label>
                                                                        <img height="200" width="200"
                                                                            src="{{ asset('foodimage/' . $item->image) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="formFile" class="form-label">New
                                                                            image</label>

                                                                        <input class="form-control" type="file"
                                                                            name="image" id="image" required>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
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
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!--Form-->
                <div class="row pt-3">



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
            <!-- End custom js for this page -->

        </body>

        </html>
</body>

</html>
</x-app-layout>

</body>

</html>