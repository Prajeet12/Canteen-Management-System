<!-- resources/views/invoice.blade.php -->
@extends('admin.adminhome')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Canteen Food Invoice</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Custom styles */
            /* Add your custom styles here */
        </style>
    </head>

    <body>
        <!-- Notification  -->
        @include('admin.notification')
         <!--End Notification  -->
         
         <div class="d-print-none mt-4">
                    <div class="float-start">
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
        
        {{-- <div class="container mt-5" id="kotContent">
        <div class="row">
            <div class="col-sm-6 mb-2 mb-sm-0 g-col-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">

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

    </div> --}}

        <script>
    function printBill() {
                var contentToPrint = document.getElementById('contentToPrint').innerHTML; // Invoice content
                var kotContent = document.getElementById('kotContent').innerHTML; // KOT content

                var printWindow = window.open('', '_self'); // Open a blank page in the same tab
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Print Bill</title>');
                // Include the Bootstrap CSS link for styles
                printWindow.document.write(
                    '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">');
                printWindow.document.write('</head><body>');

                // Add the Food Invoice content
                printWindow.document.write(contentToPrint);

                // Divider between Invoice and KOT
                printWindow.document.write('<hr>');
                printWindow.document.close();
                printWindow.print(); // Trigger the print dialog

                

                // After printing, redirect back to the home page
                setTimeout(function() {
                    window.location.href = '{{ url('/order') }}'; // Redirect to the order page
                }, 5000); // Redirect after 15 seconds (adjust as needed)
            }
        </script>



        <!-- Bootstrap JS and dependencies -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
