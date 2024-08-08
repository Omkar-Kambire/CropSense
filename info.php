
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
  <title>Crop Information</title>
  <link rel="icon" type="image/png" href="img/logo.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="css/font.css">
  
  <style>
    *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body{
      width: 100vw;
      height: 100vh;
    }
.container{
  margin-top:5vh;
}
    h2{
      font-weight: lighter;   
    }
    .dropdown{
        margin-right: 7vw; 
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
  <div class="container">
  <h2> The ideal nutrients for crops : </h2>
  <table class="table table-bordered table-responsive-xxl">
  <thead>
   <tr>
    <th scope="col">Crop Name</th>
    <th scope="col">Nitrogen</th>
    <th scope="col">Phosphorus</th>
    <th scope="col">Potassium</th>
    <th scope="col">pH</th>
   </tr>
  </thead>
  <tbody>
    <tr>
      <td>Wheat</td>
      <td>80</td>
      <td>40</td>
      <td>40</td>
      <td>6-7</td>
    </tr>
    <tr>
      <td>Jowar</td>
      <td>80</td>
      <td>40</td>
      <td>40</td>
      <td>6-7.5</td>
    </tr>
    <tr>
      <td>Rice</td>
      <td>90</td>
      <td>60</td>
      <td>30</td>
      <td>5.5</td>
    </tr>
    <tr>
      <td>Bajra</td>
      <td>90</td>
      <td>45</td>
      <td>40</td>
      <td>5-6</td>
    </tr>
    <tr>
      <td>Tur</td>
      <td>30</td>
      <td>50</td>
      <td>30</td>
      <td>6.5-7.5</td>
    </tr>
    <tr>
      <td>Mung</td>
      <td>20</td>
      <td>40</td>
      <td>20</td>
      <td>6.3-7.2</td>
    </tr>
    <tr>
      <td>Urad</td>
      <td>20</td>
      <td>40</td>
      <td>40</td>
      <td>6.5-7.8</td>
    </tr>
    <tr>
      <td>Gram</td>
      <td>20</td>
      <td>40</td>
      <td>40</td>
      <td>5.5-7</td>
    </tr>
    <tr>
      <td>Cassava</td>
      <td>17</td>
      <td>17</td>
      <td>17</td>
      <td>4.5-6.5</td>
    </tr>
    <tr>
      <td>Maize</td>
      <td>135</td>
      <td>62.5</td>
      <td>50</td>
      <td>5.8-6</td>
    </tr>
    <tr>
      <td>Soybean</td>
      <td>25</td>
      <td>60</td>
      <td>40</td>
      <td>6</td>
    </tr>
    <tr>
      <td>Potato</td>
      <td>125</td>
      <td>150</td>
      <td>75</td>
      <td>6-6.5</td>
    </tr>
    <tr>
      <td>Yam</td>
      <td>128</td>
      <td>17</td>
      <td>162</td>
      <td>5.5-6.5</td>
    </tr>
  </tbody>
</table>
<p>Note: The above figures are in KG/ha</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>