<?php
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
    <title>Soil Information</title>
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

        body {
            width: 100vw;
            height: 100vh;
        }

        .container {
            margin: 5vh auto auto auto;
            box-shadow: 5px 5px 5px 5px #c4e8c2;
            padding: 40px;
            width: 70%;
        }

        img {
            float: left;
            max-width: 320px;
            height: 248.89px;
            margin: 20px;
        }

        .text {
            margin-top: 2vh;
            text-align: justify;
        }

        .card {
            margin: 20px;
        }

        .dropdown {
            margin-right: 5vw;
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
                        <a href="welcome.php" class="nav-link">Home</a>
                    </li>    
                    <li class="nav-item">
                        <a href="yieldcalculator.php" class="nav-link">Yield Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a href="fertilizers.php" class="nav-link">Fertilizers Information</a>
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
        <h3>Soil Types</h3>
        <p>Soil is a natural resource that can be categorised into different soil types, each with distinct characteristics that provide growing benefits and limitations.</p>
        <p>Identifying the type of soil you require for a project is paramount to support the healthy growth of plant life.</p>
        <p>Soil can be categorised into sand, clay, silt, peat, chalk and loam types of soil based on the dominating size of the particles within a soil.</p>
        <div class="card">
            <div class="card-body">
                <img src="img/Sandy-Soil-1.jpg" alt="">
                <div class="text">
                    <h4>Sandy Soil</h4>
                    <p> Sandy Soil is light, warm, dry and tends to be acidic and low in nutrients. Sandy soils are often known as light soils due to their high proportion of sand and little clay (clay weighs more than sand).</p>
                    <p>These soils have quick water drainage and are easy to work with. They are quicker to warm up in spring than clay soils but tend to dry out in summer and suffer from low nutrients that are washed away by rain.</p>
                    <p>The addition of organic matter can help give plants an additional boost of nutrients by improving the nutrient and water holding capacity of the soil.</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <img src="img/Clay-Soil-1.jpg" alt="">
                <div class="text">
                    <h4>Clay Soil</h4>
                    <p>Clay Soil is a heavy soil type that benefits from high nutrients. Clay soils remain wet and cold in winter and dry out in summer.</p>
                    <p>These soils are made of over 25 percent clay, and because of the spaces found between clay particles, clay soils hold a high amount of water.</p>
                    <p>Because these soils drain slowly and take longer to warm up in summer, combined with drying out and cracking in summer, they can often test gardeners.</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <img src="img/Silt-Soil.jpg" alt="">
                <div class="text">
                    <h4>Silt Soil</h4>
                    <p>Silt Soil is a light and moisture retentive soil type with a high fertility rating.</p>
                    <p>As silt soils compromise of medium sized particles they are well drained and hold moisture well.</p>
                    <p>As the particles are fine, they can be easily compacted and are prone to washing away with rain.</p>
                    <p>By adding organic matter, the silt particles can be bound into more stable clumps.</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <img src="img/peat-soil.jpg" alt="">
                <div class="text">
                    <h4>Peat Soil</h4>
                    <p>Peat soil is high in organic matter and retains a large amount of moisture.</p>
                    <p>This type of soil is very rarely found in a garden and often imported into a garden to provide an optimum soil base for planting.</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <img src="img/Chalk-Soil1.jpg" alt="">
                <div class="text">
                    <h4>Chalk Soil</h4>
                    <p>Chalk soil can be either light or heavy but always highly alkaline due to the calcium carbonate (lime) within its structure.</p>
                    <p>As these soils are alkaline they will not support the growth of ericaceous plants that require acidic soils to grow.</p>
                    <p>If a chalky soil shows signs of visible white lumps then they can’t be acidified and gardeners should be resigned to only choose plants that prefer an alkaline soil.</p>
                </div>
            </div>
        </div>

        



    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>


</html>