@extends('admin.adminhome')

@section('content')
    <div class="content-wrapper">
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

        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="background:#ce1212">
            Add Photos
        </button>
        
        





    </div>
    

    <!--Form-->
    <div class="row pt-3">



    </div>

    </div>
    </div>

@endsection
