<?php
    session_start();
    if(isset($_POST['curses']) && isset($_POST['recurses'])){
        $curses = $_POST['curses'];
        $recurses = $_POST['recurses'];
        $boleta = $_SESSION['user'];
        require_once('./../../../config/mysqli_connect.php');
        $sql = "select fecha_intencion from intencion where alumno_boleta='".$boleta."';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck==0){
            echo "<p> No esta registrado</p>";
        }
        else{
            echo "<p> Ya esta registrado</p>";
        }

        /*
        echo "<h3>Seleccionaste los siguentes curses:</h3><br>";
        foreach($curses as $key => $value){
            echo "$value<br>";
        }
        echo "<h3>Seleccionaste los siguentes recurses:</h3><br>";
        foreach($recurses as $key => $value){
            echo "$value<br>";
        }*/
    }
?>