<?php
    if(isset($_POST)){
        require_once('./../../../../config/mysqli_connect.php');
        print_r($_POST);
        $nombre = $_POST["nombre"];
        $boleta = $_POST["boletaA"];
        $boleta2 = $_POST["boletaB"];
        $semestre = $_POST["semestre"];
        $telefono = $_POST["telefono"];
        $sql = "UPDATE alumnos set boleta=?, nombre=?, semestre=?, telefono=? WHERE boleta=?;";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"sssss",$boleta2,$nombre,$semestre,$telefono,$boleta);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows >= 1){
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            echo 0; 
        } else {
            mysqli_error();
            echo 1;
        }
    }
?>