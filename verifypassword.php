<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            width: 600px;
            padding: 40px;
            -webkit-box-shadow: -1px 14px 29px -2px rgba(122, 117, 122, 0.78);
            -moz-box-shadow: -1px 14px 29px -2px rgba(122, 117, 122, 0.78);
            box-shadow: -1px 14px 29px -2px rgba(122, 117, 122, 0.78);
            border-radius: 30px 40px 40px 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST" onload="">
            <?php
            session_start();
            $username = $_SESSION['username'];
            function now($username)
            {
                require_once "connection.php";

                if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

                    $pass = trim($_POST['passw']);
                    $select = "SELECT username, password FROM users WHERE username = '$username'";
                    $res = mysqli_query($conn, $select);
                    $row = mysqli_fetch_assoc($res);
                    $hashed_password = $row['password'];
                    $user = $row['username'];
                    $verify = hash_equals($hashed_password, crypt($pass,  $hashed_password));
                    if ($verify) {
                        header("location: update.php");
                    } else {
                        echo '<br><div class="alert alert-danger" role="alert">
    Password Do not Match Please Enter correct password
  </div>';
                    }
                }
            }
            ?>
            <h3>Verify Your Password </h3>

            <h5><?php echo $username; ?></h5>
            <h6>please enter the password to update your details
            </h6>

            <div class="form-floating">
                <input type="password" class="form-control" name="passw" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div><br>
            <div class="form-check">
                <input class="form-check-input" name="checkbox" type="checkbox" value="" id="flexCheckDefault" onclick="showpass()">
                <label class="form-check-label" for="flexCheckDefault">
                    Show Password
                </label>
            </div><br>
            <input class="btn btn-outline-primary" type="submit" onclick="" value="Submit" href="update.html" name="submit"><br>
            <?php



            if (isset($_POST['submit'])) {
                now($username);
            }
            ?>
        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>