@extends('admin.adminhome')

@section('content')
    <div class="content-wrapper" >
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                    <i class="mdi mdi-contacts menu-icon" style="background:#ce1212";></i>
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
       <!-- Error Notification -->
<!-- Error Notification -->
@if ($errors->any())
    <div class="notification notification-error">
        <div class="notification-header">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>Error!</span>
        </div>
        <ul class="notification-body">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Success Notification -->
@if (\Session::has('success'))
    <div class="notification notification-success">
        <div class="notification-header">
            <i class="bi bi-check-circle-fill"></i>
            <span>Success!</span>
        </div>
        <p class="notification-body">{{ \Session::get('success') }}</p>
    </div>
@endif



        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Add Photos
        </button>




       <table class="table table-striped">
                <thead class="thead-primary table-info" style="background:#ce1212">

                    <tr>
                        <th scope="col gap-10">S.N</th>
                        <th scope="col gap-10">Customer Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>

                    </tr>


                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>

                            <td>{{ $data->firstItem() + $loop->index }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->subject}}</td>
                            <td>{{$item->message}}</td>              

                        </tr>
                    @endforeach
                </tbody>
            </table>
 <div class="col-md-12">
      <!-- Displaying Contact Data with Continuous Count -->


<!-- Pagination Links -->
{{ $data->links() }}

    </div>

    </div>




    </div>
    </div>

@endsection
