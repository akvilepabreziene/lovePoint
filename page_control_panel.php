<?php 

    require('config/connection.php');
    require_once('models/category.php'); 
    session_start(); 

    $categories = getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LovePoint</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <!-- Header start -->
    <header class="">
        <!-- Dark menu line start -->
        <div class="dark-header">
            <div class="container">
                <div class="">
                    <nav class="navbar navbar-expand-lg navbar-dark px-0">
                        <a class="navbar-brand col-3 pl-0 py-0" href="index.php"><img src="pictures/logo-lovePoint.png" alt="" height="80"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse col-lg-9" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="page_create_product.php" class="menu"><span>NAUJAS PRODUKTAS</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php" class="menu"><span>UŽSAKYMAI</span></a>
                                </li>
                                <li class="nav-item categories">
                                    <div class="menu"><span>PRODUKTAI</span></div>
                                    <div class="card pr-5 categories-list">
                                        <ul class="list-group list-group-flush">
                                            <li>
                                                <a href="page_all_products.php" class="list-group-item">VISI</a>
                                            </li>

                                         <?php while ( $category = mysqli_fetch_assoc($categories)) : ?>

                                            <li>
                                                <a href="page_all_products.php?category_id=<?php  echo $category['id'] ?>" class="list-group-item"><?php  echo $category['category_name'] ?></a>
                                            </li>
                                        <?php endwhile; ?>   
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="menu" href="#"><span>BLOG</span></a>
                                </li>
                            </ul>
                        </div>
                      </nav>
                </div>
            </div>
        </div>
        <!-- Dark menu line end -->
    </header>
    <!-- Header end -->


    <script type="text/javascript" src="libs/jquery-3.4.1.min.js"> </script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.bundle.min.js"> </script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>