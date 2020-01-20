<?php

include('header.php');

$customer = [];
$customer['user_name'] = '';
$customer['lastname'] = '';
$customer['email'] = '';


if (isset($_SESSION["login"])) {
    $customer = $_SESSION["login"];
}
?>

<div class="container mt-3">
    <h3 class="mb-3">UŽSAKYMO INFORMACIJA</h3>
    <div class="order_form_error"></div>
    <form method="POST" >
        <div class="row">
            <div class="col-xs-12 col-sm-7">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <small class="form-text text-muted">Vardas</small>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $customer['user_name']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <small class="form-text text-muted">Pavardė</small>
                        <input type="text" class="form-control" id="customer_lastname" name="customer_lastname" value="<?php echo $customer['lastname']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <small class="form-text text-muted">Gatvė</small>
                        <input type="text" class="form-control" id="street" name="street" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <small class="form-text text-muted">Namo (buto) nr.</small>
                        <input type="text" class="form-control" id="house_number" name="house_number" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <small class="form-text text-muted">Pašto kodas <a href="https://post.lt/pasto-kodu-ir-adresu-paieska" target="_blank">(Rasti kodą?)</a></small>
                        <input type="text" class="form-control" id="post_code" name="post_code" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <small class="form-text text-muted">Miestas</small>
                        <input type="text" class="form-control" id="city" name="city" value="">
                    </div>
                </div>
                <div class="form-group">
                    <small class="form-text text-muted">El.paštas</small>
                    <input type="email" class="form-control" id="customer_email" name="customer_email" aria-describedby="emailHelp" value="<?php echo $customer['email']; ?>">
                </div>
                <div class="form-group">
                    <small class="form-text text-muted">Telefonas</small>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">+</span>
                        </div>
                        <input type="text" class="form-control" id="customer_phone" name="customer_phone" aria-label="Username" aria-describedby="basic-addon1" placeholder="370XXXXXXXX" value="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text text-info">Paspaudus PIRKTI, jums el.paštu bus išsiųsta sąskaita apmokėjimui. Gavę apmokėjimą pradėsime vykdyti užsakymą.</p>
                        <h4 class="card-title text-right mt-5">MOKĖTI: <?php echo $_SESSION["total_sum"] . " &euro;" ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row line pt-3 mt-3">
            <div class="col">
                <a href="page_shoping_cart.php" type="button" class="btn btn-outline-info">GRĮŽTI</a>
            </div>
            <div class="col text-right">
                <button type="button" id="order_form_submit" class="btn btn-info">PIRKTI</button>
            </div>
        </div>
    </form>
</div>

































<?php include('footer.php'); ?>