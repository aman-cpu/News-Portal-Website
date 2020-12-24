<?php
include 'config.php';
if(isset($_FILES['post_img'])){
    $errors=array();
    $file_name=$_FILES['post_img']['name'];
    $file_size=$_FILES['post_img']['size'];
    $file_tmp=$_FILES['post_img']['tmp_name'];
    $file_type=$_FILES['post_img']['type'];
    $file_ext=strtolower(end(explode('.',$file_name)));
    $extensions=array('jpeg','png','jpg','jfif');
    if(in_array($file_ext,$extensions)=== false){
        $errors[]='This file extension is not allowed.Please choose JPG or PNG file.';
    }
    if($file_size > 2097152){
        $errors[]='Upload File size must be less than 2MB.';
    }
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($errors);
    }
} 
session_start();
$title=mysqli_real_escape_string($conn,$_POST['title']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
$date=date("d M, Y");
$author=$_SESSION['user_id'];
$sql="INSERT INTO post (title,description,category,post_date,author,post_img) VALUES ('$title','$description',$category,'{$date}',$author,'$file_name');";
$sql.="UPDATE category SET post=post+1 WHERE category_id=$category";
if(mysqli_multi_query($conn,$sql)){
    header('Location:post.php');
}else{
    echo 'query failed';
}
?>