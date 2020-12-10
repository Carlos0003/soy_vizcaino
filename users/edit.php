<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1 class="text-muted text-center"> <i class="fa fa-edit"></i> Modificar Usuario </h1>
			<hr>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			  	<li class="breadcrumb-item"><a href="index.php" class="text-purple">Módulo Usuarios</a></li>
			    <li class="breadcrumb-item active">Modificar  Usuario</li>
			  </ol>
			</nav>
			<?php $usu = mostrarUsuario($con, $_GET['id']); ?>
			<?php foreach ($usu as $urow): ?>	
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="number" class="form-control" name="id" placeholder="id de Identidad" required readonly value="<?php echo $urow['id']; ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="nombres" placeholder="Nombre Completo" required value="<?php echo $urow['nombres'].'&&nbsp;'.$urow['apellidos']; ?>">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="correo" placeholder="Correo Electrónico" required value="<?php echo $urow['correo']; ?>">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" name="movil" placeholder="Número Telefónico" required value="<?php echo $urow['movil']; ?>">
					</div>
					<div class="form-group">
						<input type="file" class="form-control" name="foto" accept="image/*">
						<button class="btn btn-default btn-foto"> <i class="fa fa-user"></i> Seleccione Foto de Perfil </button>
						<input type="hidden" name="url_foto" value="<?php echo $urow['foto']; ?>">
					</div>
					<div class="form-group">
						<select name="genero" class="form-control" required>
							<option value="">Seleccione el Genero...</option>
							<option value="F" <?php if($urow['genero'] == "Femenino") echo "selected"; ?> >Femenino</option>
							<option value="M" <?php if($urow['genero'] == "Masculino") echo "selected"; ?> >Masculino</option>
							<option value="T" <?php if($urow['genero'] == "Otro") echo "selected"; ?> >Otro...</option>
						</select>
					</div>
					<div class="form-group">
						<select name="rol" class="form-control" required>
							<option value="">Seleccione el Rol...</option>
							<option value="Admin" <?php if($urow['rol'] == "Admin") echo "selected"; ?> >Administrador</option>
							<option value="Instructor" <?php if($urow['rol'] == "Instructor") echo "selected"; ?> >Instructor</option>
							<option value="Aprendiz" <?php if($urow['rol'] == "Aprendiz") echo "selected"; ?> >Aprendiz</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Modificar </button>
						<button type="reset" class="btn btn-default"> <i class="fa fa-sync-alt"></i> Limpiar </button>
					</div>
				</form>
			<?php endforeach ?>
			<?php 
				if($_POST) {
					$id = $_POST['id'];
					$nombres   	= $_POST['nombres'];
					$apellidos	= $_POST['apellidos'];
					$correo    	= $_POST['correo'];
					$movil  	= $_POST['movil'];
					$genero    	= $_POST['genero'];
					$rol       	= $_POST['rol'];

					if ($_FILES['foto']['tmp_name']) {
						$url  = 'public/imgs/fotos/';
						$foto = $url.$_FILES['foto']['name'];
						if($_POST['url_foto'] != 'public/imgs/fotos/nofoto.png') {
							unlink('../'.$_POST['url_foto']);
						}
						move_uploaded_file($_FILES['foto']['tmp_name'], '../'.$url.$_FILES['foto']['name']);
					} else {
						$foto = null;
					}

					if (modificarUsuario($con, $id, $nombres, $apellidos, $correo, $movil, $foto, $genero, $rol)) {
						$_SESSION['type']    = 'success';
						$_SESSION['message'] = 'El Usuario se Modifico con Exito!';
					} else {
						$_SESSION['type']    = 'danger';
						$_SESSION['message'] = 'El Usuario no se Modifico!';
					}
				}
			?>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>