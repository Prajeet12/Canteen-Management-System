<nav class="sidebar sidebar-offcanvas" id="sidebar">
                    
  <ul class="nav">
    {{-- <div class="shrink-0 flex items-center">
        <a href="{{ route('home') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div> --}}
 
    <li class="nav-item">
      <a class="nav-link" href="{{url('home')}}">
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
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Menu List</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/foodmenu')}}">Today's Special</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/breakfastmenu')}}">Breakfast</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Lunch</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Drinks</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/forms/basic_elements.html">
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
      <a class="nav-link" href="pages/tables/basic-table.html">
        <span class="menu-title">Tables</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>
    
    
  </ul>
</nav>