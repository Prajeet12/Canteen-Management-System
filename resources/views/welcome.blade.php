<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg " style="background-color: #26647C;" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Canteen Management System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              <li class="nav-item">
                @if (Route::has('login'))
                
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        <li class="nav-item">
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link" >Register</a>
                        @endif
                          </li>
                        
                    @endauth
                </div>
            @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>

      

      <div id="carouselExampleCaptions" class="carousel slide">
        
        <div class="carousel-inner">
            
          <div class="carousel-item active">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.897)"></div>
            <img src="{{ asset('Image/canteen.jpg') }}" class="d-block w-100 h-20" alt="...">
            
            <div class="carousel-caption d-none d-md-block align-content-lg-start text-left">
              <h1>Canteen Management System</h1>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <h1>Menu</h1>
      </div>
      <div class="container text-center justify-content-lg-around">
        <div class="row align-items-start justify-content-evenly ">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1>Rs. 200 </h1>
                    <h3> Chicken Mo:Mo</h3>
                 
                </div>
              </div>
        </div>
      </div>
      <div>
        <h1>Breakfast</h1>
      </div>
      <div class="container text-center justify-content-lg-around">
        <div class="row align-items-start justify-content-evenly ">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1>Rs. 200 </h1>
                    <h3> Chicken Mo:Mo</h3>
                 
                </div>
              </div>
        </div>
      </div>

      <div>
        <h1>Lunch</h1>
      </div>
      <div class="container text-center justify-content-lg-around">
        <div class="row align-items-start justify-content-evenly ">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1>Rs. 200 </h1>
                    <h3> Chicken Mo:Mo</h3>
                 
                </div>
              </div>
        </div>
      </div>

      <div>
        <h1>Drinks</h1>
      </div>
      <div class="container text-center justify-content-lg-around">
        <div class="row align-items-start justify-content-evenly ">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('Image/canteen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1>Rs. 200 </h1>
                    <h3> Chicken Mo:Mo</h3>
                 
                </div>
              </div>
        </div>
      </div>
      

      
      
    </div>

  </body>
</html>

