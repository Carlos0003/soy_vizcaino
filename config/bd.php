<?php
	/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
	// Conectar Base de Datos
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	try {
		$con = new PDO("mysql:host=$host;dbname=$nmdb",$user,$pass);
		$con->exec('set names utf8');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Se ha conectado a la base de datos";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}


// try {
//     $con = new PDO('mysql:host=$host;dbname=$nmbd', $user, $pass);
//     foreach($mbd->query('SELECT * from FOO') as $fila) {
//         print_r($fila);
//     }
//     $mbd = null;
// } catch (PDOException $e) {
//     print "¡Error!: " . $e->getMessage() . "<br/>";
//     die();
// }

	/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
	// Login
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	function login($con, $correo, $clave) {
		try {
			$sql = "SELECT * FROM users WHERE correo = :correo AND clave = :clave LIMIT 1";
			$stm = $con->prepare($sql);
			$stm->bindparam(':correo', $correo);
			$stm->bindparam(':clave', $clave);
			$stm->execute();
			if($stm->rowCount() > 0) {
				$urow = $stm->fetch(PDO::FETCH_ASSOC);
				$_SESSION['unombres']   = $urow['nombres'];
				$_SESSION['uapellidos']   = $urow['apellidos'];
				$_SESSION['ufoto']      = $urow['foto'];
				$_SESSION['urol']       = $urow['rol'];
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	/*==============================================================
	// REGISTRO DE USUARIOS
	==============================================================*/

	function registro($con, $id, $nombres, $apellidos, $correo, $clave, $movil, $fnacimiento, $genero, $foto, $rol){
		try {
			
			if($foto==null){
				$sql = "INSERT INTO users(id,nombres, apellidos, correo, clave, movil, fnacimiento, genero, rol) VALUES (:id, :nombres, :apellidos, :correo, :clave, :movil, :fnacimiento, :genero, :rol)";
				$stm = $con->prepare($sql);
				$stm->bindparam(":id", $id);
				$stm->bindparam(":nombres", $nombres);
				$stm->bindparam(":apellidos", $apellidos);
				$stm->bindparam(":correo", $correo);
				$stm->bindparam(":clave", $clave);
				$stm->bindparam(":movil", $movil);
				$stm->bindparam(":fnacimiento", $fnacimiento);
				$stm->bindparam(":genero", $genero);
				// $stm->bindparam(":foto", $foto);
				$stm->bindparam(":rol", $rol);

			}else{
				$sql = "INSERT INTO users(id,nombres, apellidos, correo, clave, movil, fnacimiento, genero, foto, rol) VALUES (:id, :nombres, :apellidos, :correo, :clave, :movil, :fnacimiento, :genero, :foto, :rol)";
				$stm = $con->prepare($sql);
				$stm->bindparam(":id", $id);
				$stm->bindparam(":nombres", $nombres);
				$stm->bindparam(":apellidos", $apellidos);
				$stm->bindparam(":correo", $correo);
				$stm->bindparam(":clave", $clave);
				$stm->bindparam(":movil", $movil);
				$stm->bindparam(":fnacimiento", $fnacimiento);
				$stm->bindparam(":genero", $genero);
				$stm->bindparam(":foto", $foto);
				$stm->bindparam(":rol", $rol);
			}
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	// function registro($con, $id, $nombres, $apellidos, $correo, $clave, $movil, $fnacimiento, $genero, $foto, $rol){
	// 	try {
	// 		$sql = "INSERT INTO users(id,nombres, apellidos, correo, clave, movil, fnacimiento, genero, foto, rol) VALUES (:id, :nombres, :apellidos, :correo, :clave, :movil, :fnacimiento, :genero, :foto, :rol)";
	// 		$stm = $con->prepare($sql);
	// 		$stm->bindparam(":id", $id);
	// 		$stm->bindparam(":nombres", $nombres);
	// 		$stm->bindparam(":apellidos", $apellidos);
	// 		$stm->bindparam(":correo", $correo);
	// 		$stm->bindparam(":clave", $clave);
	// 		$stm->bindparam(":movil", $movil);
	// 		$stm->bindparam(":fnacimiento", $fnacimiento);
	// 		$stm->bindparam(":genero", $genero);
	// 		$stm->bindparam(":foto", $foto);
	// 		$stm->bindparam(":rol", $rol);
	// 		if($stm->execute()){
	// 			return true;
	// 		}else{
	// 			return false;
	// 		}
	// 	} catch (Exception $e) {
	// 		echo $e->getMessage();
	// 	}
	// }

	// MÓDULO DE USUARIOS

	function listaUsuarios($con){
		try {
			$sql = "SELECT * FROM users";
			$stn = $con->prepare($sql);
			$stn->execute();

			return $stn->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	//esta función es para adicionar administradores
	function adduser($con, $id, $nombres, $apellidos, $correo, $clave, $movil, $fnacimiento, $genero, $foto, $rol){
		try {
			$sql = "INSERT INTO users(id,nombres, apellidos, correo, clave, movil, fnacimiento, genero, foto, rol) VALUES (:id, :nombres, :apellidos, :correo, :clave, :movil, :fnacimiento, :genero, :foto, :rol)";
			$stm = $con->prepare($sql);
			$stm->bindparam(":id", $id);
			$stm->bindparam(":nombres", $nombres);
			$stm->bindparam(":apellidos", $apellidos);
			$stm->bindparam(":correo", $correo);
			$stm->bindparam(":clave", $clave);
			$stm->bindparam(":movil", $movil);
			$stm->bindparam(":fnacimiento", $fnacimiento);
			$stm->bindparam(":genero", $genero);
			$stm->bindparam(":foto", $foto);
			$stm->bindparam(":rol", $rol);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	// REGISTRO SIMPLE
	// function registrarUsuario($con, $id, $nombre, $email, $telefono){
	// 	try {
	// 		$sql = "INSERT INTO usuarios(id, nombre, email, telefono) VALUES (:id, :nombre, :email, :telefono)";
	// 		$stm = $con->prepare($sql);
	// 		$stm->bindparam(":id", $id);
	// 		$stm->bindparam(":nombre", $nombre);
	// 		$stm->bindparam(":email", $email);
	// 		$stm->bindparam(":telefono", $telefono);
	// 		if($stm->execute()){
	// 			return true;
	// 		}else{
	// 			return false;
	// 		}
	// 	} catch (Exception $e) {
	// 		echo $e->getMessage();
	// 	}
	// }

	function eliminarUsuario($con, $id){
		try {
			$sql = "DELETE FROM users WHERE id= :id";
			$stm = $con->prepare($sql);
			$stm->bindparam(":id", $id);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		}catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function mostrarUsuario($con, $id){
		try {
			$sql = "SELECT * FROM users WHERE id = :id";
			$stm = $con->prepare($sql);
			$stm->bindparam(":id", $id);
			$stm->execute();

			return $stm->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function modificarUsuario($con, $id, $nombres, $apellidos, $correo, $clave, $movil, $fnacimiento, $genero, $foto, $rol){
		try {

			if($foto==null){ 
				$sql = "UPDATE users SET  nombres=:nombres, apellidos=:apellidos, correo=:correo, clave=:clave, movil=:movil, fnacimiento=:fnacimiento, genero= :genero, rol= :rol WHERE id = :id";
				$stm = $con->prepare($sql);
				$stm->bindparam(":nombres", $nombres);
				$stm->bindparam(":apellidos", $apellidos);
				$stm->bindparam(":correo", $correo);
				$stm->bindparam(":clave", $clave);
				$stm->bindparam(":movil", $movil);
				$stm->bindparam(":fnacimiento", $fnacimiento);
				$stm->bindparam(":genero", $genero);
				$stm->bindparam(":rol", $rol);
			}else{
				$sql = "UPDATE users SET nombre = :nombre, foto = :foto, email = :email, telefono = :telefono, pass = :pass, rol= :rol, estado= :estado WHERE id = :id";
				$stm = $con->prepare($sql);
				$stm->bindparam(":nombres", $nombres);
				$stm->bindparam(":apellidos", $apellidos);
				$stm->bindparam(":correo", $correo);
				$stm->bindparam(":clave", $clave);
				$stm->bindparam(":movil", $movil);
				$stm->bindparam(":fnacimiento", $fnacimiento);
				$stm->bindparam(":genero", $genero);
				$stm->bindparam(":foto", $foto);
				$stm->bindparam(":rol", $rol);
			}
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

?>