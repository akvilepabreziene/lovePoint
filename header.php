<?php

include 'modals/page_login_form.php';
include 'modals/page_register_form.php';
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
        <!-- Top link start -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="dropdown show mr-1">
                        <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            EN
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="">EN</a>
                            <a class="dropdown-item" href="">LT</a>
                        </div>
                    </div>
                    <div class="dropdown show">
                        <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            EUR
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="">EUR</a>
                            <a class="dropdown-item" href="">USD</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="top-link my-2">
                        <li>
                            <a href="">WISHLIST</a>
                        </li>
                        <li>
                            <a href="page_shoping_cart.php">MY CART</a>
                        </li>
                        <li>
                            <a href="">CHECKOUT</a>
                        </li>
                        <?php if (!isset($_SESSION['login'])) : ?>
                            <li>
                                <a href="" data-toggle="modal" data-target="#login_form">Login</a>
                            </li>
                        <?php endif ?>

                        <?php if (isset($_SESSION['login'])) : ?>

                            <li>
                                <a class="dropdown-user dropdown-toggle user_icon" id="myAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['login']['user_name'] ?> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                        <path d="M0 0h24v24H0z" fill="none" /></svg></a>
                                <div class="dropdown-menu mt-2" aria-labelledby="myAccount">
                                    <?php if (isset($_SESSION['admin'])) : ?>
                                        <a class="dropdown-item" href="page_control_panel.php">Valdymo panelė</a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif ?>
                                    <a class="dropdown-item" href="#">Užsakymai</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </li>

                        <?php endif ?>

                    </ul>
                </div>
            </div>

        </div>
        <!-- Top link end -->

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
                                    <a href="index.php" class="menu"><span>HOME</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php" class="menu"><span>ABOUT US</span></a>
                                </li>
                                <li class="nav-item categories">
                                    <div class="menu"><span>PRODUCTS</span></div>
                                    <div class="card pr-5 categories-list">
                                        <ul class="list-group list-group-flush">
                                            <li>
                                                <a href="page_all_products.php" class="list-group-item">VISI</a>
                                            </li>

                                            <?php while ($category = mysqli_fetch_assoc($categories)) : ?>

                                                <li>
                                                    <a href="page_all_products.php?category_id=<?php echo $category['id'] ?>" class="list-group-item"><?php echo $category['category_name'] ?></a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="menu" href="#"><span>BLOG</span></a>
                                </li>
                                <li class="nav-item">
                                    <div class="cart">
                                        <a class="" href="page_shoping_cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path d="M17.21 9l-4.38-6.56c-.19-.28-.51-.42-.83-.42-.32 0-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1h-4.79zM9 9l3-4.4L15 9H9zm3 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" /></svg></a>
                                        <?php if (isset($_SESSION["total_quantity"]) && $_SESSION['total_quantity'] > 0) : ?>

                                            <div class="cart-counter"><?php echo $_SESSION['total_quantity'] ?></div>

                                        <?php endif ?>

                                    </div>
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