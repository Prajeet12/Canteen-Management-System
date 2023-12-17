@extends('admin.adminhome')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                    <i class="mdi mdi-format-list-bulleted menu-icon" style="background:#ce1212";></i>
                </span> Category
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    {{-- <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li> --}}
                </ul>
            </nav>
        </div>
      <!-- Notification  -->
        @php
            $alertType = \Session::has('success') ? 'alert-success' : (\Session::has('deleted') ? 'alert-danger' : '');
        @endphp

        @if (\Session::has('success') || \Session::has('deleted'))
            <div class="alert alert-dismissible fade show rounded-3 position-fixed top-0 end-0 m-4 {{ $alertType }}"
                role="alert" style="width: 30%; height: 15%;" id="autoDismissAlert">
                <div class="d-flex align-items-center justify-content-left h-100">
                    @if (\Session::has('success'))
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>
                            <strong>Success!</strong>
                            <p class="mb-0">{{ \Session::get('success') }}</p>
                        </div>
                    @elseif (\Session::has('deleted'))
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div>
                            <strong>Deleted!</strong>
                            <p class="mb-0">{{ \Session::get('deleted') }}</p>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
             <script>
        // Automatically remove the alert after 3 seconds
        setTimeout(function() {
            document.getElementById('autoDismissAlert').remove();
        }, 2000);
    </script>
        @endif
        <!-- End of Succession notification -->
        <!-- Scrollable modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Add Category
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/add-category') }}" method="POST" role="form"
                            enctype="multipart/form-data" class="php-email-form p-3 p-md-4">
                            @csrf
                            <div class=" row">

                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input type="text" name="category_name" class="form-control" id="title"
                                        placeholder="Category Name" required>
                                </div>

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

        <!--Form-->
        <div class="row pt-3">


            <table class="table ">
                <thead class="thead-primary table-info" style="background:#ce1212">

                    <tr>

                        <th scope="col">Category</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->category_name }}</td>

                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $item->id }}">
                                    Update
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModal{{ $item->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Category</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/update-category/' . $item->id) }}" method="POST"
                                                    role="form" enctype="multipart/form-data"
                                                    class="php-email-form p-3 p-md-4">
                                                    @csrf
                                                    <div class=" row">

                                                        <div class="form-group">
                                                            <label for="">Category</label>
                                                            <input type="text" name="category_name" class="form-control"
                                                                id="title" placeholder="Category Name"
                                                                value="{{ $item->category_name }}" required>
                                                        </div>

                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"
                                                    style="background:#ce1212">Save changes</button>
                                            </div>
                                            </form>
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
                                                    Category</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/delete-category/' . $item->id) }}" method="POST"
                                                    role="form" enctype="multipart/form-data"
                                                    class="php-email-form p-3 p-md-4">
                                                    @csrf
                                                    @method('DELETE')
                                                    <h5>Are you sure you want to delete the category
                                                        '{{ $item->category_name }}'?</h5>

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
        </div>

        </td>


        </tr>
        @endforeach

        </tbody>
        </table>
    </div>

    </div>
    </div>
@endsection
