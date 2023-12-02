@extends('admin.adminhome')
@section('content')
    <div class="content-wrapper">
        {{-- <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                                    <i class="mdi mdi-contacts menu-icon" style="background:#ce1212";></i>
                                </span> Order List
                            </h3>
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <span></span>Overview <i
                                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
        <div class="row py-2 px-1">
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">

                        <h4 class="font-weight-normal mb-3">Total Income <i
                                class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">Rs. 15,0000</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Orders <i
                                class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">45,6334</h2>
                        <h6 class="card-text">Decreased by 10%</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin mr-0.6">
                <div class="card bg-gradient-success card-img-holder text-white">

                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Visitors Online <i
                                class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">95,5741</h2>
                        <h6 class="card-text">Increased by 5%</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin mr-0.6">
                <div class="card bg-gradient-success card-img-holder text-white">

                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Visitors Online <i
                                class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">95,5741</h2>
                        <h6 class="card-text">Increased by 5%</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Error Notification -->
<!-- Error Notification -->
@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 position-fixed top-0 end-0 m-4" role="alert" style="width: 30%; height: 15%;">
        <div class="d-flex align-items-center justify-content-left h-100">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div>
                <strong>Success!</strong>
                <p class="mb-0">{{ \Session::get('success') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif









        <!-- Scrollable modal -->
        <!-- Button trigger modal -->


        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Generate Order
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Generate Order</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/add-order') }}" method="POST" role="form" enctype="multipart/form-data"
                            class="php-email-form p-3 p-md-4">
                            @csrf
                            <div class=" row">

                                <div class="form-group">
                                    <label for="">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" id="title"
                                        placeholder="Customer Name" required>
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
        <div class="row py-5 px-3">
            <table class="table table-striped">
                <thead class="thead-primary table-info" style="background:#ce1212">

                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col gap-10">Customer Name</th>
                        <th scope="col">Order No.</th>
                        <th scope="col">Action</th>

                    </tr>


                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $order->firstItem() + $loop->index }}</td>
                            <td>{{ $item->customer_name }}</td>
                            <td>{{ $item->order_no }}</td>
                            <td><a href="{{ url('/takeorder/' . $item->id) }}">
                                    <button type="button" class="btn btn-info">
                                        Add food
                                    </button>
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $item->id }}">
                                    Delete
                                </button>
                                <form action="{{ route('deleteOrder', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModal{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Delete</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/deleteorder/' . $item->id) }}" method="POST"
                                                        role="form" enctype="multipart/form-data"
                                                        class="php-email-form p-3 p-md-4">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h5>Are you sure you want to delete prder no.
                                                            '{{ $item->order_no }}'?</h5>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"  data-bs-dismiss="alert" aria-label="Close"
                                                        style="background:#ce1212">Delete</button>
                                                </div>
                                </form>
        </div>
    </div>
    </div>
    </form>
    </td>


    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    <div class="col-md-12">
        {{ $order->links() }}
    </div>
    </div>
    </div>
    </div>


@endsection
