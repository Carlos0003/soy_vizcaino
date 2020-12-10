<style>
  nav{background: linear-gradient(35deg,#3C0310,#560518,#8E1E37,#7B0621,#962E45,#8C1A34,#962E45,#7B0621,#8E1E37,#560518,#3C0310);
    animation: change 10s ease-in-out infinite;
    background-size: 400%;
    position: relative;
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
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; z-index: 1; height: 56px; width: 100%;">
  <img src="../public/imgs/postal.jpg" style="width: 50px; height: 50px; padding: 0px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="font-family: cursive;">
    <a class="navbar-brand" href="../social/">&nbsp; <strong>Soy Vizcaíno</strong></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#"> <i class="fa fa-users"> Social</i></a>
      </li> -->
      <li class="nav-item active">
        <a class="nav-link" href="../news"><i class="fa fa-newspaper"> Noticias</i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../culture/"><i class="fa fa-coffee"> Cultura</i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../tourism/"><i class="fa fa-map"> Turismo</i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../opendata/"><i class="fa fa-database"> Open Data</i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../market/"><i class="fa fa-shopping-bag"> Comercio</i></a>
      </li>
    </ul>
    
    <!-- FORMULARIO DE BUSQUEDA -->
    <!-- <form class="form-inline my-2 my-lg-0" style="position: absolute; right: 35%">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><strong>Buscar</strong></button>
    </form> -->
    <!-- ==================================================================================== -->
    <!-- BOTON DE USUARIO -->
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: capitalize;">
          <img src="../<?php echo $_SESSION['ufoto']; ?>" class="border rounded-circle" style="width:50px; height: 50px;">
          <span style="color: white;"><?php echo $_SESSION['unombres'].'&nbsp;'.$_SESSION['uapellidos']; ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #009C46;">
          
          <?php if ($_SESSION['urol'] == 'Admin-full'): ?>
            <a class="dropdown-item" href="<?php echo $url_site."users/"; ?>"> <i class="fa fa-users"></i> Usuarios </a>
            <a class="dropdown-item" href="<?php echo $url_site."materias/"; ?>"> <i class="fa fa-book"></i> Materias </a>
            <a class="dropdown-item" href="<?php echo $url_site."notas/"; ?>"> <i class="fa fa-clipboard"></i> Notas </a>
            <a class="dropdown-item" href="<?php echo $url_site."users/personalinf.php"; ?>"> <i class="fa fa-clipboard"></i> Mis Datos </a>
          <?php endif ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo $url_site."pages/close.php"; ?>"> <i class="fa fa-times"></i> Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </div>
</nav>