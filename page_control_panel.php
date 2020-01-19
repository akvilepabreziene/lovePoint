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
                                <li class="nav-item position-relative">
                                    <?php if (isset($_SESSION['login'])) : ?>
                                    <a href="" class="dropdown-user dropdown-toggle menu" id="myAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['login']['user_name'] ?> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/><path d="M0 0h24v24H0z" fill="none"/></svg></a>
                                    <div class="dropdown-menu mt-2 position-absolute" aria-labelledby="myAccount">
                                        <a class="dropdown-item" href="page_control_panel.php">Valdymo panelė</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Užsakymai</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                <?php endif ?>
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