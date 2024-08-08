<?php 
session_start();
require_once"connection.php";

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
 }
 
$user = $_SESSION['username'];
$fetch = "SELECT * FROM users WHERE username = '$user'";
$result = mysqli_query($conn, $fetch);
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Your Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="img/logo.jpg">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        body{
            width: 100vw;
            height: 100vh;
         
        }
        main{
          display: flex;
          justify-content: center;
          align-items: center;
        }
        h3{
          margin-bottom: 10px;
        }
        h4{
          margin-bottom: 16px;
        }
        .area{
          margin-top: 10%;
          width: 800px;
          border-radius: 30px 40px 40px 30px;
          -webkit-box-shadow: -1px 14px 29px -2px rgba(122,117,122,0.78);
        -moz-box-shadow: -1px 14px 29px -2px rgba(122,117,122,0.78);
        box-shadow: -1px 14px 29px -2px rgba(122,117,122,0.78);
          padding: 35px;
        }

        .btn{
          margin-top: 10px; 
          margin-left: 80%;
        }
        a{
          font-size: 30px;
          text-decoration: none;
          color: black;
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
            <a href="welcome.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a href="contactus.php" class="nav-link">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   
  <main>


        <div class="area">
        
            <form action="" method="POST">
            <?php 
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
         //fetch data from the form
      
         function update_user($conn, $row) {
         $name = $_POST['name'];
         $username = $_POST['username'];
         $email = $_POST['email'];
         $phonenum = $_POST['phonenum'];
         $address = $_POST['address'];
         $id = $row['user_id'];
         $update = "UPDATE users SET name = '$name', username = '$username', email = '$email' ,phone_num = '$phonenum' ,address = '$address' WHERE user_id =  '$id'  ";
         $res = mysqli_query($conn, $update);
         if($res){
          $alrt='<script>alert("Updated Successfully!")</script>';
          echo $alrt;
          if($alrt){
           $redirect='<script>window.location.href="profile.php"</script>';
           echo $redirect;
          }
         }
       }
      }
       ?>
       
              <h3>Update Your Details</h3>
              <h4>Edit your details as per your requirement</h4>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                  <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                  <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                  <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
                  <input type="number" class="form-control" name="phonenum" value="<?php echo $row['phone_num'] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>        
               <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                  <input type="text" class="form-control" name="address" value="<?php echo $row['Address'] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                
                <button type="submit" class="btn btn-outline-primary btn-lg " name="submit" onclick="f1();">Submit</button>
                <?php
                if(isset($_POST['submit'])){
                update_user($conn, $row);
                }
                ?>
            </form>
        </div>

  </main>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>
</html>