<?php
// $x = 10;

// if (in_array($x, range(5, 14))) {
//     echo "x is between 5 and 14";
// } else {
//     echo "x is not between 5 and 14";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form onsubmit="return mySubmitFunction(event)" method="post">
        <input type="text" name="simp" id="">
        <button type="submit" name="btn">Submit</button>
    </form>
    <?php
    if (isset($_POST['btn11'])) {
        $id = $_SESSION['id'];
        $usrnm = $_SESSION['username'];
        $send = "INSERT INTO suggestions (id, Username, system_used, suggestions) VALUES($id, '$usrnm', 'Weather Forecast', 'None')";
        $insert = mysqli_query($conn, $send);
    }
    ?>
     <script>
    function mySubmitFunction(e) {
      e.preventDefault();
      return false;
    }
  </script>
</body>

</html>