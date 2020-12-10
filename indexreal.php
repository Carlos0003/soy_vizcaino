<?php require 'config/app.php'; ?>
<?php include 'config/redirect.php'; ?>
<?php include 'config/bd.php'; ?>
<?php include 'includes/header.inc'; ?>
<style>
	body{
		background-image: repeating-radial-gradient(#FFFFFF,#D62718 20%, aqua 60%);
	}
	nav{background: linear-gradient(35deg,#3C0310,#560518,#7B0621,#8E1E37,#962E45,#8C1A34,#962E45,#7B0621,#8E1E37,#560518,#3C0310);
		animation: change 10s ease-in-out infinite;
    	background-size: 400%;
	}

	ul li{
		border-radius: 3px;
		margin:1px;
		background-color: #981932;
		/*animation: change 10s ease-in-out infinite;
		background: linear-gradient(35deg,#3C0310,#560518,#7B0621,#8E1E37,#962E45,#8C1A34,#962E45,#7B0621,#8E1E37,#560518,#3C0310);*/
	}

	ul li:hover{
		/*animation: change 10s ease-in-out infinite;*/
		background-color: #009C46;
	}

	@keyframes change {
		0%{
			background-position: 0 50%;
		}
		50%{
			background-position: 100% 50%;
		}
		100%{
			background-position: 0 50%;
		}
	}
/*	nav {
  animation-duration: 1.4s;
  animation-name: slidein;
	}

@keyframes slidein {
  from {
    margin-left: 100%;
    width: 300%
  }

  to {
    margin-left: 0%;
    width: 100%;
  }
}*/
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; z-index: 1; height: 56px; width: 100%;">
	<img src="public/imgs/postal.jpg" style="width: 50px; height: 50px; padding: 0px">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="font-family: cursive;">
		<a class="navbar-brand" href="#">&nbsp; <strong>Soy Vizcaíno</strong></a>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active" style="background-color: #343A60">
				<a class="nav-link" href="#"> Social<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="tourism/"> Turismo<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Cultura</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Multimedia</a>
			</li>
		</ul>
			<!-- FRACCIÓN DE CÓDIGO LOGIN -->
		<div class="dropdown" style="padding: 5px; border-radius: 10px;">
		  	<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-style: none;">
		    Ingresar
		  	</button>
		  	<div class="dropdown-menu" style="background-color: #009C46" aria-labelledby="dropdownMenu2">
		    	<div class="dropdown-item" style="background-color: #009C46;">
		    		<div class="dropdown">
						<form class="px-4 py-3" style="width: 355px; background-color: #D62718;" method="post">
						    <div class="form-group">
								<input type="email" class="form-control" name="correo" id="exampleDropdownFormEmail1" placeholder="Correo electrónico" required>
						    </div>
						    <div class="form-group">
						      	<input type="password" class="form-control" id="exampleDropdownFormPassword1" name="clave" placeholder="Contraseña" required>
						    </div>
						    <div class="form-group">
						      	<div class="form-check">
						        	<input type="checkbox" class="form-check-input" id="dropdownCheck">
						        	<label class="form-check-label" for="dropdownCheck">Recuerdame</label>
						      	</div>
						    </div>
						    <button type="submit" class="btn btn-success btn-block" style="">Ingresar</button>
					  	</form>
						<a class="dropdown-item" href="pages/register.php"><i class="fa fa-edit"></i> Unirse a la comunidad</a>
						<a class="dropdown-item" href="#">Recuperar contraseña?</a>
					</div>
		    	</div>
				<?php
					if ($_POST) {
						$correo = $_POST['correo'];
						$clave  = md5($_POST['clave']);
						if(login($con, $correo, $clave)) {
							if($_SESSION['urol'] == 'Usuario') {
								echo "<script> window.location.replace('pages/users.php'); </script>";
							} else if($_SESSION['urol'] == 'Instructor') {
								echo "<script> window.location.replace('pages/instructor.php'); </script>";
							} else if($_SESSION['urol'] == 'Admin-full') {
								echo "<script> window.location.replace('pages/administrator.php'); </script>";
							}
						} else {
							$_SESSION['type']    = 'danger';
							$_SESSION['message'] = 'Los datos del Usuario son Incorrectos!';
						}
					}
				?>
		  	</div>
		</div>

		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><strong>Buscar</strong></button>
		</form>
	</div>
</nav>
<div class="container text-center">
	<div class="row">
		<div class="col-md-12">
			<?php include 'pages/home.php'; ?>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include 'includes/footer.inc'; ?>