<?php


include('header.php');
include('add_cart_item_to_session.php');
require_once('models/product.php');
require_once('models/picture.php');
include('delete_cart_item_from_session.php');
include('modals/page_customer_panel.php');

?>

<div class="container mt-3">
    <div class="w-100 text-right">
        <a href="page_all_products.php" class="back-to-shop">GRĮŽTI Į PARDUOTUVĘ</a>
    </div>

    <?php
    if (!empty($_SESSION["shopping_cart"])) {

        $_SESSION["suma"] = 0;
        foreach ($_SESSION["shopping_cart"] as $cart_item) :

            // counting one cart list item total price
            $_SESSION["suma"] += $cart_item['product_price'] * $cart_item['product_quantity']; ?>

            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="row align-items-center">
                        <div class="col-1" id="">
                            <a href="page_shoping_cart.php?action=delete&id=<?php echo $cart_item['product_id']; ?>"><svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                    <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                                </svg></a>
                        </div>
                        <div class="col-4 col-sm-2">
                            <img src="pictures/<?php echo $cart_item['product_img'] ?>" alt="" width="100%">
                        </div>
                        <div class="col">
                            <span><?php echo $cart_item['product_title'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="row h-100 align-items-center">
                        <div class="col text-right">
                            <div><span class="product-price-<?php echo $cart_item['product_id'] ?>"><?php echo $cart_item['product_price'] ?></span> &euro;</div>
                        </div>
                        <div class="col text-right">
                            <input type="number" class="form-control ml-auto quantity px-1" min="1" id="<?php echo $cart_item['product_id'] ?>" name="product_Quantity" value="<?php echo $cart_item['product_quantity'] ?>">
                        </div>
                        <div class="col text-right">
                            <div class="product-sum-<?php echo $cart_item['product_id'] ?>"><?php echo $cart_item['product_price'] * $cart_item['product_quantity'] ?> &euro;</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;
        ?><div class="w-100 text-right">
            <h5 class="total_sum"><?php if (isset($_SESSION["total_sum"])) {
                echo $_SESSION['total_sum'] . " &euro;";
            } ?></h5>
        </div>
        <div class="w-100 text-right line">
        <?php if (!isset($_SESSION['login'])) { ?>
            <button type="button" id="" class="btn btn-info mt-2" data-toggle="modal" data-target="#customer_panel">Pirkti</button>
        <?php } else { ?>
            <a href="page_order_form.php" type="button" id="" class="btn btn-info mt-2">Pirkti</a>
        <?php } ?>

        </div>
    <?php } else {
        $_SESSION["total_quantity"] = 0;
    ?>
        <div class="row">
            <div class="card mx-3 my-5 card-bg text-center w-100">
                <div class="card-body">
                    <h5 class="card-title my-3 cart-message">Jūsų krepšelis tuščias :(</h5>
                </div>
            </div>
        </div>
    <? } ?>
</div>

<?php include('footer.php'); ?>