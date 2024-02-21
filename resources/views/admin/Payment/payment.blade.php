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
        <div class="row ">
            
            {{-- <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Khalti
                        </h4><i class="mdi mdi-chart-line mdi-36px float-right"></i>
                        <h2 class="mb-5">Rs. {{ $totalKhaltiSum }}</h2>

                    </div>
                </div>
            </div> --}}

            @foreach ($totalMethodSum as $item)
                <div class="col-md-3 stretch-card  grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">{{$item->method->method}}
                            </h4>
                            <h1 >Rs. {{ $item->total_sum }}</h1>

                        </div>
                    </div>
                </div>
            @endforeach
           
            {{-- <div class="col-md-6 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <canvas id="incomeChart" width="400" height="150"></canvas>
                    </div>
                </div>
            </div> --}}


        </div>

        <!-- HTML structure -->


        <!-- Include Chart.js library -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Get the total amount from the PHP variable
            var totalAmount = <?php echo $totalAmount; ?>;

            // Sample income data (monthly)
            var incomeData = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                datasets: [{
                    label: 'Income',
                    data: [100, 150, 200, 180, 250, 220], // Sample income data values
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };

            // Replace the sample data with dynamic total amount data
            incomeData.datasets[0].data = [5000, totalAmount, 2500, 1600, 800, totalAmount];

            // Render income chart
            var ctx = document.getElementById('incomeChart').getContext('2d');
            var incomeChart = new Chart(ctx, {
                type: 'line',
                data: incomeData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script> --}}


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Add Method
        </button>

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
                                <div class="form-group">
                                    <label for="formFile" class="form-label">QR Image</label>
                                    <input class="form-control" type="file" name="qrimage"
                                        id="image" required>
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
                <h5>Methods</h5>
                <table class="table  ">
                    <thead class="thead-primary table-info" style="background:#ce1212">
                        <tr>

                            <th scope="col">Method Name</th>
                            <th scope="col">Qr Image</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $item)
                            <tr>
                                <td>{{ $item->method }}</td>
                                <td>
                                    @if ($item->qrimage)
                                        <img src="{{ asset('foodimage/' . $item->qrimage->qrimage) }}" alt="">
                                    @else
                                        -
                                    @endif
                                </td>

                                <td >
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
                                                            @if($item->id != 1)
                                                                 <div class="mb-3">
                                                                <label for="formFile" class="form-label">Old
                                                                    image</label>
                                                                <img height="200" width="200"
                                                                    src="{{ asset('foodimage/' . $item->qrimage->qrimage) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">New
                                                                    image</label>

                                                                <input class="form-control" type="file" name="qrimage"
                                                                    id="image" >
                                                            </div>
                                                            @endif

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
                                    {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                        Delete
                                    </button>
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
                                    </div> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h5>Update Vat Percentage</h5>
                <table class="table  ">
                    <thead class="thead-primary table-info" style="background:#ce1212">

                        <tr>

                            <th scope="col">Vat Percentage</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vats as $item)
                            <tr>
                                <td>{{ $item->percentage }}</td>

                                <td colspan="2">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal22{{ $item->id }}">
                                        Update
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal22{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModal22{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel22">
                                                        Update Vat Percentage</h1>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/update-vat/' . $item->id) }}" method="POST"
                                                        role="form" enctype="multipart/form-data"
                                                        class="php-email-form p-3 p-md-4">

                                                        @csrf
                                                        <div class=" row">

                                                            <div class="form-group">
                                                                <label for="">Vat percentage</label>
                                                                <input type="text" name="percentage"
                                                                    class="form-control" id="title"
                                                                    placeholder="method" value="{{ $item->percentage }}"
                                                                    required>
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
