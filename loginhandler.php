<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
include('server.php');
$email=$_POST['email'];
$password=$_POST['password'];
print_r($password);
$select="SELECT * FROM `userdetails` WHERE `email`='$email' ";
$result=mysqli_query($conn,$select);

$row=mysqli_fetch_assoc($result);
// print_r($row);
if($password==$row['password']){
    session_start();
    $_SESSION['login']='true';
    $_SESSION['email']=$email;
    $_SESSION['id']=$row['id'];
    header("location:main.php");


}else{
    echo 'password incorrect';
}
}






?>