<?php
session_start();
require_once "connection.php";
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
$id = $_SESSION['id'];

$sql = "SELECT name, email, address, phone_num, gender FROM users WHERE user_id = '$id'";

$result = mysqli_query($conn, $sql);
// Find the number of records returned
$num = mysqli_num_rows($result);

if ($num == 1) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['name'] = $row['name'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['address'] = $row['address'];
  $_SESSION['phonenum'] = $row['phone_num'];
  $_SESSION['gender'] = $row['gender'];
} else {
  echo "no data found";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
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


    h3 {
      text-align: center;
      font-weight: lighter;

    }

    body {
      height: 100vh;
      width: 100vw;
      background: #fafafa;
    }

    .container {
      width: 40vw;
      margin-top: 8vh;

    }

    .new {
      color: white;
    }

    .container2 {
      padding: 2.5%;
      border-radius: 20px;
      background-color: #f9f9f9;
      box-shadow: -8px -2px 118px -13px rgba(0, 0, 0, 0.51);
      -webkit-box-shadow: -8px -2px 118px -13px rgba(0, 0, 0, 0.51);
      -moz-box-shadow: -8px -2px 118px -13px rgba(0, 0, 0, 0.51);

    }

    .h {
      margin-top: 20px;
    }

    img {
      margin-left: 10px;
      border-radius: 50%;
      object-fit: contain;
      width: 35%;
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
            <a href="info.php" class="nav-link">Crop Information</a>
          </li>
          <li class="nav-item">
            <a href="contactus.php" class="nav-link">Contact Us</a>
          </li>
          <li class="nav-item">
            <a href="aboutus.php" class="nav-link">About us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">

    <div class="container2">
      <a href="verifypassword.php" class="btn btn-outline-primary">Edit <i class="bi bi-pencil-square"></i></a>
      <h3> User Details </h3><br>

      <img src="img/profilepic.jpg" class="rounded mx-auto d-block" alt="..."><br>

      <strong>
        <h5 class="h">Name :
      </strong><?php echo $_SESSION['name']; ?> </h3>
      <hr class="divider">
      <strong>
        <h5>Email :
      </strong> <?php echo $_SESSION['email']; ?> </h3>
      <hr class="divider">
      <strong>
        <h5>Gender :
      </strong><?php echo $_SESSION['gender']; ?> </h3>
      <hr class="divider">
      <strong>
        <h5>Phone Number :
      </strong><?php echo $_SESSION['phonenum']; ?> </h3>
      <hr class="divider">
      <strong>
        <h5>Address :
      </strong><?php echo $_SESSION['address']; ?> </h3>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>