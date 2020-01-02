<?php include 'header.php';?>

    <!-- Product page -->
    <div class="container">
        <div class="row my-5">
            <aside class="col-sm-5 col-xs-12 mb-3">
                <div><img class="w-100 zoom-img" src="pictures/product-1.jpg" alt=""></div>
            </aside>
            <main class="col-sm-7 col-xs-12">
                <div class="product-header pl-2 mb-3">
                    <h2>Amazing reflective mittens</h2>
                </div>
                <div class="description py-3">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
                <div class="price">30 &euro;</div>
                <div class="my-3">
                    <form class="form-inline">
                          <label for="quantity">Quantity: </label>
                          <input type="number" class="form-control ml-2" name="quantity" id="quantity" value="1">
                        <button type="submit" class="btn btn-secondary ml-2 add-to-cart">ADD TO CART</button>
                      </form>
                </div>
            </main>
        </div>
    </div>


    <!-- Product end -->


<?php include 'footer.php';?>
