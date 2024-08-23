<?php

include("nav.php");


$id = "";
$name = "";




if (isset($_SESSION['login']) && $_SESSION['login'] == 'true') {
    $userid = $_SESSION['id'];

    include 'server.php';

  
    $postid = $_GET['postid'];

   
    $query = "SELECT * FROM `table` WHERE `postid`='$postid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $blog = $row['blog'];
    $uid = $row['userid'];


    $sql = "SELECT `fname`, `lname` FROM `users` WHERE `id`='$uid'";
    $user_result = mysqli_query($conn, $sql);
    $user_row = mysqli_fetch_assoc($user_result);
    $username = $user_row['fname'] . ' ' . $user_row['lname'];

} else {
  
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page with Replies</title>
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
              
                <div class="post">
                    <div class="user-info">
                        <img class="Avatar" src="images/profile 2.jpg" alt="User Avatar">
                        <div class="user-details">
                            <h3><?php echo $username; ?></h3>
                            <p><?php echo $title; ?></p>
                        </div>
                    </div>
                    <p class="post-content"><?php echo $blog; ?></p>
                </div>
            </div>

           
            <form action="commenthandler.php" method="post">
                <input type="hidden" value="<?php echo $postid; ?>" name="postid">      
                <div class="post-box">
                    
                </div>
            </form>

            <div class="posts">
                <!-- Display comments and reply form -->
                <?php
                $comment_query = "SELECT * FROM `comment` WHERE `postid`='$postid'";
                $comment_result = mysqli_query($conn, $comment_query);
                
                while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                    $commentid = $comment_row['commid'];
                    $comment = $comment_row['commdata'];
                    $commtime = $comment_row['commtime'];
                    $userid = $comment_row['userid'];

                    $user_sql = "SELECT `fname`,`lname` FROM `users` WHERE `id`='$userid'";
                    $user_res = mysqli_query($conn, $user_sql);
                    $user_data = mysqli_fetch_assoc($user_res);
                    $comment_username = $user_data['fname'] . ' ' . $user_data['lname'];

                    echo '
                    <div class="border1">
                        <div class="post">
                            <div class="user-info">
                                <img class="Avatar" src="images/profile 2.jpg" alt="User Avatar">
                                <div class="user-details">
                                    <h3>' . $comment_username . '</h3>
                                    <p>' . $commtime . '</p>
                                </div>
                            </div>
                            <p class="post-content">' . $comment . '</p>
                        </div>

                        <!-- Reply button and form -->
                        <p class="d-inline-flex gap-1">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample' . $commentid . '" aria-expanded="false" aria-controls="collapseExample' . $commentid . '">
                                Reply
                            </button>
                        </p>

                        <div class="collapse" id="collapseExample' . $commentid . '">
                            <div class="post-box">
                                <form action="replyhandler.php" method="post">
                                    <input type="hidden" name="commentid" value="' . $commentid . '">
                                    <input type="hidden" name="postid" value="' . $postid . '">
                                    <textarea name="reply" placeholder="Reply to this comment"></textarea>
                                    <button type="submit" class="post-button">Post</button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Display replies -->
                        <div class="replies">';
                        
                        // Fetch and display replies
                        $reply_query = "SELECT * FROM `reply` WHERE `commid`='$commentid'";
                        $reply_result = mysqli_query($conn, $reply_query);
                        
                        while ($reply_row = mysqli_fetch_assoc($reply_result)) {
                            $reply_userid = $reply_row['userid'];
                            $reply_content = $reply_row['reply'];
                            $reply_time = $reply_row['time'];
                            
                            // Fetch the reply user's name
                            $reply_user_sql = "SELECT `fname`, `lname` FROM `users` WHERE `id`='$reply_userid'";
                            $reply_user_res = mysqli_query($conn, $reply_user_sql);
                            $reply_user_data = mysqli_fetch_assoc($reply_user_res);
                            $reply_username = $reply_user_data['fname'] . ' ' . $reply_user_data['lname'];
                            
                            echo '
                            <div class="reply">
                                <div class="user-info">
                                    <img class="Avatar" src="images/profile 2.jpg" alt="User Avatar">
                                    <div class="user-details">
                                        <h3>' . $reply_username . '</h3>
                                        <p>' . $reply_time . '</p>
                                    </div>
                                </div>
                                <p class="post-content">' . $reply_content . '</p>
                            </div>';
                        }

                    echo '</div> <!-- End of replies div -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
