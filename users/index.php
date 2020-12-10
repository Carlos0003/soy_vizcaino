<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<style>
	h1{
		animation-duration: 0.8s;
		animation-name: slidein;
		}

	@keyframes slidein {
  	from {
    	margin-right: 100%;
    	width: 300%
  	}

  	to {
    	margin-right: 0%;
    	width: 100%;
  		}
	}
</style>
<div class="row embed-responsive-item">
		<div class="col-md-8 offset-2 table-responsive-sm">
		<h1 class="text-muted text-center"> <i class="fa fa-users"></i> Módulo Usuarios </h1>
			<hr>
			<a href="add.php" class="btn btn-outline-success"> <i class="fa fa-plus"></i> Usuario </a>
			<hr>
			<table class="table table-hover" style="font-family: cursive;"> 
				<thead class="thead-dark text-center" style="width: auto;">
					<tr style="text-transform: uppercase;">
						<th> Nombre Completo</th>
						<th> Correo</th>
						<th> Rol</th>
						<th> Acciones </th>
					</tr>
				</thead>
				<tbody class="table-danger text-center" style="font-size: 16px">
					<?php $lstu = listaUsuarios($con);  ?>
					<?php foreach ($lstu as $urow): ?>
						<tr style="text-transform: capitalize;">
							<td> <?php echo $urow['nombres'].'&nbsp;'.$urow['apellidos']; ?></td>
							<td style="text-transform: none;"> <?php echo $urow['correo']; ?></td>
							<td> <?php echo $urow['rol']; ?></td>
							<td>
								<a href="show.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-info"> 
									<i class="fa fa-search"></i> 
								</a>
								<a href="show.php?id=<?php echo $urow['id']; ?>" class="btn btn-outline-secondary"> 
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
	</div>

</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>