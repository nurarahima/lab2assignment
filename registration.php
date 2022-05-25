<?php
if (isset($_POST['submit'])) {
    include_once("dbconnect.php");
    $Username = addslashes($_POST['username']);
    $Email = addslashes($_POST['email']);
    $Phonenumber = $_POST['phonenumber'];
    $Password = $_POST['password'];
    $Homeaddress = $_POST['homeaddress'];
    $sqlinsertuser = "INSERT INTO `tbl_username`(`email`,`phonenumber`, 
    `password`, `homeaddress`) VALUES 
    ('$Username','$Email','$Phonenumber','$Password','$Homeaddress')";
    try {
        $conn->exec($sqlinsertuser);
        if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
            $last_id = $conn->lastInsertId();
            uploadImage($last_id);
            echo "<script>alert('Success')</script>";
            echo "<script>window.location.replace('login.php')</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Failed')</script>";
        echo "<script>window.location.replace('registration.php')</script>";
    }
}

function uploadImage($email)
{
    $target_dir = "../image/userimage/";
    $target_file = $target_dir . $filename . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="function.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #FBFCCE;
}

.container{
    max-width:600px;
    margin:auto;
    justify-content:center;


}

img{
    display: block;
    margin-left: auto;
    margin-right:auto;
}

</style>
<body>
    <div class="container" style="display:flex; jusify-content:center;">
    <form action="registration.php" method="post" enctype="multipart/form-data" onsubmit="return confirmDialog()">
  <div class="w3-container" style="width:300px; margin:auto; text-align:left;"> 
  <div class="w3-center">
  <h1 style="text-align:center;">Register</h1>
  <img src="user.png" alt="Avatar">
  <input type="file" name="fileToUpload" onchange="previewFile()">
  </div>
  
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <br><input type="text" placeholder="Enter Username" name="username" id="username" required>
    <br>

    <br><label for="email"><b>Email</b></label>
    <br><input type="text" placeholder="Enter Email" name="email" id="email" required>

    <br>

    <br><label for="id"><b>Id</b></label>
    <br><input type="int" placeholder="Enter id" name="id" id="id">

    <br>

    <br><label for="Phone number"><b>Phone number</b></label>
    <br><input type="int" placeholder="Enter phone number" name="phonenum" id="phonenum" required>

    <br>

    <br><label for="psw"><b>Password</b></label>
    <br><input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <br>

    <br><label for="home address"><b>Home address</b></label>
    <br><input type="home address" placeholder="Enter home address" name="home address" id="home address" required>

    <br><br>

    <button type="submit" class="registerbtn">Register</button><form>
    </div>
</div>

</body>
</html>