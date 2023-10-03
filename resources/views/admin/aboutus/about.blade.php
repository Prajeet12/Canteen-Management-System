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
        @if (count($errors) > 0)
            <div class="alert alert-success">
                <ul>
                    @foreach ($error->all as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="modal-body">
            <form action="{{ url('add-about') }}" method="POST" role="form" enctype="multipart/form-data"
                class="php-email-form p-3 p-md-4">
                @csrf
                <div class=" row">

                    <div class="form-group">


                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Food Name"
                                required>
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
                    @foreach ($hero as $item)
                        <tr>
                            <td>{{ $item->title }}</td>

                            <td class="vertical-align-top">{{ $item->description }}</td>
                            <td><img src="{{ asset('foodimage/' . $item->image) }}" alt="">
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
                                                Update Category</h1>
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
                                                            src="{{ asset('foodimage/' . $item->image) }}"
                                                            alt="">
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

        </div>
    </div>
    </div>

    <!--Form-->
    <div class="row pt-3">



    </div>

    </div>
    </div>

@endsection
