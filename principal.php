
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>::. RANGER - Bienvenido  .::</title>
    <link rel="icon" type="image/png" href="./img/r.png" />
    <meta autor="Miguel Quiñones Miquitec" content="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/custom1.css">
    <link rel="prev" href="index.html" />
    
  </head>
  <body>
    <?php
    if (isset($_SESSION['loggedin'])) {
    }
    else {
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Nesecitas iniciar sesion para ver el contenido de esta pagina.</h4>
        <p><a href='index'>Ingrese aqui!</a></p></div>";
        exit;
    }
    // checking the time now when check-login.php page starts
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Tu sesion ha esxpirado!</h4>
        <p><a href='index'>Ingrese aqui</a></p></div>";
        exit;
        }
    ?>
    <nav class="navbar  navbar-expand-lg bg-primary navbar-dark justify-content-between" style="background-color: #d5e1df; color:white;">
      <a class="navbar-brand">
        <a href="index.html"><img src="./img/r.png" width="30" height="30" class="d-inline-block align-top" ></a>ANGER
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
    </div>
    <form class="form-inline">
      <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuario
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="principal">Action</a>
          <a class="dropdown-item" href="edit-profile">Editar perfil</a>
          <a class="dropdown-item" href="logout">Salir</a>
        </div>
      </div>
    </form>
    </nav>
    <br>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Administrar <b>Productos</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo producto</span></a>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                </div>
			</div>
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->


        </div>
    </div>
	<!-- Edit Modal HTML -->
	<?php include("modals/modal_add.php");?>
	<!-- Edit Modal HTML -->
	<?php include("modals/modal_edit.php");?>
	<!-- Delete Modal HTML -->
	<?php include("modals/modal_delete.php");?>
	<script src="js/script.js"></script>
  </body>
</html>
