<?php
	echo "chinguen ";
	 require_once('./config/mysqli_connect.php');
	 require_once('./config/funcs.php');
	echo "a su madre";
	 $errors= array();

	 if(!empty($_POST))
	{
		$email= $conn-> real_escape_string($_POST['email']);
		echo "a su";
	 	if(!isEmail($email))
	 	{
	 		$errors[]= "Debe de ingresar un correo electronico valido";

	 	}

	 		if(emailExiste($email))
	 		{
				 echo "madre";
	 			$user_id= getValor('boleta', 'correo', $email);
				 $nombre = getValor('nombre', 'correo', $email);
				 
				 $token =generaTokenpass($user_id);

	 			$url = ''.$_SERVER["SERVER_NAME"].'/src/alumno/sesion/cambia_pass.php?user_id='.$user_id.'&token='.$token;

	 			$asunto= 'Recupera Password - Sistema de Usuarios';
				 $cuerpo= "Hola $nombre: <br /><br />Se ha solicitado un cambio de contrase&ntilde;a. <br /><br /a>
				  Para restaurar su contrase&ntilde;a., haga click en el siguiente link: <a href='$url'>Cambiar Password</a>";

				  echo $url;
	 			// if(enviarEmail($email, $nombre,$asunto, $cuerpo))
	 			// {
	 			// 	echo "Hemos enviado un correo electronico al correo $email para restablecer tu password.<br />";
	 			// 	echo "<a href='index.hmtml' >Iniciar Sesion</a>";
	 			// 	exit;
	 			// 	} else {
	 			// 	$errors[]= "Error al enviar Email";
	 			// }


	 		} $errors[]= "No existe el correo electronico";
	 	//}
	 		
	}
?>
