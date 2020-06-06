<?php 
    if(isset($_POST)){    
        $boleta = $_POST["boleta"];
        require_once('./../../../../../config/mysqli_connect.php');
        
        $sql = "select materia,tipo FROM (SELECT F1.boleta,asignatura_intencion.asignatura_idmateria FROM (SELECT intencion.idintencion,alumno.boleta FROM intencion INNER JOIN alumno ON intencion.alumno_boleta=alumno.boleta where alumno.boleta='".$boleta."')AS F1 inner join asignatura_intencion on F1.idintencion=asignatura_intencion.intencion_idintencion)AS F2 INNER JOIN asignatura ON F2.asignatura_idmateria=asignatura.idmateria INNER JOIN tipo_materia ON asignatura.tipo_materia_idtipo = tipo_materia.idtipo;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        $materias = [];
        if($resultCheck>0){
            while($row = mysqli_fetch_assoc($result)){
                $materias[] = $row;
            }
        }
        echo json_encode($materias);
    }
?>