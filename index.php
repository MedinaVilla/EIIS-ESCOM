<?php
    $request = $_SERVER['REQUEST_URI'];
    session_start();
    switch ($request) {
        case "/" :
            require __DIR__ . '/index.html';
            unset($_SESSION["boleta"]);
            break;
        case "" :
            require __DIR__ . '/index.html';
            unset($_SESSION["boleta"]);
            break;        
        case "/registro" :
            require __DIR__ . '/src/alumno/registro/registro.html';
            break;
        case "/panel" :
            if(isset($_SESSION['user']))
                require __DIR__ . '/src/administrador/panel/panel.html';
            else
                header("Location: /");
            break;
        case "/aspirante" :
            require __DIR__ . '/src/alumno/sesion/index.html';
            break;

        case '/login' :
            require __DIR__ . '/src/alumno/sesion/login.php';
            break;
        case '/recupera' :
            require __DIR__ . '/src/alumno/sesion/recupera.html';
            break;
        case "/alumnos" :
            if(isset($_SESSION['user']))
                require __DIR__ . '/src/administrador/panel/alumnos/alumnos.html';
            else
                header("Location: /");
            break;
        case "/materias" :
            if(isset($_SESSION['user']))
                require __DIR__ . '/src/alumno/materias/selectMaterias.html';
            else
                header("Location: /aspirante");
            break;
        case "/reporte_alumno" :
            if(isset($_SESSION['user']))
                require __DIR__ . '/src/administrador/panel/reportes/alumno/alumno.html';
            else
                header("Location: /");
            break;
        case "/reporte_materia" :
            if(isset($_SESSION['user']))
                require __DIR__ . '/src/administrador/panel/reportes/materia/materia.html';
            else
                header("Location: /");
            break;
        case "/cerrarsesion" :
            require __DIR__ . '/src/administrador/session/logout.php';
            break;
        case "/cierrasesion" :
            require __DIR__ . '/src/alumno/sesion/sesionEnd.php';
            break;
        case "/generatePDF" :
            if(isset($_SESSION['user']))
                require __DIR__ . '/src/administrador/panel/reportes/materia/generatePDF.php';
            else
                header("Location: /");
            break;
        case "/verifica" :
            require __DIR__ . '/src/alumno/inicio/validaridentidad/validacion.html';
            break;
        case "/activacion" :
            if(isset($_SESSION["boleta"])){
                require __DIR__ . '/src/alumno/inicio/validaridentidad/complementaria.html';
            }
            else{
                header("Location: /verifica");
                unset($_SESSION["boleta"]);
            }
            break;
        case "/alta" :
            require __DIR__ . '/src/alumno/inicio/nuevoalumno/newstudent.html';
            break;
        case "/admin" :
            if(isset($_SESSION['user']))
                header("Location: /panel");
            else
                require __DIR__ . '/src/administrador/session/login.html';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/src/404.html';
            break;
    }
?>