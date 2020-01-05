<?php include 'modals/sign-in_modal.php'; ?>

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
                            <a href="" data-toggle="modal" data-target="#exampleModal">MY ACOUNT</a>
                        </li>
                        <li>
                            <a href="">WISHLIST</a>
                        </li>
                        <li>
                            <a href="">MY CART</a>
                        </li>
                        <li>
                            <a href="">CHECKOUT</a>
                        </li>
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
                                    <a href="all_products.php" class="menu"><span>PRODUCTS</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle menu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span> COLLECTION</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="menu" href="#"><span>BLOG</span></a>
                                </li>
                                <li class="nav-item">
                                    <div>
                                        <a class="" href="#"><svg class="fa-search" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg></a>
                                        <a class="" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M17.21 9l-4.38-6.56c-.19-.28-.51-.42-.83-.42-.32 0-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1h-4.79zM9 9l3-4.4L15 9H9zm3 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/></svg></a>
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