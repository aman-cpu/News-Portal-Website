<?php
include 'header.php';
include 'config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Post</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <h1>All Posts</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-md"><a style="color: white; text-decoration: none;" href="addpost.php">Add New Post</a></button>
            </div>
        </div>
        <br>
        <?php
        $limit = 3;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        if($_SESSION['role'] == '1'){
        $sql = "SELECT * FROM post 
                LEFT JOIN category ON post.category=category.category_id
                LEFT JOIN user ON post.author=user.user_id
                ORDER BY post.post_id DESC LIMIT $offset,$limit";
        }elseif($_SESSION['role'] == '0'){
        $sql = "SELECT * FROM post 
            LEFT JOIN category ON post.category=category.category_id
            LEFT JOIN user ON post.author=user.user_id
            WHERE post.author={$_SESSION['user_id']}
            ORDER BY post.post_id DESC LIMIT $offset,$limit";    
        }
        $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull');
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date</th>
                    <th scope="col">Author</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['post_id']; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><?php echo $row['post_date']; ?></td>
                        <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                        <td><button class="btn btn-primary btn-sm mr-3"><a style="color: white; text-decoration: none;" href="editpost.php?id=<?php echo $row['post_id']; ?>">Edit</a></button>
                            <button class="btn btn-danger btn-sm"><a style="color: white; text-decoration: none;" href="deletepost.php?id=<?php echo $row['post_id'];?>&catid=<?php echo $row['category'];?>">Delete</a></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
    $sql1 = "SELECT * FROM post";
    $result1 = mysqli_query($conn, $sql1) or die('Query Unsuccessfull');
    if (mysqli_num_rows($result1) > 0) {
        $total_records = mysqli_num_rows($result1);
        $total_page = ceil($total_records / $limit);
        echo '<ul class="pagination pagination-md justify-content-center">';
        if ($page > 1) {
            echo '<li class="page-item"><a style="margin: 0 7px;" class="page-link" href="post.php?page='.($page-1).'">Previous</a></li>';
        }
        for ($i = 1; $i <=$total_page; $i++) {
            if ($i == $page) {
                $active = 'active';
            } else {
                $active = '';
            }
            echo '<li class="page-item ' . $active . '"><a style="margin: 0 7px;"  class="page-link" href="post.php?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($total_page > $page) {
            echo '<li class="page-item"><a style="margin: 0 7px;"  class="page-link" href="post.php?page='.($page+1).'">Next</a></li>';
        }
        echo '</ul>';
    }
}

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>