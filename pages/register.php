<?php require '../config/app.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="text-muted text-center"><i class="fa fa-user-plus"></i> Registro de información</h1>
			<hr>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="number" style="display: none;" name="id">
				<div class="form-group">
					<input type="text" class="form-control" name="nombres" placeholder="Nombre/s" required style="text-transform: capitalize;">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="apellidos" placeholder="Apellido/s" required style="text-transform: capitalize;">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="correo" placeholder="Correo Electrónico" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="movil" placeholder="Número Telefónico" required>
				</div>
				<div class="form-group">
					<i class="fa fa-calendar"> FECHA DE NACIMIENTO</i>
					<input type="date" class="form-control" name="fnacimiento" placeholder="Fecha de nacimiento" required>
				</div>
				<div class="form-group">
					<select name="genero" class="form-control" required>
						<option value="">SELECCIONE GÉNERO:</option>
						<option value="Masculino">MASCULINO</option>
						<option value="Femenino">FEMENINO</option>
						<option value="Otro">OTRO...</option>
					</select>
				</div>
				<div class="form-group" style="display: none;">
					<button class="btn btn-default btn-foto"><i class="fa fa-user"></i>Seleccione Foto de Perfil</button>
					<input type="file" class="form-control" name="foto" accept="image/*">
				</div>
				<!-- <div class="form-group">
						<input type="file" class="form-control" name="foto" accept="image/*">
						<button class="btn btn-default btn-foto"> <i class="fa fa-user"></i> Seleccione Foto de Perfil </button>
						<input type="hidden" name="url_foto" value="<?php echo $urow['foto']; ?>">
					</div> -->
				<div class="form-group rol" style="display: none;">
					<select name="rol" class="form-control">
						<option value="Usuario"></option>						
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Guardar </button>
					<button type="reset" class="btn btn-danger"> <i class="fa fa-sync-alt"></i> Limpiar </button>
					<a class="btn btn-dark" href="../index.php"> <i class="fas fa-hand-point-left"></i> Volver a Login</a>
				</div>
			</form>
				<?php
					if ($_POST){
						$id= $_POST['id'];
						$nombres= $_POST['nombres'];
						$apellidos= $_POST['apellidos'];
						$correo    = $_POST['correo'];
						$clave    = md5($_POST['clave']);
						$movil  = $_POST['movil'];
						$fnacimiento=$_POST['fnacimiento'];
						$genero  = $_POST['genero'];
						if ($_FILES['foto']['tmp_name']) {
						$url= 'public/imgs/fotos/';
						$foto= $url.$_FILES['foto']['name'];
						if($_POST['url_foto']!='public/imgs/fotos/nofoto.png'){
							unlink('../'.$_POST['url_foto']);
						}
						move_uploaded_file($_FILES['foto']['tmp_name'], '../'.$url.$_FILES['foto']['name']);
					}else{
						$foto=null;
					}
						// $url       = 'public/imgs/fotos/';
						// $foto      = $url.$_FILES['foto']['name'];
						// move_uploaded_file($_FILES['foto']['tmp_name'], '../'.$url.$_FILES['foto']['name']);
						$rol  = $_POST['rol'];
 						if (registro($con, $id, $nombres, $apellidos, $correo, $clave, $movil, $fnacimiento, $genero, $foto, $rol)) {
							$_SESSION['type'] = 'success';
							$_SESSION['message'] = 'Operación exitosa!';
						}else{
							$_SESSION['type'] = 'danger';
							$_SESSION['message'] = 'El Usuario no se Pudo Adicionar!';
						}
						// echo "<script> window.location.replace('../index.php'); </script>";
					}
				?>
			</div>
		</div>
	</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>