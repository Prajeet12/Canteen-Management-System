@extends('admin.adminhome')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                    <i class="mdi mdi-table-large menu-icon" style="background:#ce1212";></i>
                </span> Gallery
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Notification  -->
        @include('admin.notification')
        <!--End Notification  -->

        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Add Photos
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Photo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('add-gallery') }}" method="POST" role="form" enctype="multipart/form-data"
                            class="php-email-form p-3 p-md-4">
                            @csrf
                            <div class=" row">

                                <div class="form-group">

                                    <div class="mb-3">
                                        <h3 for="formFile" class="form-label">Load the image</h3>
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

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--Form-->
    <div class="row pt-3">

        <table class="table table-sm table-striped">
            <thead class="thead-primary table-info" style="background:#ce1212">

                <tr>
                    <th class="w-50" scope="col">SN</th>
                    <th class="w-50" scope="col">Image</th>
                    <th class="w-50" scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ asset('foodimage/' . $item->image) }}" alt="">
                        </td>
                        <td>

                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $item->id }}">
                                Update
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $item->id }}">
                                Delete
                            </button>
                            <form action="{{ route('deleteGallery', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

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
                                                <form action="{{ url('/delete-gallery/' . $item->id) }}" method="POST"
                                                    role="form" enctype="multipart/form-data"
                                                    class="php-email-form p-3 p-md-4">
                                                    @csrf
                                                    @method('DELETE')
                                                    <h5>Are you sure you want to delete prder no.
                                                        '{{ $item->id }}'?</h5>

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
    </form>
    </td>


    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="exampleModal{{ $item->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Update Photos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/update-gallery/' . $item->id) }}" method="POST" role="form"
                        enctype="multipart/form-data" class="php-email-form p-3 p-md-4">
                        @csrf
                        <div class=" row">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Old
                                    image</label>
                                <img height="200" width="200" src="{{ asset('foodimage/' . $item->image) }}"
                                    alt="">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">New
                                    image</label>

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

    </tr>
    @endforeach

    </tbody>
    </table>

    </div>

    </div>
    </div>
@endsection
