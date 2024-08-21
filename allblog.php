<?php
include("nav.php")


?>
<?php
$id="";
$name="";


     
    if(isset($_SESSION['login'])&& $_SESSION['login']=='true' ){
        $userid=$_SESSION['id'];
    include 'server.php';
    $from="SELECT * FROM `table` ";

   $result=mysqli_query($conn,$from);
 










    }else{

      header('location:login.php');
    }
    ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter-Like Post Page</title>
    <link rel="stylesheet" href="blogstyle.css">
</head>
<body>
  
    <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li>Home</li>
                <li>Explore</li>
                <li>Notifications</li>
                <li>Messages</li>
            </ul>
        </div>

        <div class="main-content">
          
                <div class="post-box">

                <textarea placeholder="What's happening?"></textarea>
                <button class="post-button">Post</button>
            </div>
        
            <div class="posts">
                <!-- Example Post 1 -->
                 <?php

while( $row=mysqli_fetch_assoc($result)){ //facting all data
    $title=$row['title'];
    $blog=$row['blog'];
    $userid=$row['userid'];
    $postid=$row['postid'];
    $sql="SELECT `fname`, `lname` FROM `users` WHERE `id`='$userid'";
    $cola=mysqli_query($conn,$sql);
    $name=mysqli_fetch_assoc($cola);
    $username=$name['fname'].' '.$name['lname'];




   echo '
                <div class="post">
                    <div class="user-info">
                        <img class="Avatar" src="images/profile 2.jpg" alt="User Avatar">
                        <div class="user-details">
                            <h3>
                           '.$username .'</h3>
                            <p>'.$title.'</p>
                        </div>
                    </div>
                    <p class="post-content"> '.$blog.'</p>
                    <a href="showblog.php?postid='.$postid.'">Read More</a>
                </div>';
              
         
  }?>
   
            </div>
        </div>
        <div class="sidebar right">
            <h2>Trending</h2>
            <ul>
                <li>Trend 1</li>
                <li>Trend 2</li>
                <li>Trend 3</li>
            </ul>
        </div>
    </div>
</body>
</html>
