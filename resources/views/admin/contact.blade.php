@extends('admin.adminhome')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white me-2" style="background:#ce1212";>
                    <i class="mdi mdi-comment-alert-outline menu-icon" style="background:#ce1212";></i>
                </span> Feedbacks
            </h3>
         
        </div>

        @include('admin.notification')

        <!--Add contact details form -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Add 
        </button> --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact us</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/contact-information-edit/') }}" method="POST" enctype="multipart/form-data"
                            class="php-email-form p-3 p-md-4">
                            @csrf
                            <div class="row">

                                <div class="col-xl-6 form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control" id="address"
                                        placeholder="Address" required>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="contactEmail" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="number" class="form-control" name="phoneNumber" id="subject"
                                    placeholder="Phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="">Opening Hour</label>
                                <input type="text" name="openingTime" class="form-control" id="name"
                                    placeholder="Opening Hours" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background:#ce1212">Save
                                changes</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
                        <!--End contact details form -->

                        <!--Update contact details form -->
                        @foreach ($contactInfo as $item)
                            <form action="{{ url('/contact-information-update/' . $item->id) }}" method="POST"
                                role="form" enctype="multipart/form-data" class="php-email-form p-3 p-md-4">
                                @csrf
                                <div class=" row">
                                    <div class="col-xl-6 form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            placeholder="Address" value="{{ $item->address }}" required>
                                    </div>
                                    <div class="col-xl-6 form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="contactEmail" id="email"
                                            placeholder="Your Email" value="{{ $item->contactEmail }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="number" class="form-control" name="phoneNumber" id="subject"
                                        placeholder="Phone number" value="{{ $item->phoneNumber }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Opening Hour</label>
                                    <input type="text" name="openingTime" class="form-control" id="name"
                                        placeholder="Opening Hours" value="{{ $item->openingTime }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary" style="background:#ce1212">Update
                                    Changes</button>
                        @endforeach
                        <!--End update contact details form -->

                        <hr>
                        <h3>Total feedback</h3>

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
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->message }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <!-- Error Notification -->
             


                    <div class="col-md-12">
                        <!-- Displaying Contact Data with Continuous Count -->


                        <!-- Pagination Links -->
                        {{ $data->links() }}

                    </div>

                </div>




            </div>
        </div>

    @endsection
