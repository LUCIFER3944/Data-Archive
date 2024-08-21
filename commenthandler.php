
<?php


$id="";
$name="";
session_start();
    if(isset($_SESSION['login'])&& $_SESSION['login']=='true' ){
        $userid=$_SESSION['id'];
  

if($_SERVER['REQUEST_METHOD']=='POST'  ){
include('server.php');

$commdata=$_POST['comment'];
$postid=$_POST['postid'];


$sql="INSERT INTO `comment`( `commdata`, `postid`, `userid`, `commtime`) VALUES ('$commdata','$postid','$userid',CURRENT_TIMESTAMP())";


if(mysqli_query($conn,$sql)){
    header("location:showblog.php?postid=$postid");
}



}


    }


?>