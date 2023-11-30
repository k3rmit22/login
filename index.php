<?php

$is_invalid =false;

if ($_SERVER["REQUEST_METHOD"] ==="POST"){

    $mysqli= require __DIR__ ."/database.php";

    $sql =sprintf("SELECT * FROM user 
    WHERE email ='%s'", 
    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user= $result->fetch_assoc();

   if ($user) { 

    if(password_verify($_POST["password"],$user["password_hash"])) {
        
        session_start();

        session_regenerate_id();

        $_SESSION["user_id"]= $user["id"];

        header(""); // D ko pa alam process dito 
        exit;
    }   
              
    }
    $is_invalid=true;

   }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="..." crossorigin="anonymous">

    <title>Welcome</title>
</head>
<body >
  
  <!-- header-->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./images/icon.png" alt="" style="width: 15; height: 60px; padding-left: 70px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="service.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="smf_info.html">About</a>
            </li>
          </ul>
          <div class="text-center">
            <button onclick="window.location.href='/login.php'" type="button" class="btn btn-outline-success me-2 fw-bolder">Login</button>
            <button onclick="window.location.href='/signup.html'" type="button" class="btn btn-outline-success fw-bolder">Sign-up</button>

          </div>
        </div>
      </div>
    </nav>
<!-- carousel-->
  <style>
    .c-item {
height: 500px;
}

.c-img {
height: 100%;
object-fit: cover;
filter: brightness(0.6);
}

        /* Add your custom styles here */
        body {
            font-family: 'Roboto', sans-serif; 
        }

</style>
<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="./images/sadboi.jpg" class="d-block w-100 c-img" alt="Slide 1">
        <div class="carousel-caption top-0 mt-5">
          <h1 class="display-1 fw-bolder text-capitalize">Supply My friend</h1>
          <p class="text-uppercase fs-3 mt-5">One of the Leading Supplier </p>
          <button onclick="window.location.href='smf_info.html'" class="btn btn-success px-4 py-2 fs-5 mt-5" data-bs-target="#modal" data-bs-toggle="modal">View</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="./images/adobe.jpg" class="d-block w-100 c-img" alt="Slide 2">
        <div class="carousel-caption top-0 mt-5">
          <p class="display-1 fw-bolder text-capitalize"> SMF TEAM</p>
          <p class="text-uppercase fs-3 mt-5"> view the developers of Supply My Friend Portal</p>
          <button class="btn btn-success px-4 py-2 fs-5 mt-5" data-bs-toggle="modal"
            data-bs-target="#booking-modal">View</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="./images/Factory-of-the-Future-2.jpg" class="d-block w-100 c-img" alt="Slide 3">
        <div class="carousel-caption top-0 mt-5">
          <p class="text-uppercase fs-3 mt-5">We Ensures Quality of Products</p>
          <p class="display-1 fw-bolder text-capitalize"> Become Our Partner</p>
          <button class="btn btn-success px-4 py-2 fs-5 mt-5" data-bs-toggle="modal"
            data-bs-target="#booking-modal">Contact us</button>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


<!--affi-->

          <div class="container mt-5">
            <div class="p-5 text-center border border-success bg-light-subtle rounded-3">
              <div class="container col-xxl-8 px-4 ">
                <div class="row flex-lg-row-reverse justify-content-center align-items-center g-5 py-5">
                  <div class="col-10 col-sm-8 col-lg-6">
                    <img src="./images/AFI-removebg-preview.png" class="img-fluid mx-auto" alt="Responsive Image">
                  </div>
                  <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Our Affiliation</h1>
                    <p class="lead">Be part of our distribution network to ensure products in your store are timely stocked and new.</p>
                    <button class="btn btn-outline-success btn-md mb-3 rounded-pill" type="button">
                      Learn More
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--mission/vision-->           
          <div class="container px-4 py-5">
            <div class="row row-cols-1 row-cols-md-2 g-5">
              <div class="col">
                <div class="container px-4">
                  <h2 class="fw-bold">Mission</h2>
                  <p>-Enhance B2B transactions by providing an efficient Supplier Portal that fosters seamless collaboration and growth for businesses.</p>
                </div>
              </div>
              <div class="col">
                <div class="container px-4">
                  <h2 class="fw-bold">Vision</h2>
                  <p>-To be the go-to platform that transforms the B2B landscape, connecting businesses effortlessly and setting new standards for efficiency and innovation.</p>
                </div>
              </div>
            </div>
          </div>
          
              <!--company--> 
              <div class="container ">
                <div class="row border-top pb-2">
                 
<div class="col-md-6">
  <div class="container px-4">
    <p class="fw-bold small"><i class=""></i> Supply My Friend</p>
    <p class="small"><i class="fas fa-phone"></i> 09122334455</p>
    <p class="small"><i class="fas fa-phone"></i> 09667788999</p>
    <p class="small"><i class="fas fa-envelope"></i> SMF@gmail.com</p>
    <p class="small"><i class="fas fa-map-marker-alt"></i> 123 Camarin Caloocan City</p>
  </div>
</div>

<!-- Second Column -->
<div class="col-md-6">
  <div class="container px-4">
    <h6 class="fw-bold small" >Office Hours</h6>
    <Monday-Friday class="small">Monday-Friday 8:00 AM - 5:00</p>
    <h6 class="fw-bold small">Customer Service</h6>
    <p class="small">Monday-Friday 8:00 AM - 5:00</p>
    <p class="small">Saturday 8:30 AM - 12:00 PM</p>
    <p class="small">Closed Sunday</p>
  </div>
</div>

                </div>
              </div>
<!-- POTER-->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
          <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
          </a>
          <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2023 TRES</span>
      </div>

  </footer>
</div>


            
              
              
       


  
</body>
</html>