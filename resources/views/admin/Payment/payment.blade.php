@extends('admin.adminhome')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                    <i class="mdi mdi-chart-bar menu-icon" style="background:#ce1212";></i>
                </span> Income
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    {{-- <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li> --}}
                </ul>
            </nav>
        </div>
       <!-- Notification  -->
        @include('admin.notification')
         <!--End Notification  -->

        <!-- End of Succession notification -->
       
        <!-- Button trigger modal -->
        <div class="row py-2 px-1">
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Income
                        </h4><i class="mdi mdi-chart-line mdi-36px float-right"></i>
                        <h2 class="mb-5">Rs. 111</h2>

                    </div>
                </div>
            </div>


            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Feedbacks
                        </h4><i class="mdi mdi-comment-alert-outline mdi-36px float-right"></i>
                        <h1 class="mb-5">11</h1>

                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Add Method
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Method</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/add-payment') }}" method="POST" role="form" enctype="multipart/form-data"
                            class="php-email-form p-3 p-md-4">
                            @csrf
                            <div class=" row">

                                <div class="form-group">
                                    <label for="">Method</label>
                                    <input type="text" name="method" class="form-control" id="title"
                                        placeholder="Method name" required>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background:#ce1212">Save
                            changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <!--Form-->
        <div class="row pt-4 py-2 px-1">

            <div class="col-md-6">
                <table class="table  ">
                    <thead class="thead-primary table-info" style="background:#ce1212">

                        <tr>

                            <th scope="col">Method Name</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $item)
                            <tr>
                                <td>{{ $item->method }}</td>

                                <td colspan="2">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}">
                                        Update
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModal{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Method Name</h1>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/update-payment/' . $item->id) }}"
                                                        method="POST" role="form" enctype="multipart/form-data"
                                                        class="php-email-form p-3 p-md-4">
                                                        @csrf
                                                        <div class=" row">

                                                            <div class="form-group">
                                                                <label for="">Method</label>
                                                                <input type="text" name="method" class="form-control"
                                                                    id="title" placeholder="method"
                                                                    value="{{ $item->method }}" required>
                                                            </div>

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
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModal{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Method</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/delete-payment/' . $item->id) }}"
                                                        method="POST" role="form" enctype="multipart/form-data"
                                                        class="php-email-form p-3 p-md-4">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h5>Are you sure you want to delete the Method
                                                            '{{ $item->method }}'?</h5>

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

        </div>

    </div>

    </div>
    </div>
@endsection
