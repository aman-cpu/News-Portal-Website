<!DOCTYPE html>
<html lang="en">
<head>
<title>Serach page Results</title>
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <?php
        include 'config.php';
        if (isset($_GET['search'])) {
            $search_term = mysqli_real_escape_string($conn, $_GET['search']);
        ?>
            <div>
                <h2 style="border-bottom: 3px solid black;">Search Results : <?php echo $search_term; ?></h2>
            </div>
            <?php
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
                WHERE post.title LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%'
                ORDER BY post.post_id DESC LIMIT $offset,$limit";
            $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull');
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="card mb-3" style="max-width: 840px;">
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
                                    <a href="category.php"><?php echo $row['post_date']; ?></a>
                                    </span>
                                    <p class="card-text"><?php echo substr($row['description'], 0, 130) . "..."; ?></p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1 mr-1" style="text-align: right;">
                            <a class="btn btn-secondary" href="single.php?id=<?php echo $row['post_id'] ?>" role="button">Read More</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<h1>No record found.</h1>';
            }
        }
            ?>
    </div>
    <?php
            $sql1 = "SELECT * FROM post WHERE post.title LIKE '%{$search_term}%'";
            $result1 = mysqli_query($conn, $sql1) or die('Query Unsuccessfull');
            if (mysqli_num_rows($result1) > 0) {
                $total_records = mysqli_num_rows($result1);
                $total_page = ceil($total_records / $limit);
                echo '<ul class="pagination pagination-md justify-content-center">';
                if ($page > 1) {
                    echo '<li class="page-item"><a style="margin: 0 7px;" class="page-link" href="search.php?search=' . $search_term . '&page=' . ($page - 1) . '">Previous</a></li>';
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    echo '<li class="page-item ' . $active . '"><a style="margin: 0 7px;"  class="page-link" href="search.php?search=' . $search_term . '&page=' . $i . '">' . $i . '</a></li>';
                }
                if ($total_page > $page) {
                    echo '<li class="page-item"><a style="margin: 0 7px;"  class="page-link" href="search.php?search=' . $search_term . '&page=' . ($page + 1) . '">Next</a></li>';
                }
                echo '</ul>';
            }
    ?>
</body>

</html>