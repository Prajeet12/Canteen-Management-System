<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav">
        {{-- <div class="shrink-0 flex items-center">
        <a href="{{ route('home') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div> --}}

        <li class="nav-item">
            <a class="nav-link" href="{{ url('home') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        {{-- <li class="nav-item">
      <a class="nav-link" href="{{url('/foodmenu')}}">
        <span class="menu-title">Food Menu</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li> --}}
        <li class="nav-item">


        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/category') }}">
                <span class="menu-title">Category</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/aboutus') }}">
                <span class="menu-title">About Us</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/menu') }}">
                <span class="menu-title">Menu</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/order')}}">
                <span class="menu-title">Order List</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Order History</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/gallery')}}">
                <span class="menu-title">Gallery</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/menu') }}">
                <span class="menu-title">Feedback</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>


    </ul>
</nav>
