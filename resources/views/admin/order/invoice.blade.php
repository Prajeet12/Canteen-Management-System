<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="col-sm-6 mb-2 mb-sm-0   g-col-6 ">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            {{-- <h4 class="float-end font-size-15">Invoice #DS0204 <span
                                                        class="badge bg-success font-size-12 ms-2">Paid</span></h4> --}}
                            <div class="mb-4">
                                <h2 class="mb-1 text-muted fs-5">Canteen Bill</h2>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">

                            <!-- end col -->
                            <div class="row">
                                <div class="text-muted text-sm-start">
                                    {{-- <div>
                                                            <h5 class="font-size-5 mb-1">Invoice No:</h5>
                                                            <p>#DZ0112</p>
                                                        </div> --}}
                                    {{-- <div class="mt-1">
                                                            <h5 class="font-size-5 mb-1">Invoice Date:</h5>
                                                            <p>12 Oct, 2020</p>
                                                        </div> --}}
                                    <div class="mt-1">
                                        <h5 class="font-size-5 mb-1">Order No:</h5>
                                        <p>{{ $order->order_no }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="py-2">
                            <h5 class="font-size-10">Order Summary</h5>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th style="width: 120px;">Total
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @foreach ($order->orderitems as $item)
                                            <tr>
                                                <td>
                                                    <h5>{{ $item->fooditem->title }}</h5>
                                                </td>
                                                <td> Rs. {{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td class="text-end">Rs. {{ $item->total }}</td>
                                                <th scope="row">Remove</th>
                                            </tr>
                                            <!-- end tr -->
                                        @endforeach
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">
                                                Sub Total</th>
                                            <td class="text-end">Rs. {{ $order->total_amt }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="8" class="border-0 text-end form-group">
                                                
                                                    <select class="form-select" name="category_id"
                                                        aria-label="Default select example">
                                                        <option disabled selected>Payment</option>
                                                        
                                                            <option value="">Cash</option>
                                                            <option value="">Khalti</option>
                                                        


                                                    </select>

                                               
                                            </th>

                                        </tr>
                                        <!-- end tr -->


                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Tax</th>
                                            <td class="border-0 text-end">$12.00</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold">$739.00</h4>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <button class="btn btn-primary" onclick="printDiv('contentToPrint')">Print
                                        Div</button>
                                    <a href="#" class="btn btn-primary w-md">Send</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</body>
<script src="admin/assets/js/script.js"></script>

</html>
