<!-- resources/views/invoice.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Invoice</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        /* Add your custom styles here */
    </style>
</head>

<body>
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
    <div class="d-print-none mt-4">
           <div class="float-end">
                                    <button class="btn btn-primary" onclick="printBill()">Generate Bill</button>
                                </div>
                            </div>  
<script>
    function printBill() {
        var contentToPrint = document.getElementById('contentToPrint'); // Identify the content to print
        var printWindow = window.open('', '_blank'); // Open a new window for printing
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print Bill</title>');
        // Include the Bootstrap CSS link for styles
        printWindow.document.write('<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">');
        printWindow.document.write('</head><body>');
        printWindow.document.write(contentToPrint.innerHTML); // Add the content to the new window
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print(); // Trigger the print dialog
    }
</script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>