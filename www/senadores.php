<?php

include("db.php");

// Numero de senadores
$result = executeQuery("select count(id) as senadores from personas;");
$num_senadores = $result[0]['senadores'];

// Numero de intervenciones
$result = executeQuery("select count(id) as intervenciones from intervencion_actividades;");
$intervenciones = $result[0]['intervenciones'];

// Numero de actividades
$result = executeQuery("select count(titulo) as iniciativas from actividades;");
$iniciativas = $result[0]['iniciativas'];

$senadores = executeQuery("select nombre, apellidos, zona, grupo, id from personas;");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Senado.info</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <meta name="robots" content="NOODP, " />
  <meta http-equiv="Content-Language" content="es" />

  <link href="stylesheets/style.css" media="screen" rel="Stylesheet" type="text/css" />
  <link rel="shortcut icon" href="favicon.ico">

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"></script>

<style>

</style>

<body>

<div id="container">

	<div id="header">
		
		<div class="cont">

                        <div id="search">
				<a href="/info.php">Acerca de</a>
			</div><!-- #search -->
			
			<a href="/" id="logo"><img src="img/logoweb.png"></a>

			<div id="tagline">
				
				<div class="senadores">
					<span class="num"><?php echo $num_senadores ?></span>  <a href='/senadores.php'>senadores</a>
				</div>

				<div class="intervenciones">
					<span class="num"><?php echo $intervenciones ?></span> intervenciones
				</div>

				<div class="iniciativas">
					<span class="num"><?php echo $iniciativas ?></span> iniciativas
				</div>

			<!--	<div class="cargos">
					<span class="num">234</span> cargos
				</div> -->

		
		</div><!-- .cont -->
		
	</div><!-- #header -->
	
	
	<div id="content">
		
		<div id="sidebar">
			<a href="index.php">Inicio</a> > Senadores
		</div>
		
		<div id="main_content">
			
			<div class="senador">

  <h1> <span>Lista <span class="more">completa</span></span> de senadores </h2>
				
				<table>
				<?php
					foreach ($senadores as $item)
					{
					  echo "<tr><td class=\"num\">".$item['veces']."</td><td><a href=\"senador.php?id=".$item['id']."\">".ucwords(mb_strtolower($item['nombre'],'iso-8859-1'))." ".ucwords(mb_strtolower($item['apellidos'],'iso-8859-1'))."</a><br>".ucwords(mb_strtolower($item['zona'],'iso-8859-1'))." · ".$item['grupo']."</td></tr>\n";
					}
				?>
					
				</table>
				
			</div><!-- .senador -->
		
		</div><!-- #main_content -->
			
			
			
		
	</div><!-- #content -->
	
</div><!-- #container -->

</body>
</html>
