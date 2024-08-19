<?php

if($_SERVER['REQUEST_METHOD']=='POST'  ){
include('server.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$password=$_POST['password'];
$sql="INSERT INTO `users`( `fname`, `lname`, `email`,`phone`,`address`, `password`) VALUES ('$fname','$lname','$email','$phone','$address','$password')";

if(mysqli_query($conn,$sql)){
    header("location:Login.php");
}



}





?>