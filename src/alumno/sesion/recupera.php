<?php
	 require_once('./config/mysqli_connect.php');
	 require_once('./config/funcs.php');

	 $errors= array();

	 if(!empty($_POST))
	{
		$email= $conn-> real_escape_string($_POST['email']);

	 	if(!isEmail($email))
	 	{
	 		$errors[]= "Debe de ingresar un correo electronico valido";

	 	}

	 		if(emailExiste($email))
	 		{
	 			$user_id= getValor('boleta', 'correo', $email);
				 $nombre = getValor('nombre', 'correo', $email);
				 
				 $token =generaTokenpass($user_id);

	 			$url = ''.$_SERVER["SERVER_NAME"].'/src/alumno/sesion/cambia_pass.php?user_id='.$user_id.'&token='.$token;

	 			$asunto= 'Recupera Password - Sistema de Usuarios';
				 $cuerpo= "Hola $nombre: <br /><br />Se ha solicitado un cambio de contrase&ntilde;a. <br /><br /a>
				  Para restaurar su contrase&ntilde;a., haga click en el siguiente link: <a href='$url'>Cambiar Password</a>";

	 			if(enviarEmail($email, $nombre,$asunto, $cuerpo))
	 			{
	 				echo "Hemos enviado un correo electronico al correo $email para restablecer tu password.<br />";
	 				echo "<a href='index.hmtml' >Iniciar Sesion</a>";
	 				exit;
	 				} else {
	 				$errors[]= "Error al enviar Email";
	 			}


	 		} $errors[]= "No existe el correo electronico";
	 	//}
	 		
	}
	
	
?>
<html>
	<head>
		<title>Recuperar Password</title>
		
		<link rel="stylesheet" href="/assets/css/master.css">
		
	</head>
	
	<body>
		
		<div class="login-box">    
			
				<div class="panel panel-info" >
				
				<h1>Recupera Password</h1> 
					
					<div style="padding-top:30px" class="panel-body" >							
						<img src="/assets/img/2.png" class="avatar" alt="Avatar Image">	
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
						<div class="form-group input-group validate-input" class="input-group">
								 <span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email" required>                                        
							</div>
							
							<div><br><br> 
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
							
							
									<div ><br><br>  
										No tiene una cuenta! <a href="/alta"> Registrate aquí</a>
									</div>
								 
						</form>
						<?php echo resultBlock($errors); ?>
					</div>                     
				</div>  
			
		</div>
	</body>
</html>							