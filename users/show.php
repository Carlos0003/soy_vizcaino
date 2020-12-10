<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<style>
	h1{	animation-duration: 0.8s; animation-name: slidein;	}
	@keyframes slidein { from { margin-right: 100%; width: 300% } to { margin-right: 0%; width: 100%; } }
	.otro{ background-color: black; }
	th{text-transform: uppercase;}
	.container{font-family: cursive;}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 text-justify">
			<h1 class="text-muted text-center"><i class="fa fa-search"></i> Información de Usuario </h1>
			<hr>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><strong><a href="index.php" class="text-purple">Modulo Usuarios</a></strong></li>
				<li class="breadcrumb-item active"> Consultar Usuario </li>
			</ol>
			<?php $musu = mostrarUsuario($con, $_GET['id']); ?>
			<table class="table table-striped table-hover">
			<?php foreach ($musu as $urow): ?>
				<tr>
					<th> Identificador de Usuario: </th>
					<td><?php echo $urow['id'] ?></td>
					<td style="height: 50%"><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th> Perfil de Usuario: </th>
					<td>
					<img src="../<?php echo $urow['foto']; ?>" data-img="<?php echo $urow['foto']; ?>" style="cursor: zoom-in; width: 80px; height: 130px;"></td>
					<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th> Nombres y Apellidos: </th>
					<td style="text-transform: capitalize;"><?php echo $urow['nombres'].'&nbsp;'.$urow['apellidos'] ?></td>
					<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th> Correo Electrónico: </th>
					<td><?php echo $urow['correo'] ?></td>
					<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th> Celular: </th>
					<td><?php echo $urow['movil'] ?></td>
					<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th> Fecha de Nacimiento: </th>
					<td><?php echo $urow['fnacimiento'] ?></td>
					<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th> Edad: </th>
					<td><?php 
							$fnacimiento = new DateTime($urow['fnacimiento']);
							$hoy = new DateTime();
							$annos = $hoy->diff($fnacimiento);
							echo $annos->y.' años.';
					 	?>
				 	</td>
				 	<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th> Género: </th>
					<td><?php echo $urow['genero'] ?></td>
					<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th> Rol: </th>
					<td><?php echo $urow['rol'] ?></td>
					<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<tr>
					<th>Fecha de Registro</th>
					<td>Para crear en BBDD</td>
					<td><a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
			</table>	
			<?php endforeach ?>
			
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>