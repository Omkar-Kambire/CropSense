
<?php
session_start();
require_once "connection.php";

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
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
    <title>Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo.jpg">
    <link rel="stylesheet" href="css/font.css">
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      .dropdown{
        margin-right: 7vw; 
      }
        body{
            width: 100vw;
            height: 100vh;
            background-image: url("img/pic6.jpg");
            background-repeat: no-repeat;
            background-size: cover;

        }
        .container-xl{
          color: white;
            margin-top: 20vh;
            display: flex;
            justify-content: center;
            align-items: center;
             width: 35em; 
            padding: 25px;
            /* From https://css.glass */
background: rgba(255, 255, 255, 0);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(3.4px);
-webkit-backdrop-filter: blur(3.4px);
border: 1px solid rgba(255, 255, 255, 0.09);
        }
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
h3{
  font-weight:lighter;
  margin-bottom:2vh;
}

.btn-submit{
  padding: 10px;
  width: 7em;
  border-radius: 10px;
  border: 1px solid #89A76B;
  margin-left:30%;
}
.btn-submit:hover{
background-color: #89A76B;
color: white;
border: 1px solid #89A76B;
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
            <a class="nav-link" href="welcome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a href="contactus.php" class="nav-link">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="info.php">Crop Information</a>
          </li>
        </ul>
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person"></i> <?php echo " ".$_SESSION['username']?></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"> <i class="bi bi-person"></i> <?php echo " ".$_SESSION['username']." ";?> </a></li>
              <li><a class="dropdown-item" href="profile.php">Update Details</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout <i class="icon-signout"></i></a></li>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </nav> 


<div class="container-xl">
    <div class="container-lg">
        <form action="resultpage1.php" method="GET" >
         <h3>Welcome to NPK Analyser</h3>
                 <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">Nitrogen (N):</span>
              <input type="number" name="nitrogen"class="form-control" placeholder="Nitrogen" aria-label="Username" aria-describedby="basic-addon1" required maxlength="3">
        </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Phosphorous (P):</span>
                <input type="number" name="phosphorous" class="form-control" placeholder="Phophorous" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Potassium (K):</span>
                <input type="number" name="potassium" class="form-control" placeholder="Potassium" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">pH:</span>
                <input type="text" name="pH" class="form-control" placeholder="pH" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <input class="btn-submit" type="submit" value="Submit" id="submit" name="submit">
            </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>
</html>