<?php

 define('DB_NAME', 'lovepoint');
 define('DB_TYPE', 'localhost');
 define('MYSQL_USER_NAME', 'root');
 define('MYSQL_USER_PASS', 'root');

 define('DEBUG_MODE', '0'); //0 - isjungta, 1 - rodo pagrindinius, 2 - rodo visus pranesimus

$connect = mysqli_connect(DB_TYPE, MYSQL_USER_NAME, MYSQL_USER_PASS, DB_NAME);

mysqli_set_charset($connect, "UTF8"); 

 function getConnect() {

 global $connect;

     if (!$connect) {
         if (DEBUG_MODE > 0 ) {
         echo "ERROR: nepavyko prisijungti prie DB!!! <br>";
         echo mysqli_connect_error($connect);
     }
         return NULL;
     } else {
         if (DEBUG_MODE > 1) {
             echo "Prisijungiau prie duomenu bazes <br>";
         }
         return $connect;
     }
 }

 getConnect();