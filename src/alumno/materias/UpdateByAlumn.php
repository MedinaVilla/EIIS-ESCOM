<?php
    if(isset($_POST)){
        require_once('./../../../config/mysqli_connect.php');
        print_r($_POST);
        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $boleta = $_POST["boletaA"];
        $boleta2 = $_POST["boletaB"];
        $curp = $_POST["curp"];
        $fecha_nac = $_POST["fecha_nac"];

        $sql = "UPDATE alumno set boleta='".$boleta2."', nombre='".$nombre."', apellidop='".$apellidop."', apellidom='".$apellidom."', curp='".$curp."', fecha_nac='".$fecha_nac."' WHERE boleta='".$boleta2."';";
        $result = mysqli_query($conn,$sql) or die ("Problemas al insertar".mysqli_error($conn));
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
            echo "Updated!";
            echo 0;
            mysqli_close($conn);
        }
        else{
            mysqli_error();
            echo 1;
        }
    }
?>