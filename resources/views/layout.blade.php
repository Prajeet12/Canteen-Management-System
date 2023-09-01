<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('.')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg px-0 py-0 " style="background-color: #EF4037;" data-bs-theme="light">
        <div class="container-fluid">
          <a href="{{ url('/menu') }}">
            <img src="{{ asset('Image/Logo.png') }}" class="img-fluid ms-4 mt-2" style="max-width: 200px" alt="...">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
          <div class="collapse navbar-collapse m-2 w-50" id="navbarNav">
            <ul class="navbar-nav ">

              {{-- <li>
                <a href="{{ url('/') }}"
                    class="block py-2 pl-3 pr-4 {{ Route::currentRouteName() == '/' ? 'text-teal-500' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent">Home</a>
            </li> --}}

              <li class="nav-item {{ '/' == request()->path() ? 'active':''}}">
                <a class="nav-link p-3 fs-6  link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover"  href="{{ url('/') }}" style="font-family: Poppins" >Home</a>
              </li>

              <li class="nav-item {{ 'menu' == request()->path() ? 'active':''}} ">
                <a class=" nav-link p-3 fs-6 text-white link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" href="{{ url('/menu') }}" style="font-family: Poppins color: $gray-100">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-3 fs-6 text-white link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" href="#" style="font-family: Poppins">Contact Us</a>
              </li>
              <li class="nav-item ">
                @if (Route::has('login'))
                
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold p-3 fs-6 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link p-3 fs-6 text-white link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" style="font-family: Poppins">Log in</a>
                        {{-- <li class="nav-item">
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link p-3 fs-6 text-white link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" style="font-family: Poppins">Register</a>
                        @endif
                          </li> --}}
              </li>
                        
                    @endauth
                
            @endif
              
            </ul>
          </div>
        </div>
      </nav>
      <div>
        @yield('content')
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html> 