<?php 

    include('header.php');
    require_once('models/product.php'); 
    require_once('models/picture.php'); 

     if (isset($_GET['id'])) {  

        $id = $_GET['id'];  
        $product = getProduct($id);
        $picture = getPicture($id);
        $categories = getAllCategories();
 }
 
?>
    <!-- Product page -->
    <div class="container">
        <div class="row my-5">
            <aside class="col-sm-5 col-xs-6 mb-3">
                <div><img class="w-100 zoom-img" src="pictures/<?php echo $picture['picture_name'] ?>" alt=""></div>
            </aside>
            <main class="col-sm-7 col-xs-6">
                <div class="my-3">
                    <form method="POST" action="edit_product.php?id=<?php echo $product['id'] ?>">
                        <input type="hidden" name="hidden_image" value="<?php echo $picture['picture_name'] ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $product['title'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="product_code" placeholder="Product code" value="<?php echo $product['product_code'] ?>">
                        </div>
                         <div class="form-group">
                            <label for="price">Price: </label>
                            <input type="number" min="1" class="form-control col-5" name="price" value="<?php echo $product['price'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="material" placeholder="Material" value="<?php echo $product['material'] ?>">
                        </div>
                        <div class="form-group">
                         <textarea class="form-control" name="description" rows="3" placeholder="Description"><?php echo $product['description'] ?></textarea>
                        </div>
                         <div class="form-group">
                            <label for="quantity">Quantity: </label>
                            <input type="number" min="1" class="form-control col-5" name="quantity" value="<?php echo $product['quantity'] ?>">
                        </div>
                        <div class="form-group">
                            <select class="form-control col-5" name="category_id">
                                <option selected>Choose...</option>
                                 <?php while ( $category = mysqli_fetch_assoc($categories)) : ?>

                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>

                                <?php endwhile; ?>
                                
                            </select>
                        </div>
                         <input type="submit" class="btn btn-secondary add-to-cart" value="SAVE" >
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!-- Product end -->


<?php include 'footer.php';?>