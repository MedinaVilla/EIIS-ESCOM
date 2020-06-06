 	<?php
	
	function isNull($nombre,$pass, $pass_con, $email){
		if(strlen(trim($nombre)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}
	
	function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}
	
	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	
	function minMax($min, $max, $valor){
		if(strlen(trim($valor)) < $min)
		{
			return true;
		}
		else if(strlen(trim($valor)) > $max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function usuarioExiste($boleta)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT boleta FROM alumno WHERE boleta = ? LIMIT 1");
		$stmt->bind_param("s", $boleta);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}
	
	function emailExiste($email)
	{
		echo $email;
		global $conn;
		
		$stmt = $conn->prepare("SELECT boleta FROM alumno WHERE correo = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;	
		}
	}
	
	function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	
	function hashPassword($contraseña) 
	{
		$hash = password_hash($contraseña, PASSWORD_DEFAULT);
		return $hash;
	}
	
	function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}
	
	/*function registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario){
		
		global $conn;
		
		$stmt = $conn->prepare("INSERT INTO usuarios (usuario, password, nombre, correo, activacion, token, id_tipo) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param('ssssisi', $usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
		
		if ($stmt->execute()){
			return $conn->insert_id;
			} else {
			return 0;	
		}		
	}*/
	
	function enviarEmail($email, $nombre, $asunto, $cuerpo){
		
		require_once './PHPMailer/PHPMailerAutoload.php';
		
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; //Modificar
		$mail->Host = 'smtp.gmail.com'; //Modificar
		$mail->Port = '587'; //Modificar
		
		$mail->Username = 'escomeiis43@gmail.com'; //Modificar
		$mail->Password = 'jaibaelpatron'; //Modificar
		
		$mail->setFrom('escomeiis43@gmail.com', 'Sistema de Usuarios'); //Modificar
		$mail->addAddress($email, $nombre);
		
		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
		$mail->IsHTML(true);
		
		if($mail->send())
		return true;
		else
		return false;
	}
	
	function validaIdToken($boleta, $token){
		global $conn;
		
		$stmt = $conn->prepare("SELECT activacion FROM alumno	WHERE boleta = ? AND token = ? LIMIT 1");
		$stmt->bind_param("ss", $boleta,$token);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			$stmt->bind_result($activacion);
			$stmt->fetch();
			
			if($activacion == 1){
				$msg = "La cuenta ya se activo anteriormente.";
				} else {
				if(activarUsuario($id)){
					$msg = 'Cuenta activada.';
					} else {
					$msg = 'Error al Activar Cuenta';
				}
			}
			} else {
			$msg = 'No existe el registro para activar.';
		}
		return $msg;
	}
	
	function activarUsuario($boleta)
	{
		global $conn;
		
		$stmt = $conn->prepare("UPDATE alumno SET activacion=1 WHERE id = ?");
		$stmt->bind_param('s', $boleta);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	
	function isNullLogin($usuario, $contraseña){
		if(strlen(trim($usuario)) < 1 || strlen(trim($contraseña)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	
	/*function login($usuario, $contraseña)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT id, id_tipo, password FROM usuarios WHERE usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			
			if(isActivo($usuario)){
				
				$stmt->bind_result($id, $id_tipo, $passwd);
				$stmt->fetch();
				
				$validaPassw = password_verify($password, $passwd);
				
				if($validaPassw){
					
					lastSession($id);
					$_SESSION['id_usuario'] = $id;
					$_SESSION['tipo_usuario'] = $id_tipo;
					
					header("location: welcome.php");
					} else {
					
					$errors = "La contrase&ntilde;a es incorrecta";
				}
				} else {
				$errors = 'El usuario no esta activo';
			}
			} else {
			$errors = "El nombre de usuario o correo electr&oacute;nico no existe";
		}
		return $errors;
	}*/
	
	/*function lastSession($id)
	{
		global $conn;
		
		$stmt = $conn->prepare("UPDATE usuarios SET last_session=NOW(), token_password='', password_request=0 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}*/
	
	function isActivo($usuario)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT activacion FROM alumno WHERE boleta = ? || correo = ? LIMIT 1");
		$stmt->bind_param('ss', $usuario, $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();
		
		if ($activacion == 1)
		{
			return true;
		}
		else
		{
			return false;	
		}
	}	
	
	function generaTokenPass($user_id)
	{
		global $conn;
		
		$token = generateToken();
		
		$stmt = $conn->prepare("UPDATE alumno SET token_password=?, password_request=1 WHERE boleta = ?");
		$stmt->bind_param('ss', $token, $user_id);
		$stmt->execute();
		$stmt->close();
		
		return $token;
	}
	
	function getValor($campo, $campoWhere, $valor)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT $campo FROM alumno WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;	
		}
	}
	
	function getPasswordRequest($id)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT password_request FROM alumno WHERE boleta = ?");
		$stmt->bind_param('s', $boleta);
		$stmt->execute();
		$stmt->bind_result($_boleta);
		$stmt->fetch();
		
		if ($_boleta== 1)
		{
			return true;
		}
		else
		{
			return null;	
		}
	}
	
	function verificaTokenPass($user_id, $token){
		
		global $conn;
		
		$stmt = $conn->prepare("SELECT activacion FROM alumno WHERE boleta = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('ss', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($activacion);
			$stmt->fetch();
			if($activacion == 1)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	function cambiaPassword($password, $user_id, $token){
		
		global $conn;
		
		$stmt = $conn->prepare("UPDATE alumno SET contraseña = ?, token_password='', password_request=0 WHERE boleta = ? AND token_password = ?");
		$stmt->bind_param('sss', $password, $user_id, $token);
		
		if($stmt->execute()){
			return true;
			} else {
			return false;		
		}
	}		