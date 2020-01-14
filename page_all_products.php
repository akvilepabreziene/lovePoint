<?php 

    require('config/connection.php');
    include('header.php');
    require_once('models/product.php'); 
    require_once('models/picture.php'); 

$products = getAllProducts(); 


?>

<div class='container my-5'>
   <div class="row">

 <?php while ( $product = mysqli_fetch_assoc($products)) : 
    
    $picture = getPicture($product['id']); ?>

        <div class='col-6 col-sm-3 mb-3'>
            <div class='card zoom-img'>
                <a href='page_product.php?id=<?php echo $product['id'] ?>'><img src='pictures/<?php echo $picture['picture_name'] ?>' class='card-img-top' alt='...'></a>
                <div class='card-body p-2'>
                    <div class='row mx-auto align-items-center'>
                        <div class='col-12 col-sm-6'>
                            <h5 class='card-title my-auto'><?php echo $product['title'] ?></h5>
                        </div>
                        <div class='col'>
                            <div class='row align-items-center'>
                                <div class='col-9 px-0'>
                                    <span class='products-price my-0'><?php echo $product['price'] ?>&euro;</span>
                                </div>
                                <div class='col-3 px-0'>
                                    <form action="page_shoping_cart.php" method="POST">
                                        <input type="hidden" min="1" class="form-control ml-2 quantity px-1" name="quantity" value="1">
                                        <input type="hidden" name="hidden_title" value="<?php echo $product['title'] ?>">
                                        <input type="hidden" name="hidden_image" value="<?php echo $picture['picture_name'] ?>">
                                        <input type="hidden" name="hidden_price" value="<?php echo $product['price'] ?>">
                                        <input type="hidden" name="hidden_id" value="<?php echo $product['id'] ?>">
                                        <input type="hidden" name="add_to_cart" value="">
                                        <button type="submit" class="btn p-0" name="add_to_cart"><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'><path d='M0 0h24v24H0z' fill='none'/><path d='M17.21 9l-4.38-6.56c-.19-.28-.51-.42-.83-.42-.32 0-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1h-4.79zM9 9l3-4.4L15 9H9zm3 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z'/></svg></button>
                                    </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php endwhile; ?>      
   </div>
</div> 


<?php include 'footer.php';?>