<?php
ini_set('display_errors', 1);

$fd = fopen('products.json', 'r');
$contents = fread($fd, filesize('products.json'));
fclose($fd);
$products = json_decode($contents, true);

include_once __DIR__ . '/view.php';
include_once __DIR__ . '/router.php';
render($route, [
    'products' => $products,
    'title' => 'Phone Shop'
]);







