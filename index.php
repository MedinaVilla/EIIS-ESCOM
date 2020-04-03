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
            require __DIR__ . '/src/alumno/registro/registro.html';
            break;
        case "/EIIS-ESCOM/panel" :
            require __DIR__ . '/src/administrador/panel/panel.html';
            break;
        case "/EIIS-ESCOM/alumnos" :
            require __DIR__ . '/src/administrador/panel/alumnos/alumnos.html';
            break;
        case "/EIIS-ESCOM/materias" :
            require __DIR__ . '/src/alumno/materias/selectMaterias.html';
            break;
        case "/EIIS-ESCOM/reporte_alumno" :
            require __DIR__ . '/src/administrador/panel/reportes/alumno/alumno.html';
            break;
        case "/EIIS-ESCOM/reporte_materia" :
            require __DIR__ . '/src/administrador/panel/reportes/materia/materia.html';
            break;
        case "/EIIS-ESCOM/cerrarsesion" :
            require __DIR__ . '/src/administrador/session/logout.php';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/src/404.html';
            break;
    }
?>