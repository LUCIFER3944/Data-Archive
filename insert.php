<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    include('data.php');

    $title=$_POST['title'];
    $blog=$_POST['blog'];
   
        $sql="INSERT INTO `table`( `title`, `blog`) 
        VALUES ('$title','$blog',)";
        if(mysqli_query($conn,$sql)){
            header("location:blog.php");
        }

}


?>