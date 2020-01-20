<?php 


    include('header.php');
    require_once('models/product.php'); 
    require_once('models/picture.php'); 
    require_once('models/category.php'); 


 if(isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $products = getProductsByCategory($category_id);
 } else {
    $products = getAllProducts(); 
 }


?>
<div class='container my-5'>
   <div class="row">

 <?php while ( $product = mysqli_fetch_assoc($products)) : 
    
    $picture = getPicture($product['id']); ?>


        <div class='col-6 col-sm-3 mb-3'>
            <div class='card zoom-img'>
                <?php  if (isset($_SESSION['admin'])) : ?>
                    
                <div class="control-panel h-100">
                    <div class="control-button trash p-2 mb-3"> 
                        <form method='post' action='delete_product.php?id=<?php echo $product['id'] ?>'>
                            <input type='hidden' name='file_name' value="<?php echo $picture['picture_name']?>">
                            <button type='submit' name='delete_file' class="delete" value='Delete File'>
                                <svg aria-hidden="true"  width="30" height="30" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                         </form>
                    </div>
                    <div class="control-button p-2">
                        <a href="page_edit_product.php?id=<?php echo $product['id'] ?>"><svg aria-hidden="true" width="30" height="30" focusable="false" data-prefix="fas" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg></a>
                    </div>
                </div>
                <?php endif ?>
                
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