<?php
    $product_name = $_POST['product_name'] ?? '';
    $product_price = $_POST['product_price'] ?? 0;

    if ($product_name != '' && $product_price > 0) :
        include_once 'models/Product.php';
        $product = new Product($product_name, $product_price);
        if ($product->validate()) :
            $product->save();
    ?>
    <h3 class="text-success text-center">Товар <?=$product_name ?> успешно добавлен!</h3>
    <?php
        endif;
    else:
?>

<form class="col-12 offset-2" action="/index.php?r=admin" method="POST">
    <div class="row mt-3">
        <div class="col-2">
            <label for="product-name" class="form-label">Product name:</label>
        </div>
        <div class="col-10">
            <input type="text" name="product_name" id="product-name" class="form-control">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-2">
            <label for="product-price" class="form-label">Product price:</label>
        </div>
        <div class="col-10">
            <input type="number" name="product_price" id="product-price" class="form-control">
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Add new product</button>
        </div>
    </div>
</form>

<?php
    endif;