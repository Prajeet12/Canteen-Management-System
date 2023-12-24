@extends('admin.adminhome')
@section('content')
    <div class="d-print-none mt-4">
        <div class="float-end">
            <button class="btn btn-primary" onclick="printBill()">Generate Bill</button>
        </div>
    </div>
    <div class="container mt-5" id="contentToPrint">

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title text-center">Food Invoice</h4>
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
                            <p><strong>Subtotal:</strong> {{ $subtotal }}</p>
                            <p><strong>Tax (13%):</strong> {{ $tax }}</p>
                            <h4><strong>Total:</strong> {{ $total }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="container mt-5" id="kotContent">
        <div class="row">
            <div class="col-md-6 offset-md-3">
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

    </div>

     <script>
        function printBill() {
            var contentToPrint = document.getElementById('contentToPrint').innerHTML; // Invoice content
            var kotContent = document.getElementById('kotContent').innerHTML; // KOT content

            var printWindow = window.open('', '_blank'); // Open a new window for printing
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

            // Add the KOT content
            printWindow.document.write(kotContent);

            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print(); // Trigger the print dialog
            // After printing, redirect back to the home page
            setTimeout(function() {
                printWindow.close(); // Close the print window
                window.location.href = '{{ url('/order') }}'; // Redirect to the order page
            }, 5000); // Redirect after 1 second (adjust as needed)
        }
    </script>
@endsection
