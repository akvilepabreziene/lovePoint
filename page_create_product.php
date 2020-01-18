<?php 

    include('header.php');
        $categories = getAllCategories();
 
?>
    <!-- Product page -->
    <div class="container">
        <div class="row my-5">
            <main class="col-sm-7 col-xs-6">
                <div class="my-3">
                    <form method="POST" action="create_product.php" enctype="multipart/form-data">
                        <input type="hidden" name="hidden_image" value="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Title" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="product_code" placeholder="Product code" value="">
                        </div>
                         <div class="form-group">
                            <label for="price">Price: </label>
                            <input type="number" min="1" class="form-control col-5" name="price" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="material" placeholder="Material" value="">
                        </div>
                        <div class="form-group">
                         <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                        </div>
                         <div class="form-group">
                            <label for="quantity">Quantity: </label>
                            <input type="number" min="1" class="form-control col-5" name="quantity" value="">
                        </div>
                        <div class="form-group">
                            <select class="form-control col-5" name="category_id">
                                <option selected>Choose...</option>
                                 <?php while ( $category = mysqli_fetch_assoc($categories)) : ?>

                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>

                                <?php endwhile; ?>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fileToUpload">Upload product picture</label>
                            <input type="file" class="form-control-file" value="Upload Image" name="fileToUpload" id="fileToUpload">
                        </div>
                         <input type="submit" name="submit" class="btn btn-secondary add-to-cart" value="SAVE" >
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!-- Product end -->


<?php include 'footer.php';?>