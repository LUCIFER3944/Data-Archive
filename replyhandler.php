<?php
session_start();


if (isset($_SESSION['login']) && $_SESSION['login'] == 'true') {
    $userid = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include('server.php');
        $userid = $_SESSION['id'];

      
        $commid = $_POST['commentid'];
        $postid = $_POST['postid'];
        $reply = $_POST['reply'];
       

        $sql = "INSERT INTO `reply`(`commid`, `userid`, `reply`, `time`) 
                VALUES ('$commid', '$userid', '$reply', CURRENT_TIMESTAMP())";

        if (mysqli_query($conn, $sql)) {
          
            header("Location:reply.php?postid=$postid");
           
        } 
    }
}
?>
