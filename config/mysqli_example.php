<?php
//Require necesario para hacer cualquier tipo de operacion en la BD
require_once('./../../mysqli_connect.php');

 //Consulta
 $sql = "select * from perro";
 $result = mysqli_query($conn,$sql);
 $resultCheck = mysqli_num_rows($result);

 if($resultCheck>0){
     while($row = mysqli_fetch_assoc($result)){
         echo "".$row['nombre']."<br/>";
     }
 }

 //Alta
 $sql = "INSERT INTO perro(nombre,raza,edad,genero) values(?,?,?,?)";
 $stmt = mysqli_prepare($conn,$sql);

 // i Integers
 // d Doubles
 // b Blobs
 // s Everything Else
 $nombrePerro = "Max";
 $razaPerro = "Pastor";
 $edadPerro = 20;
 $generoPerro = "Masculino";

 mysqli_stmt_bind_param($stmt,"ssis",$nombrePerro,$razaPerro,$edadPerro,$generoPerro);
 mysqli_stmt_execute($stmt);
 $affected_rows = mysqli_stmt_affected_rows($stmt);

 if($affected_rows == 1){
     echo "Perro agregado";
     mysqli_stmt_close($stmt);
     mysqli_close($conn);

 } else{
     echo "Error en agregar el perro";
     echo mysqli_error();
    }

//Update
$sql = "select * from perro where perro.nombre = 'yuya';";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck>0){
    while($row = mysqli_fetch_assoc($result)){
        $nombrePerro = "Demetria";
        $razaPerro = "Ovejero";
        $edadPerro = 15;
        $generoPerro = "Femenino";

        $sql = "UPDATE perro set nombre=?, raza=?, edad=?,genero=? WHERE id=?;";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ssisi",$nombrePerro,$razaPerro,$edadPerro,$generoPerro,$row["id"]);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows >= 1){
            echo "Perro modificado";
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            echo "Error Perro NO modificado";
            mysqli_error();
        }
    }
}

//Delete



?>