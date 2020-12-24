<?php
include 'header.php';
include 'config.php';
if($_SESSION['role'] == '0'){
    header('Location:post.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <h1>All Categories</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-md"><a style="color: white; text-decoration: none;" href="addpost.php">Add New Category</a></button>
            </div>
        </div>
        <br>
        <?php
        $limit = 5;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        if($_SESSION['role'] == '1'){
        $sql = "SELECT * FROM category LIMIT $offset,$limit";
        }
        $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull');
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">No. of Posts</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['category_id']; ?></th>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><?php echo $row['post']; ?></td>
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
    $sql1 = "SELECT * FROM category";
    $result1 = mysqli_query($conn, $sql1) or die('Query Unsuccessfull');
    if (mysqli_num_rows($result1) > 0) {
        $total_records = mysqli_num_rows($result1);
        $total_page = ceil($total_records / $limit);
        echo '<ul class="pagination pagination-md justify-content-center">';
        if ($page > 1) {
            echo '<li class="page-item"><a style="margin: 0 7px;" class="page-link" href="category.php?page='.($page-1).'">Previous</a></li>';
        }
        for ($i = 1; $i <=$total_page; $i++) {
            if ($i == $page) {
                $active = 'active';
            } else {
                $active = '';
            }
            echo '<li class="page-item ' . $active . '"><a style="margin: 0 7px;"  class="page-link" href="category.php?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($total_page > $page) {
            echo '<li class="page-item"><a style="margin: 0 7px;"  class="page-link" href="category.php?page='.($page+1).'">Next</a></li>';
        }
        echo '</ul>';
    }
}

?>
</body>
</html>