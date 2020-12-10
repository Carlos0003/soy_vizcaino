<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-muted text-center"><i class="fa fa-users">Módulo Usuario</i></h1>
			<hr>
			<table class="table-sm tableusr">
				<style>
					th, thead{
						text-transform: uppercase;
						border: 1px solid blue;
					}
					table td{
						border: 1px solid blue;
					}
				</style>
				<thead style="text-transform: uppercase; font-family: sans-serif;" class="text-center text-muted table-dark table-hover">
					<tr>
						<th class="" colspan="2">Datos Usuario</th>
						<th colspan="2">foto</th>
					</tr>
				</thead>
			<tbody>
				<?php $lstu = listaUsuarios($con);  ?>
					<?php foreach ($lstu as $urow): ?>
						<tr>
							<th>nombre:&nbsp;</th>
							<td colspan="2" style="text-transform: uppercase;"> <?php echo $urow['nombres'].'&nbsp;'.$urow['apellidos']; ?></td>
						</tr>
						<tr>
							<th>correo:&nbsp;</th>
							<td style="text-transform: none;"> <?php echo $urow['correo']; ?></td>
							<!-- <th>foto:&nbsp;</th> -->
							<td rowspan="3" colspan="3"><img style="height: 100px; width: 100px; border-radius: 50%; cursor:zoom-in;" data-img="<?php echo $urow['foto']; ?>" src="../<?php echo $urow['foto']; ?>"></td>
						</tr>
						<tr>
							<th>movil:&nbsp;</th>
							<td> <?php echo $urow['movil']; ?></td>
						</tr>
						<tr>
							<th>nacimiento:&nbsp;</th>
							<td> <?php echo $urow['fnacimiento']; ?></td>
						</tr>
						<tr>
							<th>edad:&nbsp;</th>	
							<td style="text-transform: none;"> <?php 
							$fnacimiento = new DateTime($urow['fnacimiento']);
							$hoy = new DateTime();
							$annos = $hoy->diff($fnacimiento);
							echo $annos->y.' años.';
							 	?> 
							</td>
							<th>acciones:&nbsp;</th>
						</tr>
						<tr>
							<th>genero:&nbsp;</th>
							<td> <?php echo $urow['genero']; ?>
							</td>
							<td rowspan="3">
								<a href="show.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-success"> 
									<i class="fa fa-search"></i> 
								</a>
								<a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-success"> 
									<i class="fa fa-edit"></i> 
								</a>
								<a href="javascript:;" class="btn btn-outline-danger btn-delete" data-id="<?php echo $urow['id']; ?>"> 
									<i class="fa fa-trash"></i> 
								</a>
							</td>
						</tr>
						<tr>
							<th>rol
							</th>
							<td> <?php echo $urow['rol']; ?> 
							</td>
						</tr>
					<?php endforeach ?>
			</tbody>
			</table>
		</div>
	</div>

	<!-- <div class="row">
		<div class="col-md-12">
			<h1 class="text-muted text-center"> <i class="fa fa-users"></i> Módulo Usuarios </h1>
			<hr>
			<a href="add.php" class="btn btn-outline-success"> <i class="fa fa-plus"></i> Usuario </a>
			<hr>
			<table class="table table-responsive-sm"> 
				<thead class="thead-dark text-center" style="width: auto;">
					<tr style="text-transform: uppercase;">
						<th> Nombre Completo</th>
						<th> Correo</th>
						<th> Móvil</th>
						<th> Fecha de Nacimiento</th>
						<th> Edad</th>
						<th> Género</th>
						<th> Foto</th>
						<th> Rol</th>
						<th> Acciones </th>
					</tr>
				</thead>
				<tbody class="bg-secondary" style="font-size: 14px">
					<?php $lstu = listaUsuarios($con);  ?>
					<?php foreach ($lstu as $urow): ?>
						<tr style="text-transform: capitalize;">
							<td> <?php echo $urow['nombres'].'&nbsp;'.$urow['apellidos']; ?></td>
							<td style="text-transform: none;"> <?php echo $urow['correo']; ?></td>
							<td> <?php echo $urow['movil']; ?></td>
							<td> <?php echo $urow['fnacimiento']; ?></td>
							<td> <?php 
							$fnacimiento = new DateTime($urow['fnacimiento']);
							$hoy = new DateTime();
							$annos = $hoy->diff($fnacimiento);
							echo $annos->y;
							 	?> 
							</td>
							<td> <?php echo $urow['genero']; ?></td>
							<td> <img style="height: 60px; width: 60px; border-radius: 50%;"  src="../<?php echo $urow['foto']; ?>"></td>
							<td> <?php echo $urow['rol']; ?></td>
							<td>
								<a href="show.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-success"> 
									<i class="fa fa-search"></i> 
								</a>
								<a href="edit.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-success"> 
									<i class="fa fa-edit"></i> 
								</a>
								<a href="javascript:;" class="btn btn-outline-danger btn-delete" data-id="<?php echo $urow['id']; ?>"> 
									<i class="fa fa-trash"></i> 
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div> -->

</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>