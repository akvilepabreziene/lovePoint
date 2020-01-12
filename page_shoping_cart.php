<?php 

    session_start();

    require('config/connection.php');
    include('header.php');
    require_once('models/product.php'); 
    require_once('models/picture.php'); 

    if(isset($_POST["add_to_cart"])) {
        
            if(isset($_SESSION["shopping_cart"])) {
                $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
                if(!in_array($_POST['hidden_id'], $item_array_id))
                    {
                    $count = count($_SESSION["shopping_cart"]);
 

                //get all item detail
                        $item_array = array(
                                'product_id'       =>   $_POST['hidden_id'],
                                'product_img'   =>   $_POST['hidden_image'],
                                'product_title'     =>   $_POST['hidden_title'],
                                'product_price'    =>   $_POST['hidden_price'],
                                'product_quantity' =>   $_POST['quantity']
                        );

                        $_SESSION["shopping_cart"][$count++] = $item_array;
                    }
                else
                {
                    // Ka daryti kai preke jau krepselyje?????
                }
            }
            else
            {
                //cart is empty excute this block
                 $item_array = array(
                                'product_id'       =>   $_POST['hidden_id'],
                                'product_img'       =>   $_POST['hidden_image'],
                                'product_title'     =>   $_POST['hidden_title'],
                                'product_price'    =>   $_POST['hidden_price'],
                                'product_quantity' =>   $_POST['quantity']
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
              if($value["product_id"] == $_GET["id"])
              {
                unset($_SESSION["shopping_cart"][$key]);

              }
            }
      }
    }

?>

<div class="container mt-3">
    <div class="w-100 text-right">
        <a href="page_all_products.php" class="back-to-shop">GRĮŽTI Į PARDUOTUVĘ</a>
    </div>


<?php 
    if(!empty($_SESSION["shopping_cart"])) {

    $_SESSION["suma"] = 0;
    foreach($_SESSION["shopping_cart"] as $cart_product) : 

    $_SESSION["suma"] += $cart_product['product_price'] * $cart_product['product_quantity']; ?>


    <div class="row mb-3">
        <div class="col-12 col-sm-6">
            <div class="row align-items-center">
                <div class="col-1">
                    <a href="page_shoping_cart.php?action=delete&id=<?php echo $cart_product['product_id'];?>"><svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg></a>
                </div>
                <div class="col-4 col-sm-2">
                    <img src="pictures/<?php echo $cart_product['product_img'] ?>" alt="" width="100%">
                </div>
                <div class="col">
                    <span><?php echo $cart_product['product_title'] ?></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="row h-100 align-items-center">
                <div class="col text-right">
                    <span id="price"><?php echo $cart_product['product_price'] ?> &euro;</span>
                </div>
                <div class="col text-right">
                    <input type="number" class="form-control ml-auto quantity px-1" min="1" name="product_Quantity" value="<?php echo $cart_product['product_quantity'] ?>">
                </div>
                <div class="col text-right">
                    <span name="product_sum"><?php echo $cart_product['product_price'] * $cart_product['product_quantity']?> &euro;</span>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; 
    ?><div class="w-100 text-right"><h5>Suma: <?php echo  $_SESSION["suma"]; ?> &euro;</h5></div>
    <?php }else { ?>
    <div class="row">
        <div class="card mx-3 my-5 card-bg text-center w-100">
            <div class="card-body">
                <h5 class="card-title my-3">Jūsų krepšelis tuščias :(</h5>
            </div>
        </div>
    </div>
    <? } ?>
</div>

<?php include('footer.php'); ?>