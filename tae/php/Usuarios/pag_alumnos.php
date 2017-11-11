<?php
   include('../conexion.php');
   ini_set("display_errors", E_ALL);
   header("Content-Type: text/html;charset=utf-8");

   session_start();
   
   //Guarda en una variable la sessión
   $user_check = $_SESSION['competidor'];

   //esta es una consulta para obtener el nombre y apellido (no se si está correcta pero sirve)
   $query_cons = "SELECT Nombre_Comp, Apellido_Comp from competidor where Id_Competidor = (select Id_Competidor from Login where Id_Usuario = '$user_check')";
   //ejecuta el 	querry
   $ses_sql = mysqli_query($db,$query_cons);
   
   //Valida si hay datos y los guarda en variables
   while($row = mysqli_fetch_row($ses_sql)){
	   $nombre=$row[0];
	   $appe=$row[1];
   }
   //si hay diferencias redirecciona a  login
   if(!isset($_SESSION['competidor'])){
      header("location: login.php");
   }

?>

<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

	<head>
		<title>Tae Kwon Do</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
            
				<h1><strong><a >Tae Kwon Do</a></strong></h1>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
        
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
                    <h2>Bienvenido <?php echo $nombre.' '.$appe; ?></h2> 
                    <p><a href = "../logout.php">Cerrar Sesión</a></p>
					</header>

					<!-- Table -->
					<!-- _____________________________________Información de historial-->
						<section>
							<h3>Información</h3>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>Competencia</th>
											<th>Descripción</th>
											<th>No.</th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<td>Competidos</td>
											<td>Competencias en toda la carrera</td>
											<td>5</td>
										</tr>
										<tr>
											<td>Ganadas</td>
											<td>Ante turpis integer aliquet porttitor.</td>
											<td>2</td>
										</tr>
										<tr>
											<td>Perdídas</td>
											<td>Vis ac commodo adipiscing arcu aliquet.</td>
											<td>1</td>
										</tr>
										<tr>
											<td>Empatadas</td>
											<td> Morbi faucibus arcu accumsan lorem.</td>
											<td>1</td>
										</tr>
										
										<tr>
											<td>Descalificadas</td>
											<td>Ante turpis integer aliquet porttitor.</td>
											<td>1</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2"></td>
											<td>100.00</td>
										</tr>
									</tfoot>
								</table>
							</div>  
							
					<!-- _____________________________________Datos de alumno-->

							<h4>Datos generales alumno</h4>
							<p> Mostrar datos de alumno</p>
							</section>

				</div>
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
