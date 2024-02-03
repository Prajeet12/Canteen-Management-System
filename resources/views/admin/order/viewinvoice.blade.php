<!-- resources/views/invoice.blade.php -->
@extends('admin.adminhome')
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Notification  -->
    @include('admin.notification')
    <!--End Notification  -->

    <div class="d-print-none mt-4">
        <div class="float-start mx-3">
            <button class="btn btn-primary" onclick="printBill()">Generate Bill</button>
        </div>
    </div>
    <div class="container mt-3" id="contentToPrint">

        <div class="row">
            <div class="col-sm-6 mb-2 mb-sm-0 bg-gray p-2 g-col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Canteen Food Invoice</h4>
                        <h5 class="card-title text-center">Naxal, Kathmandu</h5>
                    </div>
                    <div class="card-body">
                        <!-- Customer Information -->
                        <div class="mb-4">
                            <h5>Customer Information:</h5>
                            <!-- Add customer details here -->
                            <p>Customer Name: {{ $customerName }}</p>
                            <p>Order Number: {{ $orderNumber }}</p>
                            <p>Invoice Date: {{ $invoice_date }}</p>
                            <p>Invoice Number: {{ $invoice_number }}</p>
                            <p>Payment: {{ $method }}</p>
                            <!-- Add more details as needed -->
                        </div>

                        <!-- Order Details Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through ordered items -->
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <td>{{ $item['title'] }}</td>
                                            <td>{{ $item['price'] }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>{{ $item['total'] }}</td>
                                        </tr>
                                    @endforeach
                                    <!-- Add more rows for other items -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Totals -->
                        <div class="text-right">
                            <p><strong>Subtotal:</strong> Rs {{ $subtotal }}</p>
                            <p><strong>Tax (13%):</strong> Rs {{ $tax }}</p>
                            <h4><strong>Total:</strong> Rs. {{ $total }}</h4>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 mb-2 mb-sm-0 p-2 g-col-6" id="kotContent">
                <div class="card">
                    <div class="card-header ">

                        <h4 class="card-title text-center">KOT</h4>
                        <h4 class="card-title text-center">Token Number {{ $orderNumber }} </h4>

                    </div>
                    <div class="card-body">
                        <!-- Customer Information -->


                        <!-- Order Details Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through ordered items -->
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <td>{{ $item['title'] }}</td>
                                            <td>{{ $item['price'] }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>{{ $item['total'] }}</td>
                                        </tr>
                                    @endforeach
                                    <!-- Add more rows for other items -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Totals -->

                    </div>

                </div>
            </div>

        </div>

    </div>



    <script>
        function printBill() {
            var contentToPrint = document.getElementById('contentToPrint').outerHTML; // Invoice content
            var kotContent = document.getElementById('kotContent').outerHTML; // KOT content

            // Create a hidden container to hold the content to print
            var printContainer = document.createElement('div');
            printContainer.innerHTML = contentToPrint + '<hr>';

            // Open a new window for printing
            var printWindow = window.open('', '_blank');

            // Include Bootstrap CSS link for styles
            var bootstrapCSS =
                '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
            printWindow.document.write(bootstrapCSS);

            // Write the contents into the new window
            printWindow.document.write(printContainer.innerHTML);

            // Close the document to ensure styles are applied
            printWindow.document.close();

            // Print the contents
            printWindow.print();

            // Close the window after printing
            printWindow.close();
            // Remove the temporary container from the DOM after printing

        }
    </script>



    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
