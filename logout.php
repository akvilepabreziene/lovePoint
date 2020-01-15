<?php

session_start();

 $_SESSION['login'] = 0;

 print_r($_SESSION['login']);

 header("Location: page_all_products.php");

