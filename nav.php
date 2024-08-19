<?php
$id="";
$name="";


      session_start();
    if(isset($_SESSION['login'])&& $_SESSION['login']=='true' ){
    $id=$_SESSION['id'];
    include 'server.php';
    $from="SELECT * FROM `users` WHERE `id`='$id'";

   $result=mysqli_query($conn,$from);
   $row=mysqli_fetch_assoc($result);
$name=$row['fname'];









    }else{

      header('location:login.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <a href="#" class="logo"> <?php
            echo $name;
            ?></a>

        <nav>
            <a href="main.php" class="active"> Home</a>
            <a href="profile.php" >Profile</a>
            <a href="#" >Skills</a>
            <a href="#" >Education</a>
            <a href="#" >Experience</a>
            <a href="Logout.php" >Log Out</a>
        </nav>
    </header>
</body>
</html>