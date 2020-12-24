<!DOCTYPE html>
<html lang="en">
<head>
<title>Single page</title>
</head>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body>
    <?php
        include 'navbar.php';
    ?>

    <!-- Single News Start-->
    <div class="single-news ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="sn-container">
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
                        <div class="sn-content">
                            <span>
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <a href="category.php?cid=<?php echo $row['category']; ?>"><?php echo $row['category_name']; ?></a>
                            </span>&nbsp;
                            <span>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <a href="author.php?aid=<?php echo $row['author']; ?>"><?php echo $row['uname']; ?></a>
                            </span>&nbsp;
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <a href="#"><?php echo $row['post_date']; ?></a>
                            </span>
                            <h1 class="sn-title"><?php echo $row['title']; ?></h1>
                            <div class="sn-img">
                                <img src="admin/upload/<?php echo $row['post_img']; ?>" />
                            </div>
                            <hr>
                            <p><?php echo $row['description']; ?></p>
                        </div>
                        <?php
                            }
                        } else {
                            echo '<h1>No record found.</h1>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->
    <?php
    include 'footer.php';
    ?>
</body>

</html>