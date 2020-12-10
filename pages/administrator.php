<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 text-center">
			<h1 class="text-muted"><i class="fab fa-jenkins"></i> Bienvenido Administrador </h1>
			<hr>
			<p class="lead">
				El usuario Administrador puede gestionar las siguientes tablas:
			</p>
			<div class="btn-group-vertical">
				<a href="../users/" class="btn btn-outline-success btn-lg">
					<i class="fa fa-users"></i>
					Modulo Usuarios</a>
				<a href="../materias/" class="btn btn-outline-success btn-lg">
					<i class="fa fa-book"></i>
					Modulo Materias</a>
				<a href="../notas/" class="btn btn-outline-success btn-lg">
					<i class="fa fa-clipboard"></i>
					Modulo Notas</a>
			</div>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eligendi possimus modi, sit minima veniam ducimus ad, in ipsam laborum animi distinctio vero laudantium, reprehenderit illum perspiciatis suscipit, adipisci fugiat!
			Molestias neque repellendus cumque quia laudantium modi sint, saepe cum atque obcaecati minima vitae harum amet delectus rem nostrum eos, corrupti officia aperiam fuga iste temporibus quasi! Dolores, voluptatum dolor?
			Reiciendis ad ab rem ex modi architecto quas sed numquam laborum fugiat eligendi nostrum hic et a aperiam explicabo id, eius, impedit corrupti quasi assumenda. Consectetur pariatur eius, minima possimus!</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo fugit quaerat cumque in enim? Odio suscipit dolorem nobis voluptas repudiandae corrupti explicabo dolor quos nemo, consectetur veniam ipsam autem asperiores?
			Culpa veniam, sunt consequatur perspiciatis obcaecati libero error similique ducimus excepturi consequuntur quas atque explicabo, necessitatibus sapiente? Soluta quo quaerat non, accusantium, sint nihil, dolorem officiis id corporis fugiat neque.
			Aliquam fugit iusto, dignissimos nulla consectetur culpa adipisci. Molestiae doloribus facilis eum exercitationem ipsa doloremque id velit. Quo, necessitatibus? Facere itaque, cumque distinctio eligendi consequatur, perferendis deserunt odio veritatis ipsum!
			Ea fuga qui recusandae vero ut repellendus, veniam commodi, in magnam, modi accusantium dolor deserunt exercitationem reiciendis fugit cupiditate. Cupiditate quis ab rem sequi natus dolore, nesciunt laboriosam corporis, suscipit!
			Voluptatum quis rerum ut soluta non beatae eos? Placeat harum soluta, ducimus illo perspiciatis dolore incidunt laudantium, corrupti, iste rem ipsa minima voluptas, maiores possimus numquam eligendi fugit quia? Totam.
			Corrupti illo eligendi, inventore consequuntur delectus magnam, id adipisci expedita pariatur dicta perspiciatis quos at voluptas quod ullam iure ab amet laborum ipsam natus, sapiente? Laborum, eaque libero provident recusandae.</p>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
