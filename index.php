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
        case "/EIIS-ESCOM/generatePDF" :
            require __DIR__ . '/src/administrador/panel/reportes/materia/generatePDF.php';
            break;
        case "/EIIS-ESCOM/verifica" :
            require __DIR__ . '/src/alumno/inicio/validaridentidad/validacion.html';
            break;
        case "/EIIS-ESCOM/activacion" :
            require __DIR__ . '/src/alumno/inicio/validaridentidad/complementaria.html';
            break;
        case "/EIIS-ESCOM/alta" :
            require __DIR__ . '/src/alumno/inicio/nuevoalumno/newstudent.html';
        case "/EIIS-ESCOM/admin" :
            require __DIR__ . '/src/administrador/session/login.html';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/src/404.html';
            break;
    }
?>