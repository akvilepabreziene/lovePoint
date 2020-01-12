<?php
//connection to database
  session_start();

   define('DB_NAME', 'cart');
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

    if(isset($_POST["add_to_cart"]))
    {
      if(isset($_SESSION["shopping_cart"]))
      {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
          $count = count($_SESSION["shopping_cart"]);
    //get all item detail
            $item_array = array(
                      'item_id'       =>   $_GET["id"],
                      'product_img'     =>   $_POST["hidden_image"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]

            );
            $_SESSION["shopping_cart"][$count++] = $item_array;
        }
        else
        {
         
          echo '<script>window.location = "index.php"</script>';
        }
      }
      else
      {
        //cart is empty excute this block
         $item_array = array(
                      'item_id'       =>   $_GET["id"],
                      'product_img'   =>   $_POST["hidden_image"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]

            );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
    }
//Remove item in cart 
    if(isset($_GET["action"]))
    {
      if($_GET["action"] == "delete")
      {
        foreach($_SESSION["shopping_cart"] as $key=>$value)
            {
              if($value["item_id"] == $_GET["id"])
              {
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("Item removed")</script>';
                echo '<script>window.location="indax.php</script>';
              }
            }
      }
    }





?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>PHP Webslesson Tutorial | Simple PHP Mysql Shopping Cart</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:700px;">  
                <h3 text="center">Simple PHP Mysql Shopping Cart</h3><br />  
                  <?php
                    $qury = "SELECT * FROM tbl_product ORDER BY id ASC";
                    $result = mysqli_query($connect,$qury);
                    if(mysqli_num_rows($result) > 0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {

                  ?>
                <div class="col-md-4">  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"];?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" text="center">  
                               <img src="image/<?php echo $row['image'];?>" class="img-responsive" style="    width: 100px;" /><br />  
                               <h4 class="text-info"><?php echo $row['name'];?></h4>  
                               <h4 class="text-danger">$<?php echo $row['price'];?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row['name'] ?>" />
                           <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">


                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                  <?php } } ?>
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details <b style="color: red">Please Subscribe my Channel</b></h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr> 
                              <th>product image</th> 
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                             <?php 
                           if(!empty($_SESSION["shopping_cart"]))
                           {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $key => $value)
                           {

                             ?>
                          <tr> 
                               <td><img src="image/<?php echo $value['product_img'];?>" style="width: 100px;"></td>
                             
                               <td><?php echo $value['item_name'];?></td>  
                               <td><?php echo $value['item_quantity']; ?></td>  
                               <td>$<?php echo $value['item_price'];?></td>  
                               <td>$<?php echo number_format($value["item_quantity"] * $value["item_price"],2);?></td>  
                               <td><a href="index.php?action=delete&id=<?php  echo $value['item_id'];?>"><span class="btn btn-danger">Remove</span></a></td>  
                          </tr>  
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
                        }
                        ?>
                           
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$<?php echo number_format($total);?></td>  
                               <td></td>  
                          </tr> 
                          <?php } ?> 
                           
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>