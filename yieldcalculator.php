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
	<title>Yeild Calculator</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="css/font.css">
	<link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
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

		body {
			width: 100vw;
			height: 100vh;
			background-image: url("img/Crop_yield.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.container {
			margin: 20vh auto auto auto;
			width: 500px;
			padding: 25px;
			border: 1px solid red;

			background: rgba(255, 255, 255, 0.04);
			border-radius: 16px;
			box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(4.9px);
			-webkit-backdrop-filter: blur(4.9px);
			border: 1px solid rgba(255, 255, 255, 0.3);
		}

		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
		}

		body {
			width: 100vw;
			height: 100vh;
		}

		.col-4 {
			border: 1px solid red;
			padding: 20px;
		}

		.dropdown {
			margin-right: 8vw;
		}

		.display {
			margin-left: 13vw;
		}

		.row {
			margin: 20px;
		}

		.col-3 {
			margin-left: 10vw;
		}

		h3 {
			text-align: center;
			font-weight: lighter;
		}

		#display {
			margin: 3vh 5vw 2vh 8vw;
			color: #c4e8c2;
		}
	</style>
</head>

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
						<a href="weatherinfo.php" class="nav-link">Weather Information</a>
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
	<div class="container">
		<h3>Yield Calculator</h3>
		<div class="row">

			<select class="form-select" id="slct" aria-label="Default select example">
				<option selected>Select the Crop </option>
				<option value="wheat">Wheat</option>
				<option value="jowar">Jowar</option>
				<option value="bajra">Bajra</option>
				<option value="rice">Rice</option>
				<option value="tur">Tur</option>
				<option value="moong">Moong</option>
				<option value="urad">Urad</option>
				<option value="gram">Gram</option>
				<option value="maize">Maize</option>
				<option value="soybean">Soybean</option>
			</select>
		</div>
		<div class="row">
			<input type="number" class="form-control" id="avg" placeholder="Enter Average Number of pods" aria-label="First name" required>
		</div>
		<div class="row">
			<input type="number" class="form-control" id="grns" placeholder="Number of Grains" aria-label="Last name" required>
		</div>

		<div class="row">
			<input type="text" readonly class="form-control" placeholder=" " id="dsp" aria-label="Last name" required>
		</div>
		<div class="col-3">
			<button class="btn btn-outline-info" id= "btn" name="btn12" >Calculate</button>

		</div>
		<div class="display" id="display">
		</div>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

	<script src="js/yieldpredictor.js"></script>
</body>

</html>