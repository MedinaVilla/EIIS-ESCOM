<?php
	
	 require_once('./../../../config/mysqli_connect.php');
	 require './../../../config/funcs.php';
	
	 $user_id = $conn->real_escape_string($_POST['user_id']);
	 $token = $conn->real_escape_string($_POST['token']);
	 $password = $conn->real_escape_string($_POST['password']);
	 $con_password = $conn->real_escape_string($_POST['con_password']);
	 
	 if(validaPassword($password, $con_password))
	 {
		 
		 //$pass_hash = hashPassword($password);
		 
		 if(cambiaPassword($password, $user_id, $token))
		 {
			 echo "Contrase&ntilde;a Modificada <br> <a href='index.html' >Iniciar Sesion</a>";
			 } else {
			 
			 echo "Error al modificar contrase&ntilde;a";
			 
		 }
		 
		 } else {
		 
		 echo 'Las contraseñas no coinciden';
		 
	 }
	
?>	