<!DOCTYPE html>
<html lang="en">
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10  mx-auto">
                <ul class="nav nav-pills nav-justified">
                    <li style="background: #FF6F61;" class="nav-item">
                        <a style="color: white;" class="nav-link" data-toggle="pill">All Posts</a>
                    </li>
                </ul>
                <!-- <h2 style="border-bottom: 3px solid black;">All Posts</h2> -->
                <?php
                include 'config.php';
                $limit = 3;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
                $sql = "SELECT * FROM post 
                    LEFT JOIN category ON post.category=category.category_id
                    LEFT JOIN user ON post.author=user.user_id
                    ORDER BY post.post_id DESC LIMIT $offset,$limit";
                $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull');
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <div class="card mb-3">
                            <div class="container row">
                                <div class="col-md-4 mt-3">
                                    <a href="single.php?id=<?php echo $row['post_id'] ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" class="card-img" alt="..."></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="single.php?id=<?php echo $row['post_id'] ?>"><?php echo $row['title']; ?></a></h5>
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
                                        <p class="card-text"><?php echo substr($row['description'], 0, 130) . "..."; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <a class="btn btn-secondary mb-2 mr-3" href="single.php?id=<?php echo $row['post_id'] ?>" role="button">Read More</a>
                            </div>
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
    <?php
    $sql1 = "SELECT * FROM post";
    $result1 = mysqli_query($conn, $sql1) or die('Query Unsuccessfull');
    if (mysqli_num_rows($result1) > 0) {
        $total_records = mysqli_num_rows($result1);
        $total_page = ceil($total_records / $limit);
        echo '<ul class="pagination pagination-md justify-content-center">';
        if ($page > 1) {
            echo '<li class="page-item"><a style="margin: 0 7px;" class="page-link" href="index.php?page=' . ($page - 1) . '">Previous</a></li>';
        }
        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $page) {
                $active = 'active';
            } else {
                $active = '';
            }
            echo '<li class="page-item ' . $active . '"><a style="margin: 0 7px;"  class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($total_page > $page) {
            echo '<li class="page-item"><a style="margin: 0 7px;"  class="page-link" href="index.php?page=' . ($page + 1) . '">Next</a></li>';
        }
        echo '</ul>';
    }

    ?>

    <!-- Tab News Start-->

    <div class="tab-news">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill">Recent Posts</a>
                        </li>
                        <?php
                        include 'config.php';
                        $limit = 3;

                        $sql = "SELECT * FROM post 
                                LEFT JOIN category ON post.category=category.category_id
                                LEFT JOIN user ON post.author=user.user_id
                                ORDER BY post.post_id DESC LIMIT $limit";
                        $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull: Recent Posts');
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    </ul>
                    <div class="tab-content">
                        <div id="m-viewed" class="container tab-pane active">
                            <div class="tn-news">
                                <div class="tn-img">
                                    <a href="single.php?id=<?php echo $row['post_id'] ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" /></a>
                                </div>
                                <div class="tn-title">
                                    <p class="card-title"><a href="single.php?id=<?php echo $row['post_id'] ?>"><?php echo $row['title']; ?></a></p>
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <a href="category.php?cid=<?php echo $row['category']; ?>"><?php echo $row['category_name']; ?></a>
                                    </span>&nbsp;
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <a href="#"><?php echo $row['post_date']; ?></a><br><br>
                                    <p class="card-text"><?php echo substr($row['description'], 0, 130) . "...   "; ?><a style="color: blue;" href="single.php?id=<?php echo $row['post_id'] ?>">Read More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                            }
                        }
            ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Tab News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="sw-title">News Category</h2>
                            <div class="category">
                                <?php
                                $sql2 = "SELECT * FROM category WHERE post > 0";
                                $result2 = mysqli_query($conn, $sql2) or die('Query Unsuccessfull');
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                        <ul>
                                            <li><a href="category.php?cid=<?php echo $row2['category_id']; ?>"><?php echo $row2['category_name']; ?></a><span>(<?php echo $row2['post']; ?>)</span></li><br>
                                        </ul>
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                                } else {
                                    echo '<h1>No record found.</h1>';
                                }
            ?>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>