<?php
session_start();
require_once"connection.php";
$nitrogen = $_GET['nitrogen'];
$phosphorous = $_GET['phosphorous'];
$potassium = $_GET['potassium'];
$ph = $_GET['pH'];
$select = "SELECT * FROM soilstatus WHERE Nitrogen = '$nitrogen' AND Phosphorus = '$phosphorous' AND Potassium = '$potassium' OR pH = '$ph'";
//$select ="SELECT * FROM soilstatus";
$res = mysqli_query($conn, $select);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo.jpg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&family=Inter+Tight:wght@100&display=swap');
        *{
            font-family: Times;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            width: 100vw;
            height: 100vh;

        }
        .container{
            margin-top:10%;
        }
        .col, .row1{
            text-align: center;
        }

        .dropdown
        {
            margin-right: 5vw;
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
<div class="container">
    <h3>The result based on your input:</h3><br><br>
<table class="table table-hover table-bordered">
<thead>
  <tr>
    <th class="col" scope="col">Crop Name</th>
    <th class="col" scope="col">Nitrogen</th>
    <th class="col" scope="col">Phosphorus</th>
    <th class="col" scope="col">Potassium</th>
    <th class="col" scope="col">pH</th>
  </tr>
</thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
              $rowcount = mysqli_num_rows($res);
                  
              if($rowcount == 0){
                echo'<script>alert("Please Enter the data properly");</script>';
              }
          
              
                // LOOP TILL END OF DATA
                while($rows = $res -> fetch_assoc())
                {
                  $rec = $rows['CropName'];
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td class="row1"><?php echo $rows['CropName'];?></td>
                <td class="row1"><?php echo $rows['Nitrogen'];?></td>
                <td class="row1"><?php echo $rows['Phosphorus']; ?></td>
                <td class="row1"><?php echo $rows['Potassium'];?></td>
                <td class="row1"><?php echo $rows['pH'];?></td>
            </tr>
            <?php
                }                
                
              if(strlen($rec) == 0)  
              {
                echo'<script>alert("Please Enter the Data Properly!")</script>';

               }
              
              else {
                $update = "UPDATE soilstatus SET suggest_count = suggest_count + 1 WHERE CropName = '$rec'";
              $result = mysqli_query($conn,$update);
              }
             
              
            ?>
            
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>