<?php
    $request = $_SERVER['REQUEST_URI'];
    echo "<script>console.log(".$request.");</script>";
    switch ($request) {
        case "/EIIS-ESCOM/" :
            require __DIR__ . '/index.html';
            break;
        case "/EIIS-ESCOM" :
            require __DIR__ . '/index.html';
            break;
        case "/EIIS-ESCOM/registro" :
            require __DIR__ . '/src/registro/registro.html';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/src/404.html';
            break;
    }
?>