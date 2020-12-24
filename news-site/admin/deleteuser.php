<?php
include 'header.php';
include 'config.php';
if($_SESSION['role'] == '0'){
    header('Location:post.php');
}
$user_id = $_GET['id'];
$sql="DELETE FROM `user` WHERE `user_id`='$user_id'";
if(mysqli_query($conn,$sql)){
    echo $sql;
    header("Location:users.php");
}else{
    echo 'not delete';
}
mysqli_close($conn);
?>