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
    <title>Fertilizers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">

    <style>
        .body {
            width: 100vw;
            height: 100vh;
        }

        img {
            float: left;
            max-width: 320px;
            margin: 25px;

        }

        .card {
            display: flex;
            flex-wrap: wrap;
            margin: 5px;
        }

        .text {
            margin: 25px;
            text-align: justify;
        }

        .container {
            margin: 5vh auto auto auto;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            border: 1px solid #f6f6f6;
            box-shadow: 0 0 10px #ccc;
            border-radius: 20px;
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
                        <a href="yieldcalculator.php" class="nav-link">Yield Calculator</a>
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
    <main>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <img src="img/npk-12-32-16.png" alt="" class="ftl-icon" id="icon">
                    <div class="text">
                        <p><strong>NPK 12-32-16</strong></p>
                        <p>How to use NPK 12-32-16</p>
                        <p>NPK should be applied to the soil considering important factors such as placement, proportion and time of crop cycle.</p>
                        <p>It should be applied during sowing. The dosage should be as per the crop and the soil (As per general recommendation for the State). It is advised not to use the N. P. K. (12:32:16) with standing crops, application of N. P. K. (12:32:16) through seed- cum fertiliser gives better results.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <img src="img/np-20-20-0-13.png" alt="" class="ftl-icon" id="icon">
                    <div class="text">
                        <p><strong>NP(S) 20-20-0-13</strong></p>
                        <p>How to use NP(S) 20-20-0-13</p>
                        <p>It should be applied to the soil considering important factors such as placement, proportion and time of crop cycle.</p>
                        <p>It should be applied during sowing and through broadcasting. The dosage should be as per the crop and the soil (As per general recommendation for the State). It is advised not to use the NP(S) 20-20-0-13 with standing crops, application of NP(S) 20-20-0-13 through seed- cum fertilizer gives better outputs.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <img src="img/18-46-0-(DAP)_1.png" alt="" class="ftl-icon" id="icon">
                    <div class="text">
                        <p><strong>DAP 18-46-0</strong></p>
                        <p>How to use DAP 18-46-0</p>
                        <p>DAP should be applied to the soil considering important factors such as placement, proportion and time of crop cycle.</p>
                        <p>DAP can be applied either during pre-sowing cultivation, tilling or during sowing of crops. The dosage should be as per the crop and soil (As per general recommendation for the State). It is advised not to use DAP on standing crops. It should be applied near the seeds as the DAP dissolves in the soil and provides temporary alkalization of the PH of the soil thus helping in better absorption of fertilizers in the early crop growth cycle.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <img src="img/UREA_0.png" alt="" class="ftl-icon" id="icon">
                    <div class="text">
                        <p><strong>Neem Coated Urea (N)</strong></p>
                        <p>How to use Neem Coated Urea (N)</p>
                        <p>Urea should be applied to the soil considering important factors such as placement, proportion and time of crop cycle.</p>
                        <p>If urea is applied to the bare soil surface, significant quantities of ammonia may be lost as a result of volatility because of its rapid hydrolysis to ammonium carbonate.It should be applied at the time of sowing and in standing crops (top dressing). Half part of the recommended dose at the time of sowing and remaining half part after 30 days in 2-3 equal parts at gaps of 15 days. The rapid hydrolysis of urea in soils is also responsible for Ammonia injury to seedlings, if large quantities of this material are placed with or too close to the seed. Proper placement of Urea with respect to the seed can eliminate this problem. Urea should be applied as per the crop requirement and soil conditions (According to general recommendations of the State).</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <img src="img/10-26-26-(NPK).png" alt="" class="ftl-icon" id="icon">
                    <div class="text">
                        <p><strong>NPK 10-26-26</strong></p>
                        <p>How to use NPK 10-26-26</p>
                        <p>NPK should be applied to the soil considering important factors such as placement, proportion and time of crop cycle.</p>
                        <p>It should be applied during sowing and through broadcasting. The dosage should be as per the crop and the soil (As per general recommendation for the State). It is advised not to use the N. P. K. (10:26:26) with standing crops, application of N. P. K. (10:26:26) through seed- cum fertiliser gives more beneficial.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <img src="img/NPK Front.png" alt="" class="ftl-icon" id="icon">
                    <div class="text">
                        <p><strong>N.P.K. 19:19:19</strong></p>
                        <p>How to use N.P.K. 19:19:19</p>
                        <p>The fertilizer should be used considering the proportion and time of the crop cycle. This fertilizer can at all stages of plant growth and also for rejuvenation of vegetative growth.It can be used both by the drip irrigation method, leafy spray method.</p>
                        <p>The recommended dose of fertilizer through the drip irrigation method should be around 1.5 to 2gm of NPK should be mixed with per litre of water considering the crop and soil type. When applying fertilizer through Leafy Spray method N.P.K. (19:19:19) should be used 30-40 days after sowing of the crop till pre-flowering stage at 0.5-1.0% proportion 2-3 times at the gap of 10-15 days</p>
                    </div>
                </div>
            </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>