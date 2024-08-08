<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
require_once "connection.php";
$nitrogen = $_GET['nitrogen'];
$phosphorous = $_GET['phosphorous'];
$potassium = $_GET['potassium'];
$ph = $_GET['pH'];


$fetch = "SELECT * FROM soilstatus WHERE Nitrogen BETWEEN $nitrogen AND ($nitrogen+1) AND (Phosphorus BETWEEN $phosphorous AND ($phosphorous+1)) AND (Potassium BETWEEN $potassium AND ($potassium+1)) AND (pH BETWEEN $ph AND ($ph+1))";
$resfetch = mysqli_query($conn, $fetch);


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
    <link rel="stylesheet" href="css/font.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .container {
            width: 860px;
        }

        .col,
        .row1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>The result based on your output is as follows:</h3><br><br>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="col" scope="col">Crop Name</th>
                </tr>
            </thead>

            <?php

            //checking if the result has been successfully fetched

            if ($resfetch) {
                $rs = mysqli_num_rows($resfetch);
                // checking for the number of rows returned by the result variable
                if ($rs) {



                    while ($rws = $resfetch->fetch_assoc()) {

                        $rw = $rws['crop_name'];
            ?>

                        <tr>
                            <td class="row1"><?php echo $rws["crop_name"]; ?></td>
                        </tr>
            <?php  }
                } else {
                    $alert = '<script>alert("No data found");</script>';
                    echo $alert;
                    if ($alert) {
                        $redirect = '<script>window.location.href="mainpage.php";</script>';
                        echo $redirect;
                    }
                }

                $id = $_SESSION['id'];
                $usrnm = $_SESSION['username'];
                $system = "NPK_ANALYSER";
                if (strlen($rw) == 0) {
                    $rw = "Incorrect Input";
                }

                $send = "INSERT INTO suggestions (id, Username, system_used, suggestions) VALUES($id, '$usrnm', '$system', '$rw')";
                $insert = mysqli_query($conn, $send);
            }
            ?>
        </table>
    </div>
    <script>

    </script>
</body>

</html>