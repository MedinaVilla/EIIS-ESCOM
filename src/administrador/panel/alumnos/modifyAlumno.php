<?php
    if(isset($_POST)){
        require_once('./../../../../config/mysqli_connect.php');
        print_r($_POST);
        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $boleta = $_POST["boletaA"];
        $boleta2 = $_POST["boletaB"];
        $curp = $_POST["curp"];
        $fecha_nac = $_POST["fecha_nac"];

        $sql = "UPDATE alumno set boleta=?, nombre=?, apellidop=?, apellidom=?, curp=?, fecha_nac=? WHERE boleta=?;";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"sssssss",$boleta2,$nombre,$apellidop,$apellidom,$curp,$fecha_nac,$boleta);
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