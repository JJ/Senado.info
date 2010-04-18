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

$ultimas = executeQuery("select personas.id,personas.nombre,personas.apellidos,personas.grupo,personas.zona,intervencion_actividades.fase from personas,intervencion_actividades where personas.id=intervencion_actividades.persona_id order by intervencion_actividades.id desc limit 0,4;");

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
					<span>Senadores con <span class="more">m&aacute;s</span></span>
					intervenciones
				</h2>
				
				<table>
				<?php
					foreach ($mas_intervenciones as $item)
					{
						echo "<tr><td class=\"num\">".$item['veces']."</td><td><a href=\"senador.php?id=".$item['id']."\">".ucwords(mb_strtolower($item['nombre'],"iso-8859-1"))." ".ucwords(mb_strtolower($item['apellidos'],"iso-8859-1"))."</a><br>".ucwords(mb_strtolower($item['zona'],"iso-8859-1"))." &middot; ".$item['grupo']."</td></tr>\n";
					}
				?>
					
				</table>
				
				<?php

				include_once("db.php");

				$arr = executeQuery("select personas.grupo,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by personas.grupo order by veces desc;");


				$chart="";
				foreach ($arr as $item)
				{
					$chart.="\n\t\t['".$item['grupo']."', ".$item['veces']."],";
				}
				$chart=chop($chart,',');

				?>

				<!--Load the AJAX API-->
				<script type="text/javascript" src="http://www.google.com/jsapi"></script>
				<script type="text/javascript">
				
				  // Load the Visualization API and the piechart package.
				  google.load('visualization', '1', {'packages':['piechart']});
				  
				  // Set a callback to run when the Google Visualization API is loaded.
				  google.setOnLoadCallback(drawChart);
				  
				  // Callback that creates and populates a data table, 
				  // instantiates the pie chart, passes in the data and
				  // draws it.
				  function drawChart() {

				  // Create our data table.
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'Grupo');
					data.addColumn('number', 'Intervenciones');
					data.addRows([<?php echo $chart ?>
					]);

					// Instantiate and draw our chart, passing in some options.
					var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
					chart.draw(data, {width: 280, height: 200, is3D: true, title: 'Intervenciones en el Senado', titleFontSize: 15});
				  }
				</script>

				<!--Div that will hold the pie chart-->
				<div id="chart_div" style="border: 1px dotted #999;"></div>

			
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
						echo "<tr><td class=\"num\">".$item['veces']."</td><td><a href=\"senador.php?id=".$item['id']."\">".ucwords(mb_strtolower($item['nombre'],"iso-8859-1"))." ".ucwords(mb_strtolower($item['apellidos'],"iso-8859-1"))."</a><br>".ucwords(mb_strtolower($item['zona'],"iso-8859-1"))." &middot; ".$item['grupo']."</td></tr>\n";
					}
				?>
				</table>
				
				<div class="cont">
					
					<p>Hay <a href="#"><?php echo $solo_una?> senadores</a> que no han intervenido en toda la legislatura. <a href="#">&iquest;Qu&eacute; significa esto?</a></p>
					
					<!-- <p>De los senadores que no han intervenido, hay 123 que tampoco han presentado ninguna iniciativa ni ostentan ningún cargo.</p> -->
					
				</div><!-- .cont -->
			
			</div><!-- .block -->
			
			
			
			<div class="block">
				
				<h2>
					<span>&Uacute;ltimas</span>
					intervenciones
				</h2>
				
				<div class="cont">
				
				<table>
				<?php
					foreach ($ultimas as $item)
					{
						echo "<tr><td><a href=\"senador.php?id=".$item['id']."\">".ucwords(mb_strtolower($item['nombre'],"iso-8859-1"))." ".ucwords(strtolower($item['apellidos']))."</a><br>".ucwords(mb_strtolower($item['zona'],"iso-8859-1"))." &middot; ".$item['grupo']."</td><td>".$item['fase']."</td></tr>\n";
					}
				?>
				</table>
					
				</div><!-- .cont -->
			
			</div><!-- .block -->
			
			
			
			
		
	</div><!-- #content -->
	
</div><!-- #container -->

</body>
</html>
