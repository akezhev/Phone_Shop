<?php
foreach($products as $product):
?>
<div class="card mt-3">
    <div class="card-header">
        <h5  class="card-title"><?=$product["name"]?></h5>
        <p class="card-text"><?=$product["price"]?> $</p>
        <button type="button" class="btn btn-success">Buy</button>
    </div>                  
</div>
<?php
endforeach;
