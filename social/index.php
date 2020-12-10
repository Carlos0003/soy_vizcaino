<?php require '../config/app.php'; ?>
<?php include '../config/security_users.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php require '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar-all.inc'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group-vertical">
				<a href="../" class="btn btn-outline-success btn-lg">
					<i class="fa fa-clipboard"></i>
					Volver</a>
			</div>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
</body>