<?php
include 'config.php';
if(empty($_FILES['new_img']['name'])){
    $file_name=$_POST['old_img'];
}else{
    $errors=array();
    $file_name=$_FILES['new_img']['name'];
    $file_size=$_FILES['new_img']['size'];
    $file_tmp=$_FILES['new_img']['tmp_name'];
    $file_type=$_FILES['new_img']['type'];
    $file_ext=strtolower(end(explode('.',$file_name)));
    $extensions=array('jpeg','png','jpg',);
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
$sql="UPDATE `post` SET `title`='{$_POST["title"]}',`description`='{$_POST["description"]}',`category`={$_POST["category"]}, `post_img` ='$file_name' WHERE `post_id`={$_POST["post_id"]}";

$result=mysqli_query($conn,$sql);
if($result){
    header('Location:post.php');
}else{
    echo 'Query failed';
}
?>
