<?php require '../config/app.php'; ?>
<?php include '../config/security_apprentice.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1 class="text-muted text-center"> <i class="fa fa-edit"></i> Mis Datos </h1>
			<hr>
			<?php $usu = mostrarUsuario($con, $_SESSION['uid']); ?>
			<?php foreach ($usu as $urow): ?>	
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="number" class="form-control" name="id" placeholder="id de Identidad" required readonly value="<?php echo $urow['id']; ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="nombres" placeholder="Nombre Completo" required value="<?php echo $urow['nombres']; ?>">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="correo" placeholder="Correo Electrónico" required value="<?php echo $urow['correo']; ?>">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" name="telefono" placeholder="Número Telefónico" required value="<?php echo $urow['telefono']; ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="Ciudad" placeholder="Ciudad" required value="<?php echo $urow['Ciudad']; ?>">
					</div>
					<div class="form-group">
						<input type="file" class="form-control" name="foto" accept="image/*">
						<button class="btn btn-default btn-foto"> <i class="fa fa-user"></i> Seleccione Foto de Perfil </button>
						<input type="hidden" name="url_foto" value="<?php echo $urow['foto']; ?>">
					</div>
					<div class="form-group">
						<select name="genero" class="form-control" required>
							<option value="">Seleccione el Genero...</option>
							<option value="F" <?php if($urow['genero'] == "F") echo "selected"; ?> >Femenino</option>
							<option value="M" <?php if($urow['genero'] == "M") echo "selected"; ?> >Masculino</option>
							<option value="T" <?php if($urow['genero'] == "T") echo "selected"; ?> >Transgenero</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Modificar </button>
					</div>
				</form>
			<?php endforeach ?>
			<?php 
				if($_POST) {
					$id = $_POST['id'];
					$nombres   = $_POST['nombres'];
					$correo    = $_POST['correo'];
					$telefono  = $_POST['telefono'];
					$Ciudad    = $_POST['Ciudad'];
					$genero    = $_POST['genero'];

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

					if (modificarDatos($con, $id, $nombres, $correo, $telefono, $Ciudad, $foto, $genero)) {
						$_SESSION['type']    = 'success';
						$_SESSION['message'] = 'Mis Datos de Modificaron con Exito!';
					} else {
						$_SESSION['type']    = 'danger';
						$_SESSION['message'] = 'Mis Datos no se Modificaron!';
					}
				}
			?>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>