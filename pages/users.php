<?php require '../config/app.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 text-center">
			<h1 class="text-center text-muted"><!-- <i class="fa fa-user"></i> --><i class="fas fa-graduation-cap"></i> Bienvenido Aprendiz </h1>
			<hr>
			<p class="lead text-center">
				El usuario aprendiz puede gestionar sus datos y ver sus notas:
			</p>
			<div class="btn-group-vertical">
				<a href="../aprendiz/marks.php" class="btn btn-outline-success btn-lg text-center">
					<i class="fa fa-clipboard"></i>
					Mis Notas</a>
				<a href="../aprendiz/index.php" class="btn btn-outline-success btn-lg text-center">
					<i class="fa fa-user"></i>
					Mis Datos</a>
			</div>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
