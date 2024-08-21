<?php
include("nav.php")


?>
<?php
$id="";
$name="";
$postid=$_GET['postid'];


     
    if(isset($_SESSION['login'])&& $_SESSION['login']=='true' ){
        $userid=$_SESSION['id'];
    include 'server.php';
    $from="SELECT * FROM `table` WHERE `postid`='$postid'";

   $result=mysqli_query($conn,$from);
   $row=mysqli_fetch_assoc($result);
$title=$row['title'];
$blog=$row['blog'];
$uid=$row['userid'];
$sql="SELECT `fname`, `lname` FROM `users` WHERE `id`='$uid'";
$cola=mysqli_query($conn,$sql);
$name=mysqli_fetch_assoc($cola);
$username=$name['fname'].' '.$name['lname'];








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
       

            <div class="posts">
                <!-- Example Post 1 -->
                <div class="post">
                    <div class="user-info">
                        <img class="Avatar" src="images/profile 2.jpg" alt="User Avatar">
                        <div class="user-details">
                            <h3><?php
                           echo $username ?></h3>
                            <p><?php echo $title?></p>
                        </div>
                    </div>
                    <p class="post-content"><?php echo $blog?></p>
                </div>
               
            </div>
            <form action="commenthandler.php" method="post">
                <input type="hidden" value="<?php echo $postid  ?>" name="postid">      
            <div class="post-box">
                <textarea name="comment" placeholder="What's happening?"></textarea>
                <button type="submit" class="post-button">Post</button>
            </div> </form>
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
