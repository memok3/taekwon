
<?php

//incluye la función conexión
   include("conexion.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Usamos el nombre de usuario enviado de nuestroformulario
	  
	  //jala los datos ingresados de html
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  $tipo_usuario = $_POST["tipo_usuario"];
	  
	  //Consulta para comprobar el inicio de sesión
      $sql = "SELECT Id_Usuario, Contraseña, Tipo_Usuario FROM Login WHERE Id_Usuario = '$myusername' and Contraseña = '$mypassword' and Tipo_Usuario = '$tipo_usuario'";
	  
	  //Manda la conslta
	  $result = mysqli_query($db,$sql);
	  //cuenta los datos obtenidos
	  $count = mysqli_num_rows($result);
	  //guarda a array los datos obtenidos
	  $row = mysqli_fetch_row($result);
	  
	  //hace una validación de si hay algo en la consulta y cuenta las tuplas
      if($count > 0){
		  //si el tipo de sesión es 1 (competidor) configura la variable session y redirecciona
        if($row[2] == 1) {
            $_SESSION['competidor'] = $row[0];
            $url="Usuarios/pag_alumnos.php";
            header("location: ".$url);
		 }

		 //aun no configuro estos 2
		 else if($row[2] == 2) {
            $_SESSION['login_user'] = $myusername;
            $url="/Usuarios/pag_alumnos.php";
            header("location: ".$url);
		 }
		 else if($row[2] == 3) {
            $_SESSION['login_user'] = $myusername;
            $url="/Usuarios/pag_alumnos.php";
            header("location: ".$url);
		 }

		 //aquí arroja un script
		 else {
            echo "<script>alert('Datos invalidos');</script>";
            $url = "login.php";
            header("Location: ".$url);
         }
      }
      echo "<script>alert('Datos invalidos');</script>";
      
   }
?>
<html>

<head>
	<title>Tae Kwon Do - Ingreso</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>

	<!-- Header -->
	<header id="header">
		<h1><strong><a href="../index.php">Tae Kwon Do</a></strong> </h1>
		<nav id="nav">
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="info.html">Información</a></li>
			</ul>
		</nav>
	</header>

	<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

	<!-- Main -->
	<section id="main" class="wrapper">
		<div class="container">

			<header class="major special">
				<h2>Ingresar</h2>
				<p>Por favor ingrese su usario y contraseña y especifique su tipo de usuario:</p>
			</header>


		</div>
	</section>
	<!-- Inicio de Sesiòn-->
	<section id="three" class="wraper style1">
		<form method="POST" action="">
			<div class="container 50%">

					<div class="7u$ 12u$(small)">
						<input type="user" name="username" id="username" value="" placeholder="user" />
					</div>
					<div class="7u 12u$(small)">
						<input type="password" name="password" id="password" value="" placeholder="Contraseña" required/>
					</div>
					
					<div class="7u 12u$" style="margin-top: 12px">
						<div class="select-wrapper">
							<select name="tipo_usuario" id="tipo_usuario">
											<option value="0">- Tipo Usuario -</option>
											<option value="1">Competidor</option>
											<option value="2">Entrenador</option>
											<option value="3">Comite</option>
										</select>
						</div>
					</div>
					
					<div class="form-group col-lg-12" style="margin-top: 8px">
							<button class="btn btn-block color-btn" type="submit">Iniciar Sesión</button>
						</div>		
						<ul class="actions small">
								<li><a href="Usuarios/entrenador.php" class="button special small">Entrenadores</a></li>
								</ul>		
						<ul class="actions small">
								<li><a href="Usuarios/comite.php" class="button special small">Comite</a></li>
								</ul>

	</section>


	<!-- Footer -->
	<footer id="footer">
		<div class="container">
			<ul class="icons">
				<li><a href="#" class="icon fa-facebook"></a></li>
				<li><a href="#" class="icon fa-twitter"></a></li>
				<li><a href="#" class="icon fa-instagram"></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; Untitled</li>
				<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
				<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
			</ul>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/skel.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>

</body>

</html>