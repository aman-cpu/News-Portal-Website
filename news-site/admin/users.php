<?php
include 'header.php';
include 'config.php';
if($_SESSION['role'] == '0'){
    header('Location:post.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Users</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <h1>All Users</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-md"><a style="color: white; text-decoration: none;" href="adduser.php">Add New User</a></button>
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
        $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT $offset,$limit";
        $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull');
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno=1
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['user_id']; ?></th>
                        <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                        <td><?php echo $row['uname']; ?></td>
                        <td><?php if ($row['role'] == '0')
                                echo 'Normal';
                            else
                                echo 'Admin';
                            ?>
                        </td>
                        <td><button class="btn btn-primary btn-sm mr-3"><a style="color: white; text-decoration: none;" href="edituser.php?id=<?php echo $row['user_id']; ?>">Edit</a></button>
                            <button class="btn btn-danger btn-sm"><a style="color: white; text-decoration: none;" href="deleteuser.php?id=<?php echo $row['user_id']; ?>">Delete</a></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
    $sql1 = "SELECT * FROM user";
    $result1 = mysqli_query($conn, $sql1) or die('Query Unsuccessfull');
    if (mysqli_num_rows($result1) > 0) {
        $total_records = mysqli_num_rows($result1);
        $total_page = ceil($total_records / $limit);
        echo '<ul class="pagination pagination-md justify-content-center">';
        if ($page > 1) {
            echo '<li class="page-item"><a style="margin: 0 7px;" class="page-link" href="users.php?page='.($page-1).'">Previous</a></li>';
        }
        for ($i = 1; $i <=$total_page; $i++) {
            if ($i == $page) {
                $active = 'active';
            } else {
                $active = '';
            }
            echo '<li class="page-item ' . $active . '"><a style="margin: 0 7px;"  class="page-link" href="users.php?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($total_page > $page) {
            echo '<li class="page-item"><a style="margin: 0 7px;"  class="page-link" href="users.php?page='.($page+1).'">Next</a></li>';
        }
        echo '</ul>';
    }
}

?>
<!-- <nav aria-label="...">
  <ul class="pagination pagination-md justify-content-center">
    <li class="page-item active" aria-current="page">
      <span class="page-link">
        1
        <span class="sr-only">(current)</span>
      </span>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  
</nav> -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>