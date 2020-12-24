<?php
include 'config.php';
session_start();
if(isset($_SESSION['uname'])){
    header('Location:http://localhost/news-site/admin/post.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .container {
            margin-top: 90px;
        }

        .login-form {
            width: 340px;
            margin: 50px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <h2 class="text-center">Log in</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
                </div>
                <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                    <a href="#" class="pull-right">Forgot Password?</a>
                </div>
            </form>
            <?php

            if (isset($_POST['login'])) {
                include 'config.php';
                $uname = mysqli_real_escape_string($conn, $_POST['uname']);
                $password = md5($_POST['password']);

                $sql = "SELECT user_id,uname,role FROM user WHERE uname='$uname' AND password='$password' ";
                $result = mysqli_query($conn, $sql) or die('Query failed');

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        session_start();
                        $_SESSION['uname'] = $row['uname'];
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['role'] = $row['role'];
                        header('Location:post.php');
                    }
                } else {
                    echo "<div class='alert alert-danger'><b>Error.</b>Username and Password are not matched.</div>";
                }
            }
            ?>
            <!-- <p class="text-center"><a href="register.html">Register here</a></p> -->
        </div>
    </div>
</body>

</html>