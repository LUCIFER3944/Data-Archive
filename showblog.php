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
    <link rel="stylesheet" href="showblogstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <div class="posts">
                <!-- Example Post 1 -->
                 <?php
                $querry=" SELECT * FROM `comment` WHERE `postid`='$postid'";
                $res=mysqli_query($conn,$querry);
                
                 while($row=mysqli_fetch_assoc($res)){
                    $comment=$row['commdata'];
                    $commtime=$row['commtime'];
                    $userid=$row['userid'];
                    $sql="SELECT `fname`,`lname` FROM `users` WHERE `id`='$userid' ";
                    $fold=mysqli_query($conn,$sql);
                    $fetch=mysqli_fetch_assoc($fold);
                    $username=$fetch['fname'].' '.$fetch['lname'];
            echo '   <div class="border1">   <div class="post">
                    <div class="user-info">
                        <img class="Avatar" src="images/profile 2.jpg" alt="User Avatar">
                        <div class="user-details">
                            <h3>'.
                           $username.' </h3>
                            <p>'. $commtime.' </p>
                        </div>
                    </div>
                    <p class="post-content"> '.$comment.' </p>
                </div>

                <p class="d-inline-flex gap-1">
               
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                 Reply
                </button>
              </p>
              <div class="collapse" id="collapseExample">
                   <div class="post-box">
                <textarea name="comment" placeholder="Reply?"></textarea>
                <button type="submit" class="post-button">Post</button>
            </div>
              </div>
</div>';

                 }

                 
                 
                 ?>
              
             
            
          
               
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
  
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
