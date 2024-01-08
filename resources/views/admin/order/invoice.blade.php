<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="col-sm-6 mb-2 mb-sm-0 g-col-6 ">

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
                                    <h5> Name= {{ $order->customer_name }}</h5>
                                    <h5> Mobile Number = {{ $order->mobile_number }}</h5>
                                    <h5> Order Number = {{ $order->order_no }}</h5>
                                    <div class="mt-1">

                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="py-2">
                            <h5 class="font-size-10">Order Summary</h5>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0" id="contentToPrint">
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
                                                <form method="POST"
                                                    action="{{ route('updatequantity', ['id' => $item->id]) }}">
                                                    @csrf
                                                    <td>
                                                        <h5>{{ $item->fooditem->title }}</h5>
                                                    </td>
                                                    <td> Rs. {{ $item->price }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td class="text">Rs. {{ $item->total }}</td>
                                                </form>
                                                <td scope="row">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $item->id }}">
                                                        <span class="material-symbols-outlined">
                                                            delete
                                                        </span>
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
                                                                        Category</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ url('/deleteOrderItem/' . $item->id) }}"
                                                                        method="POST" role="form"
                                                                        enctype="multipart/form-data"
                                                                        class="php-email-form p-3 p-md-4">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <h5>Are you sure you want to delete the category
                                                                            '{{ $item->fooditem->title }}'?</h5>

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
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateexampleModal{{ $item->id }}">
                                                        <i class="material-icons"><span
                                                                class="material-symbols-outlined">
                                                                update
                                                            </span></i>
                                                        <!-- Replace 'edit' with the Material Icons icon name you want to use -->
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="updateexampleModal{{ $item->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="updateexampleModal{{ $item->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="updateexampleModal{{ $item->id }}Label">
                                                                        Update
                                                                        Quantity
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('updatequantity', ['id' => $item->id]) }}"
                                                                    method="POST" role="form"
                                                                    enctype="multipart/form-data"
                                                                    class="php-email-form p-3 p-md-4">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class=" row">
                                                                            <div class="form-group">
                                                                                <label for="">Previous
                                                                                    Quantity</label>
                                                                                <input type="text"
                                                                                    class="form-control" id="title"
                                                                                    value="{{ $item->quantity }}"
                                                                                    disabled placeholder="Quantity"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">New
                                                                                    Quantity</label>
                                                                                <input type="hidden" name="price"
                                                                                    value="{{ $item->fooditem->price }}">
                                                                                <input type="text" name="quantity"
                                                                                    class="form-control"
                                                                                    id="title"
                                                                                    placeholder="Quantity" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- end tr -->
                                        @endforeach
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">
                                                Sub Total</th>
                                            <td class="text-end">Rs. {{ $order->total_amt - $order->vat_amount }}</td>

                                        </tr>

                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Tax ({{ $vat }}%)</th>
                                            <td class="border-0 text-end"> Rs. {{ $order->vat_amount }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold">Rs. {{ $order->total_amt }}</h4>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->

                                </table><!-- end table -->



                            </div><!-- end table responsive -->
                            <!-- Place this button where you want to trigger the print action -->
                            <form action="{{ url('/bill/' . $order->id) }}" method="post">
                                @csrf
                                <div class="col-xl-6 form-group">
                                    <label for="method">Payment</label>
                                    <select class="form-select" name="method" aria-label="Default select example"
                                        required>
                                        <option value="" disabled selected>Payment</option>
                                        @foreach ($payments as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('method') == $item->id ? 'selected' : '' }}>
                                                {{ $item->method }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <button class="btn btn-primary" type="submit">Generate
                                            Bill</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
    </div>


</body>
<!-- Add this script in your HTML -->
<script>
    function printBill() {
        var contentToPrint = document.getElementById('contentToPrint'); // Identify the content to print
        var printWindow = window.open('', '_blank'); // Open a new window for printing
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print Bill</title>');
        // Include the Bootstrap CSS link for styles
        printWindow.document.write(
            '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">');
        printWindow.document.write('</head><body>');
        printWindow.document.write(contentToPrint.innerHTML); // Add the content to the new window
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print(); // Trigger the print dialog
    }
</script>

<script src="admin/assets/js/script.js"></script>

</html>
