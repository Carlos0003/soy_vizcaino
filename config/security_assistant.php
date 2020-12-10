<?php 
	if(isset($_SESSION['urol'])) {
		if($_SESSION['urol'] != 'Assistant') {
			echo "<script> 
			  alert('El contenido no esta disponible para este tipo usuario!'); 
			  window.location.replace('../'); 
			  </script>";
		}
	} else {
		echo '<script> 
			  alert("El contenido no esta disponible. \nDebe iniciar sesión"); 
			  window.location.replace("../"); 
			  </script>';
	}