<?php

include_once("db.php");

$mas_intervenciones = executeQuery("select personas.id,personas.grupo,personas.zona,personas.nombre,personas.apellidos,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by intervencion_actividades.persona_id order by veces desc limit 0,4;");

$menos_intervenciones = executeQuery("select personas.id,personas.grupo,personas.zona,personas.nombre,personas.apellidos,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by intervencion_actividades.persona_id having veces<2;");
shuffle($menos_intervenciones);
$menos_intervenciones = array_splice($menos_intervenciones,0,4);

$solo_una = count(executeQuery("select personas.nombre,personas.apellidos,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by personas.id having veces<2;"));

$ultimas = executeQuery("select personas.id,personas.nombre,personas.apellidos,personas.grupo,personas.zona,intervencion_actividades.fase from personas,intervencion_actividades where personas.id=intervencion_actividades.persona_id order by intervencion_actividades.id desc limit 0,4;");

$arr = executeQuery("select personas.grupo,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by personas.grupo order by veces desc;");


$chart="";
foreach ($arr as $item)
{
	$chart.="\n\t\t['".$item['grupo']."', ".$item['veces']."],";
}
$chart=chop($chart,',');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Sena2.info - El Senado de España al descubierto</title>
	<meta name="description" content="Sena2.info - Como parte de El Desafío AbreDatos 2010 ponemos a disposición esta web con análisis estadísticos del Senado español." />
	<meta name="keywords" content="senado,senadores,españa,españoles,politica,politicos,abredatos,desafio,2010,estadisticas,investigacion,camara alta,cortes generales,español,intervenciones" />

	<meta name="robots" content="NOODP, " />
	<meta http-equiv="Content-Language" content="es" />

	<link href="stylesheets/style.css" media="screen" rel="Stylesheet" type="text/css" />
	<link rel="shortcut icon" href="/favicon.ico">

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
</head>
<body>

<div id="container">

	<div id="header">
		<?php include_once("header.php"); ?>
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
						echo "\t\t\t\t\t<tr><td class=\"num\">".$item['veces']."</td><td><a href=\"/senador/".$item['id']."\">".mb_convert_case($item['nombre'],MB_CASE_TITLE,'iso-8859-1')." ".mb_convert_case($item['apellidos'],MB_CASE_TITLE,'iso-8859-1')."</a><br>".mb_convert_case($item['zona'],MB_CASE_TITLE,'iso-8859-1')." &middot; ".$item['grupo']."</td></tr>\n";
					}
				?>
					
				</table>
				
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
						echo "\t\t\t\t\t<tr><td class=\"num\">".$item['veces']."</td><td><a href=\"/senador/".$item['id']."\">".mb_convert_case($item['nombre'],MB_CASE_TITLE,'iso-8859-1')." ".mb_convert_case($item['apellidos'],MB_CASE_TITLE,'iso-8859-1')."</a><br>".mb_convert_case($item['zona'],MB_CASE_TITLE,'iso-8859-1')." &middot; ".$item['grupo']."</td></tr>\n";
					}
				?>
				</table>
				
				<div class="cont">
					
					<p>Hay <a href="senadoressinintervenciones" target="_blank" onClick="window.open(this.href, this.target, 'width=440,height=300,scrollbars=1'); return false;"><?php echo $solo_una?> senadores</a> que no han intervenido en toda la legislatura. <a href="sinintervenciones.html" target="_blank" onClick="window.open(this.href, this.target, 'width=640,height=440'); return false;">&iquest;Qu&eacute; significa esto?</a></p>
					
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
						echo "\t\t\t\t\t<tr><td><a href=\"/senador/".$item['id']."\">".mb_convert_case($item['nombre'],MB_CASE_TITLE,'iso-8859-1')." ".ucwords(strtolower($item['apellidos']))."</a><br>".mb_convert_case($item['zona'],MB_CASE_TITLE,'iso-8859-1')." &middot; ".$item['grupo']."</td><td>".$item['fase']."</td></tr>\n";
					}
				?>
				</table>
					
				</div><!-- .cont -->
			
			</div><!-- .block -->
			
			
			
			
		
	</div><!-- #content -->
	
</div><!-- #container -->

		<script type="text/javascript"><!--
			google_ad_client = "pub-1902509609982107";
			/* 300x250, created 7/15/10 */
			google_ad_slot = "9605777122";
			google_ad_width = 300;
			google_ad_height = 250;
			//-->
		</script>
		<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>

</body>
</html>
