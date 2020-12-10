<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>

<?php 
	if($_GET) {
		$id   = $_GET['id'];
		if (eliminarUsuario($con, $id)) {
			$_SESSION['type']    = 'success';
			$_SESSION['message'] = 'Usuario eliminado exitosamente!';
		} else {
			$_SESSION['type']    = 'danger';
			$_SESSION['message'] = 'El usuario no se eliminó!';
		}
		echo "<script> window.location.replace('index.php'); </script>";
	}
?>

<?php $con = null; ?>