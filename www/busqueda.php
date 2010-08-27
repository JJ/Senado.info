<?php

include_once("db.php");

// Grupos
$grupos = executeQuery("select grupo from personas group by grupo;");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Sena2.info - Búsqueda de senadores</title>
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
			<a href="/">Inicio</a> > Búsqueda
		</div>
		
		<div id="main_content">
			
			<div class="senador">

			<h1> <span>Búsqueda de <span class="more">senadores</span></span></h2>
				<br/><br/>
				<p>
				<form action="/senadores" name="formulario" method="post">
				<label>Apellidos:</label>
				<input type="text" name="apellidos" size="40"/>
				</p>
				<p>
				<label>
				Provincia:
				</label>
				<select name="provincia">
					<option value='0'>(Cualquiera)</option>
					<option value='1'>Álava</option>
					<option value='2'>Albacete</option>
					<option value='3'>Alicante</option>
					<option value='4'>Almería</option>
					<option value='5'>Asturias</option>
					<option value='6'>Ávila</option>
					<option value='7'>Badajoz</option>
					<option value='8'>Barcelona</option>
					<option value='9'>Burgos</option>
					<option value='10'>Cáceres</option>
					<option value='11'>Cádiz</option>
					<option value='12'>Cantabria</option>
					<option value='13'>Castellón</option>
					<option value='14'>Ceuta</option>
					<option value='15'>Ciudad Real</option>
					<option value='16'>Córdoba</option>
					<option value='17'>Cuenca</option>
					<option value='18'>Girona</option>
					<option value='19'>Las Palmas</option>
					<option value='20'>Granada</option>
					<option value='21'>Guadalajara</option>
					<option value='22'>Guipúzcoa</option>
					<option value='23'>Huelva</option>
					<option value='24'>Huesca</option>
					<option value='25'>Illes Balears</option>
					<option value='26'>Jaén</option>
					<option value='27'>A Coruña</option>
					<option value='28'>La Rioja</option>
					<option value='29'>León</option>
					<option value='30'>Lleida</option>
					<option value='31'>Lugo</option>
					<option value='32'>Madrid</option>
					<option value='33'>Málaga</option>
					<option value='34'>Melilla</option>
					<option value='35'>Murcia</option>
					<option value='36'>Navarra</option>
					<option value='37'>Ourense</option>
					<option value='38'>Palencia</option>
					<option value='39'>Pontevedra</option>
					<option value='40'>Salamanca</option>
					<option value='41'>Segovia</option>
					<option value='42'>Sevilla</option>
					<option value='43'>Soria</option>
					<option value='44'>Tarragona</option>
					<option value='45'>Santa Cruz de Tenerife</option>
					<option value='46'>Teruel</option>
					<option value='47'>Toledo</option>
					<option value='48'>Valencia/Valéncia</option>
					<option value='49'>Valladolid</option>
					<option value='50'>Vizcaya</option>
					<option value='51'>Zamora</option>
					<option value='52'>Zaragoza</option>
					</select>
					<label>Grupo:</label>
					<select name="grupo">
					<option value=''>(Cualquiera)</option>
					<?php
						foreach ($grupos as $g)
						{
							echo "<option value='".$g['grupo']."'>".$g['grupo']."</option>\n";
						}
					?>
					</select>
					</p>
					<br/>
				<input type="submit" value="Buscar" style="position:relative;left:180px;"/>
				</form>

				
			</div><!-- .senador -->
		
		</div><!-- #main_content -->
			
			
			
		
	</div><!-- #content -->
	
</div><!-- #container -->

</body>
</html>
