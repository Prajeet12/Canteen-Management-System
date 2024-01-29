@extends('admin.adminhome')

@section('content')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="d-flex flex-row mb-3 grid gap-0">
        <div class="col-sm-6 mb-2 mb-sm-0 bg-gray p-2 g-col-6">

            <form class="d-flex" role="search" method="get" action="/searchorder">
                <input type="hidden" name="order" value="{{ $order->id }}">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"
                    value="{{ isset($search) ? $search : '' }}">
                <button class="btn btn-outline-success" type="submit">Search</button>

                <!-- Cross button with id "crossButton" -->
                <button id="crossButton" class="btn btn-outline-danger" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </form>

            <script>
                // Add event listener to the cross button
                document.getElementById('crossButton').addEventListener('click', function() {
                    // Navigate back to the home page
                    window.location.href = '/takeorder/{{ $order->id }}';
                });
            </script>

            <hr class="my-4">



            {{-- <h5> Name= {{ $order->customer_name }}</h5>
            <h5> Mobile Number = {{ $order->mobile_number }}</h5>
            <h5> Order Number = {{ $order->order_no }}</h5> --}}

            @if (isset($search))
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->isEmpty())
                            <tr>
                                <td colspan="4">No items found.</td>
                            </tr>
                        @else
                            @foreach ($data as $food)
                                <tr>

                                    <td>{{ $food->title }}</td>
                                    <td>{{ $food->price }}</td>
                                    @if ($order->orderitems->contains('food_id', $food->id))
                                        <td>
                                            {{-- <span class="text-danger">Already Added.</span> --}}

                                            {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $food->id }}">
                                                <i class="material-icons"><span class="material-symbols-outlined">
                                                        update
                                                    </span></i>
                                                <!-- Replace 'edit' with the Material Icons icon name you want to use -->
                                            </button> --}}
                                            <span class="text-danger">Already Added.</span>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $food->id }}" tabindex="-1"
                                                aria-labelledby="exampleModal{{ $food->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="exampleModal{{ $food->id }}Label">Update
                                                                Quantity
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        @php
                                                            $foodId = $food->id;
                                                            $foodItem = $order->orderitems->first(function ($item) use ($foodId) {
                                                                return $item->food_id === $foodId;
                                                            });
                                                        @endphp
                                                        <form
                                                            action="{{ route('updatequantity', ['id' => $foodItem->id]) }}"
                                                            method="POST" role="form" enctype="multipart/form-data"
                                                            class="php-email-form p-3 p-md-4">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class=" row">
                                                                    <div class="form-group">
                                                                        <label for="">Previous
                                                                            Quantity</label>
                                                                        <input type="text" class="form-control"
                                                                            id="title" value="{{ $foodItem->quantity }}"
                                                                            disabled placeholder="Quantity" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">New Quantity</label>
                                                                        <input type="hidden" name="price"
                                                                            value="{{ $food->price }}">
                                                                        <input type="text" name="quantity"
                                                                            class="form-control" id="title"
                                                                            placeholder="Quantity" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td><!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $food->id }}">
                                                <span class="material-symbols-outlined">
                                                    add_box
                                                </span>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $food->id }}" tabindex="-1"
                                                aria-labelledby="exampleModal{{ $food->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="exampleModal{{ $food->id }}Label">Add food
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('addquantity', $food->id) }}" method="POST"
                                                            role="form" enctype="multipart/form-data"
                                                            class="php-email-form p-3 p-md-4">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden" name="price"
                                                                    value="{{ $food->price }}">
                                                                <input type="hidden" name="order_id"
                                                                    value="{{ $order->id }}">
                                                                <div class=" row">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="text" name="quantity"
                                                                            class="form-control" id="title"
                                                                            placeholder="Quantity" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @else
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($data->take(1) as $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="menu{{ $item->id }}-tab" data-bs-toggle="tab"
                                data-bs-target="#menu{{ $item->id }}" type="button" role="tab"
                                aria-controls="menu{{ $item->id }}"
                                aria-selected="true">{{ $item->category_name }}</button>
                        </li>
                    @endforeach

                    @foreach ($data->skip(1) as $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="menu{{ $item->id }}-tab" data-bs-toggle="tab"
                                data-bs-target="#menu{{ $item->id }}" type="button" role="tab"
                                aria-controls="menu{{ $item->id }}"
                                aria-selected="false">{{ $item->category_name }}</button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="myTabContent">
                    @foreach ($data as $item)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="menu{{ $item->id }}"
                            role="tabpanel" aria-labelledby="menu{{ $item->id }}-tab" tabindex="0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SN.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($item->food->isEmpty())
                                        <tr>
                                            <td colspan="4">No items found.</td>
                                        </tr>
                                    @else
                                        @foreach ($item->food as $food)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $food->title }}</td>
                                                <td>{{ $food->price }}</td>
                                                @if ($order->orderitems->contains('food_id', $food->id))
                                                    <td>
                                                        <span class="text-danger">Already Added.</span>



                                                        <!-- Modal -->

                                                    </td>
                                                @else
                                                    <td><!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $food->id }}">
                                                            <span class="material-symbols-outlined">
                                                                add_box
                                                            </span>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal{{ $food->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="exampleModal{{ $food->id }}Label"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="exampleModal{{ $food->id }}Label">Add
                                                                            food
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="{{ route('addquantity', $food->id) }}"
                                                                        method="POST" role="form"
                                                                        enctype="multipart/form-data"
                                                                        class="php-email-form p-3 p-md-4">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="price"
                                                                                value="{{ $food->price }}">
                                                                            <input type="hidden" name="order_id"
                                                                                value="{{ $order->id }}">
                                                                            <div class=" row">
                                                                                <div class="form-group">
                                                                                    <label for="">Quantity</label>
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
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        @include('admin.order.invoice')
    </div>
@endsection
