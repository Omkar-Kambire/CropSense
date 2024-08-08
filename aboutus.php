<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="img/logo.jpg">
    <link rel="stylesheet" href="css/font.css">
    <style>
      *{
        margin: 0;
        padding: 0;
      }
       main{
            margin-top: 10vh;
            width: auto;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding:10px;
       }
       h1{
          font-weight: lighter;
       }
       p{
        margin-right: 25px;
        text-align: justify;
       }

       .dropdown{
        
        margin-right: 7vw;
       }

        .container1{
            width: 700px;
            height: auto;
        }

        .container2{
            margin-top: 5%;
            width: auto;
            height: auto;
        }

        img{
            border-radius: 10px;
            width: 100%;
            object-fit: contain;
        }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-xxl" aria-label="Seventh navbar example" style="background-color: #c4e8c2;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CRS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleXxl">
        <ul class="navbar-nav me-auto mb-2 mb-xl-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="welcome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="info.php">Crop Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact Us</a>
          </li>
        </ul>
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person"></i> <?php echo " ".$_SESSION['username']?></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"> <i class="bi bi-person"></i> <?php echo " ".$_SESSION['username']." ";?> </a></li>
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout <i class="icon-signout"></i></a></li>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </nav> 

<main>
        <div class="container1"><br><br>
        <h1>About Us</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tempora repellendus aspernatur, culpa natus iste quaerat soluta consectetur eaque! Perspiciatis repellendus itaque nesciunt sint, accusamus facilis ducimus rem vero nostrum quibusdam. Earum adipisci aspernatur, consectetur cum sed quibusdam esse, unde perspiciatis fuga reprehenderit repellat expedita?</p>
        
       
       </div>
       <div class="container2">
            <img src="img/aboutpageimg.jpg" alt="">
       </div>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  </body>
</html>
