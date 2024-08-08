<?php
//This script will handle login
require_once "connection.php";
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
  header("location: welcome.php");
  exit;
}

function login($conn)
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if the user has registered or not
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $check = "SELECT user_id, username,password FROM users WHERE username = '$username'";
    $result = $conn->query($check);
    $row = mysqli_fetch_assoc($result);
    $hashed_password =  $row['password'];
    $id = $row['user_id'];
    if (mysqli_num_rows($result) > 0) 
    {
      $verify = hash_equals($hashed_password, crypt($password, $hashed_password));
      if ($verify) 
      {
        $select = "SELECT * FROM user_activity WHERE id= $id";
        $res = $conn->query($select);
        // print_r($res);
        if (mysqli_num_rows($res) == 0) 
        {
          $insert = "INSERT INTO user_activity (id,username,last_activity) VALUES ($id,'$username',now())";
          $send = $conn->query($insert);
        } 
        else 
        {
          $update = "UPDATE user_activity SET last_activity=now() , id=$id, username='$username' WHERE id=$id";
          $result2 = $conn->query($update);
        }
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $id;
        $_SESSION["loggedin"] = true;
        header("Location: welcome.php");
      } 
      else 
      {
        $alert = '<script>alert("Password do not match")</script>';
        echo $alert;
      }
    } 
    else 
    {
      $alert = '<script>alert("You are not registered to our system")</script>';
      echo $alert;
      if ($alert) 
      {
        $redirect = '<script>window.location.href="register.php";</script>';
        echo $redirect;
      }
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="img/logo.jpg">
  <title>Sign In</title>
  <link rel="stylesheet" href="css/font.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Times;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #fafafa;
    }

    .container {
      background-color: #f6f6f6;
      border-radius: 20px;
      width: 500px;
      box-shadow: 0px 0px 223px -29px rgba(0, 0, 0, 0.6);
      -webkit-box-shadow: 0px 0px 223px -29px rgba(0, 0, 0, 0.6);
      -moz-box-shadow: 0px 0px 223px -29px rgba(0, 0, 0, 0.6);
    }

    .container form {
      padding: 20px;
    }

    h1,
    h3 {
      font-weight: lighter;
    }

    .text-muted {
      text-align: center;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container2">

  </div>
  <div class="container">
    <form action="" method="POST">
      <h1>Sign-In Page</h1><br>
      <h3 class="h3 mb-3 fw-normal">Please sign in</h3><br>

      <div class="form-floating">
        <input type="text" name="username" class="form-control" autocomplete="off" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Username</label>
      </div><br>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>
      <br>
      <div class="form-check">
        <input class="form-check-input" name="checkbox" type="checkbox" value="" id="flexCheckDefault" onclick="showpass()">
        <label class="form-check-label" for="flexCheckDefault">
          Show Password
        </label>
      </div>
      <br>
      <input class="btn btn-outline-primary" type="submit" value="Submit" id="submit" name="submit">
      <?php
      if (isset($_POST['submit'])) {
        login($conn);
      }

      ?>
      <br><br>
      <p>Don't have a account? <a href="register.php">Sign-Up for Free</a></p>
    </form>
  </div>


  </div>
  <script>
    function showpass() {
      var x = document.getElementById("floatingPassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>