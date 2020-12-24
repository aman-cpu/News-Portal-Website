<?php
include 'header.php';
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
            width: 600px;
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
            width: 30%;
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
        <form action="saveeditpost.php" method="post" enctype="multipart/form-data">
        <?php
        include 'config.php';
        $post_id = $_GET['id'];
        $sql = "SELECT * FROM post 
            LEFT JOIN category ON post.category=category.category_id
            LEFT JOIN user ON post.author=user.user_id
            WHERE post.post_id=$post_id";
        $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull');
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <h2>Edit Post</h2>
            <div class="form-group">
                <input type="hidden" class="form-control" name="post_id" value="<?php echo $row['post_id']; ?>" required="required">
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" placeholder="Enter Title here.." required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" cols="15" rows="5" required placeholder=""><?php echo $row['description'];?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" name="category" id="exampleFormControlSelect1">
                    <option disabled>--Select Catgeory--</option>
                    <?php
                    $sql1 = "SELECT * FROM category";
                    $result1 = mysqli_query($conn, $sql1) or die('Query Unsuccessfull');
                    if (mysqli_num_rows($result) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            if($row['category']==$row1['category_id']){
                                $selected='selected';
                            }else{
                                $selected='';
                            }
                            echo "<option $selected value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post Image</label><br>
                <input type="file" name="new_img" ><br><br>
                <img src="upload/<?php echo $row['post_img']; ?>" alt="Error" height="125px">
                <input type="hidden" name="old_img" value="<?php echo $row['post_img']; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-success btn-lg btn-block">
            </div>
        </form>
        <?php
            }
        }else{
            echo 'Not found';
        }
        ?>
    </div>
</body>

</html>