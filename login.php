<?php

if (isset($_POST['submit'])) {
    include 'dbconnect.php';
    $email = $_POST['email'];
    $pass = sha1($_POST['password']);
    $sqllogin = "SELECT * FROM tbl_user WHERE user_email = '$email' AND user_pass = '$pass'";
    $stmt = $conn->prepare($sqllogin);
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    
    if ($number_of_rows  > 0) {
        session_start();
        $_SESSION["sessionid"] = session_id();
        $_SESSION["email"] = $email ;
        echo "<script>alert('Login Success');</script>";
        echo "<script> window.location.replace('index.php')</script>";
    } else {
        echo "<script>alert('Login Failed');</script>";
        echo "<script> window.location.replace('login.php')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  font-family: Arial;
  color: black;
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: #FBFCCE;
}

.right {
  right: 0;
  background-color: #F5F5F5;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.centered img {
  width: 150px;
  border-radius: 50%;
}


</style>
</head>
<body>
<div class="split left">
  <div class="centered">
    <img src="user.png" alt="tutor">
    <h2>My Tutor</h2>
  </div>
</div>

<div class="split right">
  <div class="centered" style="width: 300px;margin:10px; padding:10px">
    <h2>Log in</h2>
    <form action="login.php" method="post">
        <div class="w3-container w3-center w3-card" style="width:500px; margin:auto; text-align:left;">
    <p class="email"> <label for="email"><b>Email</b></label></p>
    <p><input type="text" name="email" required></p>

    <p><label for="psw"><b>Password</b></label>
    <p><input type="password" name="psw" required></p>
    <br><br>
    <button type="submit">Login</button></div>
   
    </form>
  </div>
</div>


</body>
</html>