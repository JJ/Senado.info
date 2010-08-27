<?php

include_once("db.php");

$provincias = array();
$provincias[0]="";
$provincias[1]="Álava";
$provincias[2]="Albacete";
$provincias[3]="Alicante";
$provincias[4]="Almería";
$provincias[5]="Asturias";
$provincias[6]="Ávila";
$provincias[7]="Badajoz";
$provincias[8]="Barcelona";
$provincias[9]="Burgos";
$provincias[10]="Cáceres";
$provincias[11]="Cádiz";
$provincias[12]="Cantabria";
$provincias[13]="Castellón";
$provincias[14]="Ceuta";
$provincias[15]="Ciudad Real";
$provincias[16]="Córdoba";
$provincias[17]="Cuenca";
$provincias[18]="Girona";
$provincias[19]="Las Palmas";
$provincias[20]="Granada";
$provincias[21]="Guadalajara";
$provincias[22]="Guipúzcoa";
$provincias[23]="Huelva";
$provincias[24]="Huesca";
$provincias[25]="Illes Balears";
$provincias[26]="Jaén";
$provincias[27]="A Coruña";
$provincias[28]="La Rioja";
$provincias[29]="León";
$provincias[30]="Lleida";
$provincias[31]="Lugo";
$provincias[32]="Madrid";
$provincias[33]="Málaga";
$provincias[34]="Melilla";
$provincias[35]="Murcia";
$provincias[36]="Navarra";
$provincias[37]="Ourense";
$provincias[38]="Palencia";
$provincias[39]="Pontevedra";
$provincias[40]="Salamanca";
$provincias[41]="Segovia";
$provincias[42]="Sevilla";
$provincias[43]="Soria";
$provincias[44]="Tarragona";
$provincias[45]="Santa Cruz de Tenerife";
$provincias[46]="Teruel";
$provincias[47]="Toledo";
$provincias[48]="Valencia/Valéncia";
$provincias[49]="Valladolid";
$provincias[50]="Vizcaya";
$provincias[51]="Zamora";
$provincias[52]="Zaragoza";

if (!$_POST['apellidos'] && !$_POST['grupo'] && !$_POST['provincia'])
	$senadoresL = executeQuery("select nombre, apellidos, zona, grupo, id from personas;");
else
	$senadoresL = searchSenators($_POST['apellidos'], $_POST['grupo'], $provincias[intval($_POST['provincia'])], "", "", "", "", "", false);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Sena2.info - Resultados de la búsqueda</title>
  <meta name="description" content="Sena2.info - Como parte de El Desafío AbreDatos 2010 ponemos a disposición esta web con análisis estadísticos del Senado español." />
  <meta name="keywords" content="senado,senadores,españa,españoles,politica,politicos,abredatos,desafio,2010,estadisticas,investigacion,camara alta,cortes generales,español,intervenciones" />

  <meta name="robots" content="NOODP, " />
  <meta http-equiv="Content-Language" content="es" />

  <link href="/stylesheets/style.css" media="screen" rel="Stylesheet" type="text/css" />
  <link rel="shortcut icon" href="/favicon.ico">

</head>
<body>

<div id="container">

	<div id="header">
	<?php include_once("header.php");?>
	</div><!-- #header -->
	
	
	<div id="content">
		
		<div id="sidebar">
			<a href="/">Inicio</a> > <a href="busqueda.php">Búsqueda</a> > Resultados
		</div>
		
		<div id="main_content">
			
			<div class="senador">

			<h1> <span>Búsqueda de <span class="more">senadores</span></span></h2>
				<br/><br/>
				
				<table>
				<?php
					if ($senadoresL)
						foreach ($senadoresL as $item)
						{
						  echo "<tr><td><a href=\"/senador/".$item['id']."\">".mb_convert_case($item['nombre'],MB_CASE_TITLE,'iso-8859-1')." ".mb_convert_case($item['apellidos'],MB_CASE_TITLE,'iso-8859-1')."</a><br>".mb_convert_case($item['zona'],MB_CASE_TITLE,'iso-8859-1')." · ".$item['grupo']."</td></tr>\n";
						}
					else
						echo "<tr><td>Sin resultados</td></tr>\n";
				?>
					
				</table>
				
				<br/><br/>
				<input type="button" value="Atrás" style="position:relative;left:180px;" onclick="history.go(-1);"/>
			</div><!-- .senador -->
		
		</div><!-- #main_content -->
			
			
			
		
	</div><!-- #content -->
	
</div><!-- #container -->

</body>
</html>
