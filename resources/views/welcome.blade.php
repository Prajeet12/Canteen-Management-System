<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg px-0 py-0 " style="background-color: #EF4037;" data-bs-theme="dark">
        <div class="container-fluid">
          <a href="{{ url('/') }}">
            <img src="{{ asset('Image/Logo.png') }}" class="img-fluid ms-4 mt-2" style="max-width: 200px" alt="...">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
          <div class="collapse navbar-collapse m-2 w-50" id="navbarNav">
            <ul class="navbar-nav ">
              <li class="nav-item {{ request()-> is('/') ? 'active' : ''}} ">
                <a class="nav-link p-3 fs-6 link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover"  href="{{ url('/') }}" style="font-family: Poppins" >Home</a>
              </li>
              <li class="nav-item {{ Request::is('/menu') ? 'active' : ''}}">
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
                </div>
            @endif
              
            </ul>
          </div>
        </div>
      </nav>

      
      <div id="carouselExampleCaptions" class="carousel slide ">
        
        <div class="carousel-inner">

 
          <div class="carousel-item active carousel-inner" style="font-family: Poppins">
            <div class="mask image-overlay" style="background-color: rgba(0, 0, 0, 0.897)"></div>
            <img src="{{ asset('Image/Canteen.jpg') }}" class="d-block w-100 h-20 " alt="...">
            <div class="image-overlay" style="background-color: black"></div>
            
            <div class="carousel-caption text-center row align-items-center fs-1 fw-bold fs-1 drop-shadow shadow-text"  style="margin-bottom: 6rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); ">
              <h1>Canteen Management System</h1>
              </div>
              <div class="carousel-caption text-center row align-items-center fs-6 shadow-text" style="margin-bottom: 3rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); ">
                <p>Some representative placeholder content for the first slide.</p>
              </div>
          </div>
        </div>
      </div>

      <div class="container text-center  pt-3">
        <div class="row">
          <div class="col align-self-center" style="color:#EF4037">
            <h1>Today Special</h1>
          </div>
        </div>
      </div>


      <div class="container pt-3 w-full">
        <div class="d-flex flex-row justify-content-around">
          <div class="card bg-red-200 w-full" style="width: 18rem;">
            <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body justify-content-evenly">
              <h5 class="card-title">Card </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        
        <div class="d-flex flex-row justify-content-around mt-2">
          <div class="card bg-red-200 w-full" style="width: 18rem;">
            <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body justify-content-evenly">
              <h5 class="card-title">Card </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>    
        </div>
      </div>
      
      <div class="container text-center  pt-3">
        <div class="row">
          <div class="col align-self-center" style="color: #EF4037">
            <h1>Breakfast</h1>
          </div>
        </div>
      </div>
      <div class="d-flex flex-row justify-content-around mt-2">
        <div class="card bg-red-200 w-full" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body justify-content-evenly">
            <h5 class="card-title">Card </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="container text-center  pt-3">
        <div class="row">
          <div class="col align-self-center" style="color:#EF4037">
            <h1>Lunch</h1>
          </div>
        </div>
      </div>

      <div class="d-flex flex-row justify-content-around mt-2">
        <div class="card bg-red-200 w-full" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body justify-content-evenly">
            <h5 class="card-title">Card </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>

     
      <div class="container text-center w-100 pt-3">
        <div class="row">
          <div class="col align-self-center  w-100" style="color:#EF4037">
            <h1>Drinks</h1>
          </div>
        </div>
      </div>

      <div class="d-flex flex-row justify-content-around mt-2">
        <div class="card bg-red-200 w-full" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body justify-content-evenly">
            <h5 class="card-title">Card </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('Image/Home.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      

      
      
    </div>
      

      
    <footer class=" text-white text-center py-3" style="background-color: #EF4037;" data-bs-theme="light">
      <div class="container">
        <div class="row">
          <div class="col-md-8 justify-content-center">
            <p>&copy; 2023 Canteen Management System. All rights reserved.</p>
          </div>
          
        </div>
      </div>
    </footer>

  </body>
</html>

