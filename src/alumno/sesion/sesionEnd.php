<?php 
    session_start();
    if(isset($_GET)){
        if (isset($_SESSION["user"])){
            session_unset();
            session_destroy();
        } 
        header("Location: /EIIS-ESCOM/");
    }
?>