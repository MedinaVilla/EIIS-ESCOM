<?php
    if(isset($_POST)){
        $boleta = $_POST["boleta"];
        require_once('./../../../../config/mysqli_connect.php');
        $sql = "delete from alumnos where boleta='".$boleta."';";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "Eliminado papu";
        } else
            echo "Error al eliminar";
    }

?>