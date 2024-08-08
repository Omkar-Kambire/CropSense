<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $username = $_SESSION['username'];
  $id = $_SESSION['id'];
  $email = $_POST["email"];
  $message = $_POST["message"];

  //check whether the email is listed or not
  $check = "SELECT user_id FROM users WHERE email = '$email'";
  $send = $conn->query($check);
  if (mysqli_num_rows($send) >0) {

    $sql = "INSERT INTO user_feedback (id, username, email, message, sent_on) VALUES('$id','$username', '$email','$message', CURRENT_TIMESTAMP())";

    if (mysqli_query($conn, $sql)) {
      $alert = '<script>alert("Sent Successfully")</script>';
      echo $alert;
    }
  }
  else{
    $alert = '<script>alert("The email not registered to our system")</script>';
    echo $alert;
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us</title>
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

    .container {
      width: 100vw;
      height: 93vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
    }

    .container1 {
      padding: 20px;
      background: #fafafa;
      width: 500px;
      border-radius: 30px;
    }

    .dropdown {
      margin-right: 7vw;
    }

    .container2 h3 {
      margin-top: 5vh;
    }

    .container2 {

      height: 500px;
      width: 500px;
    }

    h1 {
      font-weight: lighter;
      margin-bottom: 40px;
    }

    form {
      padding: 10px;
    }

    .lorem {
      text-align: justify;
      margin-right: 40px;
    }

    textarea {
      resize: none;
    }

    .btn-submit {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
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
            <a class="nav-link" aria-current="page" href="welcome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="info.php">Crop Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
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

  <div class="container">
    <div class="container2">
      <h3>Reach Us</h3>
      <p class="lorem">If you have any queries or questions related to our website, please send a feedback or review. If you face any bug please feel free to share with us.</p>
      <p>Email : crs@example.com</p>
      <p>Phone : +91 9988776655</p>
      <p> Address : #212 Ground floor,Shukrawar Peth, Karad 415124 </p>
    </div>
    <div class="container1">

      <form action="" method="POST"><br>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" required>Email address</label>
          <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
        </div><br>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label" required>Message for Developers</label>
          <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your problem or suggestions here" required></textarea>
        </div><br>
        <div class="btn-submit">
          <input class="btn btn-outline-primary" type="submit" value="Submit">
        </div>

        <p class="mt-3 mb-3 text-muted" style="text-align:center;">&copy; 2022–2023</p>
      </form>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</body>

</html>