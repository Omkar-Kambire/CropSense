<?php
require_once "connection.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real-Time Weather</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="img/logo.jpg">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/font.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    h3 h1 {
      font-weight: lighter;
    }
  </style>
</head>

<!-- website name geoapify -->
<!-- api accound email  cijocat147@pubpng.com -->
<!--api account password Cijocat@147 -->

<body>
  <nav class="navbar navbar-expand-xxl " aria-label="Seventh navbar example" style="background-color: #c4e8c2;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CRS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleXxl">
        <ul class="navbar-nav me-auto mb-2 mb-xl-0">
          <li class="nav-item">
            <a class="nav-link" href="welcome.php">Home</a>
          </li>
          <li class="nav-item">
            <a href="yieldcalculator.php" class="nav-link">Yield Calculator</a>
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
  <main>
    <div class="container">
      <div class="search-container">

        <h3 id="divp">Weather Information</h3>

        <p id="divp">Check for Weather Information</p>

        <div class="row">

          <div class="col-9">
            <input class="form-control me-2" type="search" id="city" placeholder="Search for city weather" aria-label="Search">
          </div>
          <div class="col-3">
            <button class="btn btn-outline-info" id="search-btn" name="btn11" type="submit">Search</button>
          </div>
        </div>

      </div>
      <div class="weather-container">
        <img class="weather-icon" id="weather-icon" src="" alt="Weather Icon">
        <div class="weather-info">
          <h1 id="city-name"></h1>
          <p id="temperature"></p>
          <p id="conditions" name="conditions"></p>
          <p id="wind"></p>
          <p id="humidity"></p>
        </div>
      </div>
      <div class="error" id="error"></div>
    </div>


    <div class="forecast" id="forecast">
      <!-- cards -->
      <div class="card">
        <div class="card-body">
          <img alt="" class="weather-icon" id="icon">
          <div id="disp-info">
            <h5 id="weekday1"></h5>
            <p class="weatherdsc" id="temperature1"></p>
            <p class="weatherdsc" id="desc1"></p>
            <p class="weatherdsc" id="wind1"></p>
            <p class="weatherdsc" id="humidity1"></p>
          </div>
        </div>
      </div>


      <div class="card">
        <div class="card-body">
          <img alt="" class="weather-icon" id="icon2">
          <div id="disp-info">
            <h5 id="weekday2"></h5>
            <p class="weatherdsc" id="temperature2"></p>
            <p class="weatherdsc" id="desc2"></p>
            <p class="weatherdsc" id="wind2"></p>
            <p class="weatherdsc" id="humidity2"></p>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <img alt="" class="weather-icon" id="icon3">
          <div id="disp-info">
            <h5 id="weekday3"></h5>
            <p class="weatherdsc" id="temperature3"></p>
            <p class="weatherdsc" id="desc3"></p>
            <p class="weatherdsc" id="wind3"></p>
            <p class="weatherdsc" id="humidity3"></p>
          </div>
        </div>
      </div>


      <div class="card">
        <div class="card-body">
          <img alt="" class="weather-icon" id="icon4">
          <div id="disp-info">
            <h5 id="weekday4"></h5>
            <p class="weatherdsc" id="temperature4"></p>
            <p class="weatherdsc" id="desc4"></p>
            <p class="weatherdsc" id="wind4"></p>
            <p class="weatherdsc" id="humidity4"></p>
          </div>
        </div>
      </div>


      <div class="card">
        <div class="card-body">
          <img alt="" class="weather-icon" id="icon5">
          <div id="disp-info">
            <h5 id="weekday5"></h5>
            <p class="weatherdsc" id="temperature5"></p>
            <p class="weatherdsc" id="desc5"></p>
            <p class="weatherdsc" id="wind5"></p>
            <p class="weatherdsc" id="humidity5"></p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>

  <script src="js/weather2.js"></script>
  <!-- <script src="js/weather_fore2.js"></script> -->
  <script src="js/app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>