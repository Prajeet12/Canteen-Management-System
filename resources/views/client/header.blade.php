<header id="header" class="header fixed-top d-flex align-items-center shadow-sm p-3 mb-5 bg-white rounded">
    
    <div class="container d-flex align-items-center justify-content-around">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('client.home') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>
        </a>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <!-- Navbar content -->

        </nav>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <!-- Navbar content -->
        </nav>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <!-- Navbar content -->
        </nav>


        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="nav-item ">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/order') }}"
                                class="font-semibold p-3 fs-6 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn-book-a-table" style="font-family: Poppins">Log in</a>
                            {{-- <li class="nav-item">
                      @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="nav-link p-3 fs-6 text-white link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" style="font-family: Poppins">Register</a>
                  @endif
                    </li> --}}


                        @endauth
                    @endif
                </li>
            </ul>
        </nav><!-- .navbar -->


        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
