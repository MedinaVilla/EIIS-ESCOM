<?php
    $request = $_SERVER['REQUEST_URI'];
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
        case "/EIIS-ESCOM/panel" :
            require __DIR__ . '/src/administrador/panel/panel.html';
            break;
        case "/EIIS-ESCOM/alumnos" :
            require __DIR__ . '/src/administrador/panel/alumnos/alumnos.html';
            break;
        case "/EIIS-ESCOM/reportes" :
            require __DIR__ . '/src/administrador/panel/reportes/reportes.html';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/src/404.html';
            break;
    }
?>