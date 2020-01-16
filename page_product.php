<?php 

    include('header.php');
    require_once('models/product.php'); 
    require_once('models/picture.php'); 

     if (isset($_GET['id'])) {  

        $id = $_GET['id'];  
        $product = getProduct($id);
        $picture = getPicture($id);
 }
 
?>
    <!-- Product page -->
    <div class="container">
        <div class="row my-5">
            <aside class="col-sm-5 col-xs-6 mb-3">
                <div><img class="w-100 zoom-img" src="pictures/<?php echo $picture['picture_name'] ?>" alt=""></div>
            </aside>
            <main class="col-sm-7 col-xs-6">
                <div class="product-header pl-2 mb-3">
                    <h2><?php echo $product['title'] ?></h2>
                </div>
                <div class="description pt-2">
                    <p><?php echo $product['material'] ?></p>
                </div>
                <div class="description pt-2">
                    <p><?php echo $product['description'] ?></p>
                </div>
                <div class="description pt-2">
                    <p>Kodas: <?php echo $product['product_code'] ?></p>
                </div>
                <div class="price"><?php echo $product['price'] ?> &euro;</div>
                <div class="my-3">
                    <form action="page_shoping_cart.php" method="POST" class="form-inline">
                        <label for="quantity">Quantity: </label>
                        <input type="number" min="1" class="form-control ml-2 quantity px-1" name="quantity" value="1">
                        <input type="hidden" name="hidden_title" value="<?php echo $product['title'] ?>">
                        <input type="hidden" name="hidden_image" value="<?php echo $picture['picture_name'] ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $product['price'] ?>">
                        <input type="hidden" name="hidden_id" value="<?php echo $product['id'] ?>">
                        <input type="submit" name="add_to_cart" class="btn btn-secondary ml-2 add-to-cart" id=add_to_cart value="ADD TO CART" >
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!-- Product end -->


<?php include 'footer.php';?>
