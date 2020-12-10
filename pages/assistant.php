<?php require '../config/app.php'; ?>
<?php include '../config/security_assistant.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 text-center">
			<h1 class="text-muted"><i class="fas fa-university"></i> Bienvenido Asistente </h1>
			<hr>
			<p class="lead">
				El usuario Asistente puede gestionar las siguientes tablas:
			</p>
			<div class="btn-group-vertical">
				<a href="../notas/" class="btn btn-outline-success btn-lg text-left">
					<i class="fa fa-clipboard"></i>
					Modulo Notas</a>
				<a href="../instructor/" class="btn btn-outline-success btn-lg text-left">
					<i class="fa fa-user"></i>
					 Mis Datos</a>
			</div>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
