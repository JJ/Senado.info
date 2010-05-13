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

$id = (isset($_GET['id']))?$_GET['id']:1;

$senador = searchSenatorById($id);

$result = executeQuery("select count(id) as veces from intervencion_actividades where persona_id=$id;");
$ints_senador = $result[0]['veces'];
$int_senador = executeQuery("select actividad,fase from intervencion_actividades where persona_id=$id;");

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
			
			<div id="search">
				
			</div><!-- #search -->
			
			<div id="tagline">
				
				<div class="senadores">
					<span class="num"><?php echo $senadores ?></span> <a href='/senadores.php'>senadores</a>
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
  <h1><?php echo ucwords(mb_strtolower($senador['nombre'], "iso-8859-1"))." ".ucwords(mb_strtolower($senador['apellidos'], "iso-8859-1"))?></h1>
				<div class="meta">
					<?php echo ucwords(mb_strtolower($senador['zona'], "iso-8859-1"))." � ".$senador['grupo']?>
				</div>
				
				<div class="actividad_senador">
					
					<div class="intervenciones">
					
							<?php

		include_once("db.php");

		$arr = executeQuery("select fase from intervencion_actividades where persona_id=$id;");

		foreach ($arr as $item)
		{
			if (!isset($act[$item['fase']]))
				$act[$item['fase']]=1;
			else
				$act[$item['fase']]++;
		}

		$chart="";
		foreach ($act as $p=>$n)
		{
			$chart.="\n\t\t['$p', $n],";
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
				data.addColumn('string', 'Senador');
				data.addColumn('number', 'Intervencion');
				data.addRows([<?php echo $chart ?>
				]);

				// Instantiate and draw our chart, passing in some options.
				var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
				chart.draw(data, {width: 300, height: 300, is3D: true, legendFontSize: 12, title: 'Tipo de intervenciones'});
			  }
			</script>

    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
					
						<h2><span><?php echo $ints_senador ?></span> intervenciones</h2>
						<ul>
						<?php
							foreach ($int_senador as $item)
							{
								echo "<li><a href=\"http://www.senado.es/".$item['actividad']."\">".$item['fase']."</a></li>";
							}
						?>
						</ul>

					</div>
					
					
					
<!--					<div class="iniciativas">
						<h2><span>1.234</span> iniciativas</h2>
						<ul>
							<li><a href="#">Titulo del intervención</a></li>
							<li><a href="#">Titulo del intervención</a></li>
							<li><a href="#">Titulo del intervención</a></li>
							<li><a href="#">Titulo del intervención</a></li>
						</ul>
					</div>
					
					<div class="cargos">
						<h2><span>1.234</span> cargos</h2>
						<ul>
							<li><a href="#">Titulo del intervención</a></li>
							<li><a href="#">Titulo del intervención</a></li>
							<li><a href="#">Titulo del intervención</a></li>
							<li><a href="#">Titulo del intervención</a></li>
						</ul>
					</div>-->
				
				</div><!-- .actividad_senador -->
				
			</div><!-- .senador -->
		
		</div><!-- #main_content -->
			
			
			
		
	</div><!-- #content -->
	
</div><!-- #container -->

</body>
</html>
