@extends('admin.adminhome')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                    <i class="mdi mdi-menu menu-icon" style="background:#ce1212";></i>
                </span> Menu
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <form class="d-flex" role="search" method="get" action="/search">
                            <input class="form-control me-2" name="search" type="search" placeholder="Search"
                                aria-label="Search" value={{ isset($search) ? $search : '' }}>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Succession notification -->
        
        @include('admin.notification')
         
        <!-- End of Succession notification -->
        <!-- Scrollable modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Add Food
        </button>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Menu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/add-menu') }}" method="POST" role="form" enctype="multipart/form-data"
                            class="php-email-form p-3 p-md-4">
                            @csrf
                            <div class=" row">

                                <div class="col-xl-6 form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-select select-search" name="category_id"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->category_name }}</option>
                                        @endforeach


                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Food Name" required>
                                </div>

                                <div class=" form-group">
                                    <label for="">Price</label>
                                    <input type="number" name="price" class="form-control" id="price"
                                        placeholder="Price" required>
                                </div>

                            </div>
                            <label for="">Description</label>
                            <div class="form-group">
                                <textarea class="form-control" name="description" rows="5" id="description" placeholder="Description" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Load the image</label>
                                <input class="form-control" type="file" name="image" id="image" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background:#ce1212">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Form-->
        <div class="row pt-3">


            <table class="table ">
                <thead class="thead-primary table-info" style="background:#ce1212">

                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $item)
                        <tr>
                            <td>{{ $menus->firstItem() + $loop->index }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->category_name }}</td>

                            <td>{{ $item->price }}</td>
                            <td>{{ $item->description }}</td>
                            <td><img src="{{ asset('foodimage/' . $item->image) }}" alt="">
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $item->id }}">
                                    Update
                                </button>
                                {{-- <a href="{{ url('/delete-menu', $item->id) }}"
                                                    class="btn btn-danger">Delete</a> --}}



                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModal{{ $item->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Update Food</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/update-menu/' . $item->id) }}" method="POST"
                                                    role="form" enctype="multipart/form-data"
                                                    class="php-email-form p-3 p-md-4">
                                                    @csrf
                                                    <div class=" row">

                                                        <div class="col-xl-6 form-group">
                                                            <label for="category_id">Category</label>
                                                            <select class="form-select" name="category_id"
                                                                aria-label="Default select example">
                                                                <option disabled selected>Category
                                                                </option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                                                        {{ $category->category_name }}
                                                                    </option>
                                                                @endforeach


                                                            </select>

                                                        </div>
                                                        <div class="col-xl-6 form-group">
                                                            <div class="form-group">

                                                                <label for="">Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    id="title" value="{{ $item->title }}"
                                                                    placeholder="Food Name" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 form-group">
                                                            <label for="">Price</label>
                                                            <input type="number" name="price" class="form-control"
                                                                id="price" value="{{ $item->price }}"required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Description</label>
                                                            <textarea class="form-control" name="description" rows="5" id="description" required>{{ $item->description }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Old image</label>
                                                            <img height="200" width="200"
                                                                src="{{ asset('foodimage/' . $item->image) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">New image</label>

                                                            <input class="form-control" type="file" name="image"
                                                                id="image" required>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            style="background:#ce1212">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>





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
                                                    Delete</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/delete-menu/' . $item->id) }}" method="POST"
                                                    role="form" enctype="multipart/form-data"
                                                    class="php-email-form p-3 p-md-4">
                                                    @csrf
                                                    @method('DELETE')
                                                    <h5>Are you sure you want to delete
                                                        '{{ $item->title }}'?</h5>

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
        <div class="row">
            <div class="col-md-12">
                {{ $menus->links() }}
            </div>
        </div>

    </div>
    {{-- <div class="row">
                      <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="clearfix">
                              <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                            </div>
                            <canvas id="visit-sale-chart" class="mt-4"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Traffic Sources</h4>
                            <canvas id="traffic-chart"></canvas>
                            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                          </div>
                        </div>
                      </div>
                    </div> --}}
    </div>
    </div>
@endsection
