<?php
	require './../../../config/mysqli_connect.php';
	require './../../../config/funcs.php';
	
	if(empty($_GET['user_id'])){
		header('Location: index.html');
		
	}
	
	if(empty($_GET['token'])){
		header('Location: index.html');
		
	}
	
	$user_id = $conn->real_escape_string($_GET['user_id']);
	$token = $conn->real_escape_string($_GET['token']);
	
	if(!verificaTokenPass($user_id, $token))
	{
echo 'No se pudo verificar los Datos';
exit;
	}
	
	
?>
	

<html>
	<head>
		<title>Cambiar Password</title>
		
		<link rel="stylesheet" href="/EIIS-ESCOM/assets/css/master.css">
		
	</head>
	
	<body>
		
		<div class="login-box">    
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
			   
		<h1>Recupera Password</h1> 
		<img src="/EIIS-ESCOM/assets/img/2.png" class="avatar" alt="Avatar Image">
			
			<div style="padding-top:30px" class="panel-body" >
				
				<form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">
					
					<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
					<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
					
					
					
					 <div class="form-group">
						<label for="password" class="col-md-3 control-label">Nuevo Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>
					<!--<div class="wrap-input2 validate-input" data-validate="La Contraseña es Requerida">
							<label for="password" class="col-md-3 control-label">Nuevo Password</label>
							<input id="password" class="input2" type="password" name="password"
								pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" size="15" minlength="8" maxlength="15"
								title="La contraseña debe contener mínimo 8 caracteres y máximo 15,al menos una letra mayúscula,al menos una letra minúscula,
								al menos un dígito y al menos un caracter especial.">
							<span class="focus-input2" placeholder="Password"></span>
						</div>-->
					
					 <div class="form-group">
						<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
						</div>
					</div>

					<!--div class="wrap-input2 validate-input" data-validate="">
							
							<input id="con_password" class="input2" type="password" name="con_password"
								pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" size="15" minlength="8" maxlength="15"
								title="La contraseña debe contener mínimo 8 caracteres y máximo 15,al menos una letra mayúscula,al menos una letra minúscula,
								al menos un dígito y al menos un caracter especial.">
							<span class="focus-input2" placeholder="Confirmar Password"></span>
						</div>-->
					
					
					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
						</div>
					</div>   
				</form>
			</div>                     
		</div>  
		</div>
		</div>
	</body>
</html>	

