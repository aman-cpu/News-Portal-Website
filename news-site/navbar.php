<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HomePage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
    <meta content="Bootstrap News Template - Free HTML Templates" name="description">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="js/type.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Brand Start -->
    <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="b-ads">
                        <h3>
                            <a href="" class="typewrite" data-period="2000"
                                data-type='[ "Welcome to the World of News.","This Site Create Your Day Awesome"]'>
                                <span class="wrap"></span>
                            </a>
                        </h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="b-search">
                        <form action="search.php" method="get">
                            <input style="float: right;" class="ml-4" type="text" name="search" placeholder="Search..">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->


    <!-- Brand End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href='index.php' class='nav-item nav-link'>Home</a>
                        <?php
                        include 'config.php';
                        if(isset($_GET['cid'])){
                            $cat_id=$_GET['cid'];
                        }
                            $sql="SELECT * FROM category WHERE post > 0";
                            $result = mysqli_query($conn, $sql) or die('Query Unsuccessfull: category');
                            if (mysqli_num_rows($result) > 0) {
                                $active='';
                        ?>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                if(isset($_GET['cid'])){
                                    if($row['category_id']==$cat_id){
                                        $active='active';
                                    }else{
                                        $active='';
                                    }
                                }
                            echo "<a href='category.php?cid={$row['category_id']}' class='nav-item nav-link {$active}'>{$row['category_name']}</a>";
                            }
                        ?>
                    <a href='contact.php' class='nav-item nav-link'>Contact</a>
                    </div>
                    <?php 
                        }
                    ?>
                    <div class="social ml-auto">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div><br>
    <!-- Nav Bar End -->
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>