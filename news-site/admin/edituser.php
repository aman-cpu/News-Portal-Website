<?php
include 'header.php';
include 'config.php';
if($_SESSION['role'] == '0'){
    header('Location:post.php');
}
if(isset($_POST['save'])){
    $user_id=$_GET['id'];
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
    $lname=mysqli_real_escape_string($conn,$_POST['lname']);
    $uname=mysqli_real_escape_string($conn,$_POST['uname']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);
    // echo $role;
    $sql="UPDATE `user` SET `fname`='$fname',`lname`='$lname',`uname`='$uname', `role` ='$role' WHERE `user_id`='$user_id'";
    echo $sql;
    if(mysqli_query($conn,$sql)){
        echo 'drun';
        header('Location:users.php');
    }   
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Bootstrap Simple Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #fff;
            background: #63738a;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }

        .form-control:focus {
            border-color: #5cb85c;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }

        .signup-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }

        .signup-form h2:before,
        .signup-form h2:after {
            content: "";
            height: 2px;
            width: 25%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }

        .signup-form h2:before {
            left: 0;
        }

        .signup-form h2:after {
            right: 0;
        }

        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="signup-form">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <?php
        $user_id=$_GET['id'];
        $sql = "SELECT * FROM user WHERE user_id =$user_id";
        $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull');
        if (mysqli_num_rows($result) > 0) {
            while($row=mysqli_fetch_assoc($result)){
        ?>
            <h2>Modify User</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="fname" value="<?php echo $row['fname']?>" placeholder="First Name"
                    required="required"></div>
                    <input type="hidden" class="form-control" name="user_id" required="required">
                    <div class="col"><input type="text" class="form-control" name="lname" value="<?php echo $row['lname']?>" placeholder="Last Name"
                            required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="uname" value="<?php echo $row['uname']?>" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">User Role</label>
                <select class="form-control" name="role" value="<?php echo $row['role']?>">
                <?php
                    if($row['role']==1){
                        echo "<option value='0'>Normal User</option>
                            <option value='1' selected>Admin</option>";
                    }else{
                        echo "<option value='0' selected >Normal User</option>
                            <option value='1'>Admin</option>";
                    } 
                ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" name="save" class="btn btn-success btn-lg btn-block">
            </div>
        </form>
        <?php
            }}
        ?>
    </div>
</body>

</html>