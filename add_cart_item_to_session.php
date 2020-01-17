<?php 

    if(isset($_POST["add_to_cart"])) {
        
            if(isset($_SESSION["shopping_cart"])) {

                $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
                if(!in_array($_POST['hidden_id'], $item_array_id))
                    {
 
                    $count = count($_SESSION["shopping_cart"]);
 
                //get all item detail
                        $item_array = array(
                            'product_id'       =>   $_POST['hidden_id'],
                            'product_img'      =>   $_POST['hidden_image'],
                            'product_title'    =>   $_POST['hidden_title'],
                            'product_price'    =>   $_POST['hidden_price'],
                            'product_quantity' =>   $_POST['quantity']
                        );

                        $_SESSION["shopping_cart"][$count] = $item_array;
                        $_SESSION["total_quantity"] += $item_array['product_quantity'];
                        $_SESSION["total_sum"] += $item_array['product_quantity'] * $item_array['product_price'];
                        header("Location: page_all_products.php");
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
                    'product_img'      =>   $_POST['hidden_image'],
                    'product_title'    =>   $_POST['hidden_title'],
                    'product_price'    =>   $_POST['hidden_price'],
                    'product_quantity' =>   $_POST['quantity']
                    );

                $_SESSION["shopping_cart"][0] = $item_array;
                $_SESSION["total_quantity"] += $item_array['product_quantity'];
                $_SESSION["total_sum"] += $item_array['product_quantity'] * $item_array['product_price'];
                    header("Location: page_all_products.php");
            }
        }