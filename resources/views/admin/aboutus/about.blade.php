@extends('admin.adminhome')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                    <i class="mdi mdi-contacts menu-icon" style="background:#ce1212";></i>
                </span> About Us
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Succession notification -->
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 position-fixed top-0 end-0 m-4"
                role="alert" style="width: 30%; height: 15%;">
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
        <h3>Add home content</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContentModal"
            style="background:#ce1212">
            Add Content
        </button>
        <div> <br> </div>
        <div class="modal fade" id="addContentModal" tabindex="-1" aria-labelledby="addContentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('add-clienthome') }}" method="POST" role="form"
                            enctype="multipart/form-data" class="php-email-form p-3 p-md-4">
                            @csrf
                            <div class=" row">

                                <div class="form-group">


                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Food Name" required>
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
                                <button type="submit" class="btn btn-primary" style="background:#ce1212">Save
                                    changes</button>
                            </div>
                        </form>


                    </div>


                </div>
            </div>


        </div>
        <table class="table table-striped">
            <thead class="thead-primary table-info" style="background:#ce1212">

                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($homes as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td style="max-height: 100px; overflow: hidden;">{{ $item->description }}</td>


                        <td><img src="{{ asset('foodimage/' . $item->image) }}" alt="">

                        </td>
                        <td>

                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#exampleModalHome{{ $item->id }}">
                                Update
                            </button>

                        </td>


                        <div class="modal fade" id="exampleModalHome{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalHome{{ $item->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Update About US</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ url('/update-clienthome/' . $item->id) }}" method="POST"
                                            role="form" enctype="multipart/form-data"
                                            class="php-email-form p-3 p-md-4">
                                            @csrf
                                            <div class=" row">


                                                <div class=" form-group">
                                                    <div class="form-group">

                                                        <label for="">Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            id="title" value="{{ $item->title }}"
                                                            placeholder="Food Name" required>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea class="form-control" name="description" rows="5" id="description" required>{{ $item->description }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Old
                                                        image</label>
                                                    <img height="200" width="200"
                                                        src="{{ asset('foodimage/' . $item->image) }}" alt="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">New
                                                        image</label>

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
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div><br></div>
        <h3>Add about us content</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientHomeModal"
            style="background:#ce1212">
            About us
        </button>
        <div> <br> </div>
        <div class="modal fade" id="addClientHomeModal" tabindex="-1" aria-labelledby="addClientHomeLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Content</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('add-about') }}" method="POST" role="form"
                            enctype="multipart/form-data" class="php-email-form p-3 p-md-4">
                            @csrf
                            <div class=" row">

                                <div class="form-group">


                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Food Name" required>
                                    </div>
                                </div>
                                <label for="">Description</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" rows="5" id="description" placeholder="Description"
                                        required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Load the first image</label>
                                    <input class="form-control" type="file" name="image1" id="image" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Load the second image</label>
                                    <input class="form-control" type="file" name="image2" id="image" required>
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


        </div>
        <div class="table-responsive">
            <table class="table table-striped vertical-align-top" style=" over-flow: break-word;">
                <thead class="thead-primary table-info" style="background:#ce1212">

                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image1</th>
                        <th scope="col">Image2</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($hero as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td class="word-wrap">{{ $item->description }}</td>

                            <td><img src="{{ asset('foodimage/' . $item->image1) }}" alt="">
                            <td><img src="{{ asset('foodimage/' . $item->image2) }}" alt="">
                            </td>
                            <td>

                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $item->id }}">
                                    Update
                                </button>
                            </td>


                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModal{{ $item->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Update About US</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/update-about/' . $item->id) }}" method="POST"
                                                role="form" enctype="multipart/form-data"
                                                class="php-email-form p-3 p-md-4">
                                                @csrf
                                                <div class=" row">


                                                    <div class=" form-group">
                                                        <div class="form-group">

                                                            <label for="">Title</label>
                                                            <input type="text" name="title" class="form-control"
                                                                id="title" value="{{ $item->title }}"
                                                                placeholder="Food Name" required>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea class="form-control" name="description" rows="5" id="description" required>{{ $item->description }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Old
                                                            image</label>
                                                        <img height="200" width="200"
                                                            src="{{ asset('foodimage/' . $item->image1) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Big
                                                            image</label>

                                                        <input class="form-control" type="file" name="image1"
                                                            id="image" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Old
                                                            image</label>
                                                        <img height="200" width="200"
                                                            src="{{ asset('foodimage/' . $item->image2) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Small Image</label>

                                                        <input class="form-control" type="file" name="image2"
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
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


        <div><br></div>


    </div>
    </div>
@endsection
