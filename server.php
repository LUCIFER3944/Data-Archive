<?php

$servername='127.0.0.1';
$user='root';
$password='';
$database='users';

$conn=mysqli_connect($servername,$user,$password,$database);
if(!$conn){
    echo 'not connected';
}

?>