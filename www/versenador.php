<?php

include_once("db.php");
include_once("tagcloud2.php");
include_once("switchlist.php");

//$id = (isset($_GET['id']))?$_GET['id']:1;
$id = (isset($_GET['id']))?cleanQuery($_GET['id']):1;
$senador = searchSenatorById($id);

$result = executeQuery("select count(id) as veces from intervencion_actividades where persona_id=$id;");
$ints_senador = $result[0]['veces'];
$int_senador = executeQuery("select intervencion_actividades.fase,actividades.titulo,actividades.url from actividades,intervencion_actividades where actividades.url=intervencion_actividades.actividad and intervencion_actividades.persona_id=$id order by intervencion_actividades.fase asc;");

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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Sena2.info - <?php echo mb_convert_case($senador['nombre'], MB_CASE_TITLE,'iso-8859-1')." ".mb_convert_case($senador['apellidos'], MB_CASE_TITLE,'iso-8859-1');  ?></title>
	<meta name="description" content="Sena2.info - Como parte de El Desafío AbreDatos 2010 podemos a disposición esta web con análisis estadísticos del Senado español." />
	<meta name="keywords" content="senado,senadores,españa,españoles,politica,politicos,abredatos,desafio,2010,estadisticas,investigacion,camara alta,cortes generales,español,intervenciones" />

	<meta name="robots" content="NOODP, " />
	<meta http-equiv="Content-Language" content="es" />

	<link href='/stylesheets/style.css' media="screen" rel="Stylesheet" type="text/css" />
	<link rel="shortcut icon" href="/favicon.ico"/>

	<!--Load the AJAX API-->
	<script type="text/javascript" src="/js/switchlist.js"></script>	
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
		chart.draw(data, {width: 600, height: 300, is3D: true, legendFontSize: 10, title: 'Tipo de intervenciones'});
	  }
	</script>
</head>
<body>

<div id="container">

	<div id="header">
		<?php include_once("header.php");?>
	</div><!-- #header -->
	
	
	<div id="content">
		
		<div id="sidebar">
			<a href="/">Inicio</a> > Senadores
		</div>
		
		<div id="main_content">
			
			<div class="senador">
				<h1><?php echo mb_convert_case($senador['nombre'], MB_CASE_TITLE,'iso-8859-1')." ".mb_convert_case($senador['apellidos'], MB_CASE_TITLE,'iso-8859-1')?></h1>
				<div class="meta">
					<?php echo mb_convert_case($senador['zona'], MB_CASE_TITLE,'iso-8859-1')." &middot; ".$senador['grupo']?>
				</div>

				<div id="tagcloud">
				<?php
					$arr=executeQuery("select count(descriptores_actividad.descriptor) as N, descriptores_actividad.descriptor from descriptores_actividad,intervencion_actividades where descriptores_actividad.actividad=intervencion_actividades.actividad and intervencion_actividades.persona_id=$id group by descriptor order by N desc limit 0,50;");

					shuffle($arr); // Orden aleatorio

					generateCloud($arr, 8, 35);
				?>
				</div>

				<div class="actividad_senador">
					<div class="intervenciones">

						<div id="chart_div"></div>
					
						<h2><span><?php echo $ints_senador ?></span> intervenciones</h2>
						<?php
						
							addLevel();
							$current = "";
							foreach ($int_senador as $item)
							{
								$fase = $item['fase'];
								if ($current!=$fase)
								{
									if ($current) decLevel();
									$current = $fase;
									addTitle($fase);
								}
								addItem($item['titulo'],"http://www.senado.es/".$item['url']);
							}
							if ($current) decLevel();
						?>

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
