<?php

include("db.php");

// Numero de senadores
$result = executeQuery("select count(id) as senadores from personas;");
$senadores = $result[0]['senadores'];

// Numero de intervenciones
$result = executeQuery("select count(id) as intervenciones from intervencion_actividades;");
$intervenciones = $result[0]['intervenciones'];

// Numero de actividades
$result = executeQuery("select count(titulo) as iniciativas from actividades;");
$iniciativas = $result[0]['iniciativas'];

$mas_intervenciones = executeQuery("select personas.id,personas.grupo,personas.zona,personas.nombre,personas.apellidos,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by intervencion_actividades.persona_id order by veces desc limit 0,4;");

$menos_intervenciones = executeQuery("select personas.id,personas.grupo,personas.zona,personas.nombre,personas.apellidos,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by intervencion_actividades.persona_id order by veces asc limit 0,4;");

$solo_una = count(executeQuery("select personas.nombre,personas.apellidos,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by personas.id having veces<2;"));

$ultimas = executeQuery("select personas.nombre,personas.apellidos,personas.grupo,personas.zona,intervencion_actividades.fase from personas,intervencion_actividades where personas.id=intervencion_actividades.persona_id order by intervencion_actividades.id desc limit 0,4;");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=latin-1" />
  <title>Senado.info</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <meta name="robots" content="NOODP, " />
  <meta http-equiv="Content-Language" content="es" />
  <link href="stylesheets/style.css" media="screen" rel="Stylesheet" type="text/css" />

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"></script>

<body>

<div id="container">

	<div id="header">
		
		<div class="cont">
			
			<div id="search">
				<a href="/info.php">Acerca de</a>
			</div><!-- #search -->
			
			<a href="/" id="logo"><img src="img/logoweb.png"></a>
			
			<div id="search">
				
			</div><!-- #search -->
			
			<div id="tagline">
				
				<div class="senadores">
					<span class="num"><?php echo $senadores ?></span> senadores
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
		
		<div class="home">
			
			<div class="block">
				
				<h2>
					<span>Senadores con <span class="more">más</span></span>
					intervenciones
				</h2>
				
				<table>
				<?php
					foreach ($mas_intervenciones as $item)
					{
						echo "<tr><td class=\"num\">".$item['veces']."</td><td><a href=\"senador.php?id=".$item['id']."\">".ucwords(strtolower($item['nombre']))." ".ucwords(strtolower($item['apellidos']))."</a><br>".ucwords(strtolower($item['zona']))." · ".$item['grupo']."</td></tr>\n";
					}
				?>
					
				</table>
			
			</div>
			
			<div class="block">
				
				<h2>
					<span>Senadores con <span class="less">menos</span></span>
					intervenciones
				</h2>

				<table>
				<?php
					foreach ($menos_intervenciones as $item)
					{
						echo "<tr><td class=\"num\">".$item['veces']."</td><td><a href=\"senador.php?id=".$item['id']."\">".ucwords(strtolower($item['nombre']))." ".ucwords(strtolower($item['apellidos']))."</a><br>".ucwords(strtolower($item['zona']))." · ".$item['grupo']."</td></tr>\n";
					}
				?>
				</table>
				
				<div class="cont">
					
					<p>Hay <a href="#"><?php echo $solo_una?> senadores</a> que no han intervenido en toda la legislatura. <a href="#">¿Qué significa esto?</a></p>
					
					<!-- <p>De los senadores que no han intervenido, hay 123 que tampoco han presentado ninguna iniciativa ni ostentan ningún cargo.</p> -->
					
				</div><!-- .cont -->
			
			</div><!-- .block -->
			
			
			
			<div class="block">
				
				<h2>
					<span>Últimas</span>
					intervenciones
				</h2>
				
				<div class="cont">
				
				<table>
				<?php
					foreach ($ultimas as $item)
					{
						echo "<tr><td><a href=\"#\">".ucwords(strtolower($item['nombre']))." ".ucwords(strtolower($item['apellidos']))."</a><br>".ucwords(strtolower($item['zona']))." · ".$item['grupo']."</td><td>".$item['fase']."</td></tr>\n";
					}
				?>
				</table>
					
				</div><!-- .cont -->
			
			</div><!-- .block -->
			
			
			
			
		
	</div><!-- #content -->
	
</div><!-- #container -->

</body>
</html>
