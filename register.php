<?php
require_once "connection.php";

//check if the user is already registered or not.
function register($conn){
  $user = trim($_POST['username']);
  $pass = trim($_POST['password']);
  $cpass = trim($_POST['confirmpassword']);
  $phonenum = trim($_POST['phonenum']);
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $gender = trim($_POST['gender']);
  $address = trim($_POST['address']);

  $select = "SELECT username FROM users WHERE username = '$user'";
  $result = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($result);
  if ($row > 0) {
    echo '<script>alert("Username is already taken !")</script>';
  } else {
    if (strlen($phonenum) == 10) {
      if ($pass == $cpass) {
        if (strlen($pass) > 5) {
          $salt = rand();
          $parampass = crypt($pass, $salt);
          $insert = "INSERT INTO users (username, name, email, gender, phone_num, password, address) VALUES('$user','$name', '$email', '$gender',$phonenum,'$parampass', '$address')";
          $res = mysqli_query($conn, $insert);
          if ($res) {
            header("Location: login.php");
          }
        } else {
          echo '<script>alert("Password must be atleast 5 characters")</script>';
        }
      } else {
        echo '<script>alert("Passwords do not match")</script>';
      }
    } else {
      echo '<script>alert("Phone Number must be 10 digits")</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/logo.jpg">
  <link rel="stylesheet" href="css/font.css">
  <style>
    * {
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

    body {
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container p {
      text-align: center;

    }

    a {
      text-decoration: none;

    }
  </style>

</head>

<body>

  <div class="container">
    <h3>Sign-Up</h3><br>
    <form class="row g-3" id="f1" action="" method="POST">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter your Name" id="name" name="name" required autocomplete="off">
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Username</label>
        <input type="text" class="form-control" placeholder="Enter your Username" id="username" name="username" required autocomplete="off">
      </div>
      <div class="col-md-8">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email" required autocomplete="off">
      </div>
      <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Phone Number</label>
        <input type="number" class="form-control" id="phonenum" placeholder="Enter your Phone Number" name="phonenum" required autocomplete="off">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">Gender</label>
        <select id="gender" class="form-select" name="gender">
          <!-- <option selected>Choose...</option> -->
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="col-md-8">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="Address" placeholder="1234 Main St" name="address" autocomplete="off">
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="pass" placeholder="Enter your Password" name="password" required>
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label"> Confirm Password</label>
        <input type="password" class="form-control" id="cpass" placeholder="Re-enter the Password" name="confirmpassword" required>
      </div>

      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Agree terms and conditons
          </label>
        </div>
      </div>
      <div class="col-12">
        <button type="submit" name="submit" class="btn btn-outline-primary" id="submit">Sign Up</button>
     <?php 
     if(isset($_POST['submit'])){
      register($conn);
     }
     ?> 

      </div>
      <p>Already Have Account? <a href="login.php">Login</a></p>
    </form>
  </div>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>