@extends('layout')


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    
    @section('content')
    


      
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
    @endsection('content')
  </body>
</html>

