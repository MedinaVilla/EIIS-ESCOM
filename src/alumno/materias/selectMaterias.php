<?php
    //require_once('config/mysqli_connect.php');
    if(isset($_POST['curses']) && isset($_POST['recurses'])){
        $curses = $_POST['curses'];
        echo "<h3>Seleccionaste los siguentes curses:</h3><br>";
        foreach($curses as $key => $value){
            echo "$value<br>";
        }
        $recurses = $_POST['recurses'];
        echo "<h3>Seleccionaste los siguentes recurses:</h3><br>";
        foreach($recurses as $key => $value){
            echo "$value<br>";
        }
    }
?>