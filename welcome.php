<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="img/logo.jpg">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font.css">
  <style>


    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .dropdown {
      margin-right: 5%;
      /* color: #f8f8f8; */
    }

    body {
      width: 100vw;
      height: 100vh;
      background-color: #aecfa4;
    }

    .container {
      width: auto;
      height: auto;
      margin: 7vh 13vw 10vh 13vw;
      /* margin-top: 5vh;
      margin-left: $argv; */
      padding: 10px;
    }

    .container2 {
      margin: auto;
      width: 70em;
    }

    img {
      border-radius: 10px;
      height: 34em;
      width: auto;
    }

    .btn {
      background: #d9c634;
      background-image: -webkit-linear-gradient(top, #d9c634, #b87d2b);
      background-image: -moz-linear-gradient(top, #d9c634, #b87d2b);
      background-image: -ms-linear-gradient(top, #d9c634, #b87d2b);
      background-image: -o-linear-gradient(top, #d9c634, #b87d2b);
      background-image: linear-gradient(to bottom, #d9c634, #b87d2b);
      -webkit-border-radius: 28;
      -moz-border-radius: 28;
      border-radius: 28px;
      color: #ffffff;
      font-size: 15px;
      padding: 10px 20px 10px 20px;
      text-decoration: none;
    }

    .btn:hover {
      background: #fa723c;
      background-image: -webkit-linear-gradient(top, #fa723c, #d99434);
      background-image: -moz-linear-gradient(top, #fa723c, #d99434);
      background-image: -ms-linear-gradient(top, #fa723c, #d99434);
      background-image: -o-linear-gradient(top, #fa723c, #d99434);
      background-image: linear-gradient(to bottom, #fa723c, #d99434);
      text-decoration: none;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-xxl" data-bs-theme="dark" aria-label="Seventh navbar example" style="background-color: #c4e8c2;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CRS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleXxl">
        <ul class="navbar-nav me-auto mb-2 mb-xl-0">
          <li class="nav-item">
            <a href="weatherinfo.php" class="nav-link ">Weather Information</a>
          </li>
          <li class="nav-item">
            <a href="yieldcalculator.php" class="nav-link">Yield Calculator</a>
          </li>
          <li class="nav-item">
            <a href="https://rates.goldenchennai.com/vegetable-price/maharashtra-vegetable-price-today/" class="nav-link">Commodity Prices</a>
          </li>
          <li class="nav-item">
            <a href="fertilizers.php" class="nav-link">Fertilizers Information</a>
          </li>
          <li class="nav-item">
            <a href="soilinfo.php" class="nav-link">Soil Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a href="contactus.php" class="nav-link">Contact Us</a>
          </li>
        </ul>
        <div class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person"></i> <?php echo " " . $_SESSION['username'] ?></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"> <i class="bi bi-person"></i> <?php echo " " . $_SESSION['username'] . " "; ?> </a></li>
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout <i class="icon-signout"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </nav>
  <!-- Carousel -->
  <div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/agri13.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5> To get some crop recommendations</h5>
            <p>Use our crop recommendation system </p>
            <a href="mainpage.php" class="btn btn-warning" role="button"> Continue </a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/agri12.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Want to know more about crops</h5>
            <p>Visit the official website of ministry of agriculture</p>
            <a href="https://agricoop.nic.in/#gsc.tab=0" target="_blank" class="btn btn-secondary btn-md" role="button"> Continue </a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/agri3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Get the ideal nutrients for your crop</h5>
            <p>Check out the information</p>
            <a href="info.php" class="btn" role="button"> Continue </a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>