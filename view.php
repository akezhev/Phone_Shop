<?php

function render(string $page_name, array $args=[]) {
    
    $page_path = __DIR__ . '/views/' . $page_name . '.php';

    if (!file_exists($page_path)){
        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found. There is no page you are looking for!';
        exit();
    }

    extract($args);
    ob_start();
    include $page_path;
    $content = ob_get_clean();
    include __DIR__ . '/layout.php';
} 