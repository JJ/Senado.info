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

$id = (isset($_POST['id']))?$_POST['id']:1;

$senador = searchSenatorById($id);

$result = executeQuery("select count(id) as veces from intervencion_actividades where persona_id=$id;");
$ints_senador = $result[0]['veces'];
$int_senador = executeQuery("select actividad,fase from intervencion_actividades where persona_id=$id limit 0,4;");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=latin-1" />
  <title>Senado.info: Informaci�n sobre la web</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <meta name="robots" content="NOODP, " />
  <meta http-equiv="Content-Language" content="es" />

  <link href="stylesheets/style.css" media="screen" rel="Stylesheet" type="text/css" />

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"></script>

<style>

</style>

<body>

<div id="container">

	<div id="header">
		
		<div class="cont">

			<a href="" id="logo"><img src="img/logoweb.png"></a>
			
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
		
		<div id="sidebar">
			<a href="index.php">Inicio</a> > Informaci�n
		</div>
		
  <div id="main_content">
  
  <div class="senador">
  <h1>Sobre senado.info</h1>
			
  
  <p>Senado.info ha sido parte del desaf�o <a href='http://abredatos.es'>AbreDatos 2010</a>, y se propone liberar los datos de la p�gina web del <a href='http://www.senado.es'>Senado espa�ol</a>. Se ha concentrado en una parte de los datos: las intervenciones, para m�s adelante abordar el resto.</p>

<h2>Software</h2>

  <p>sena2.info est� hecho en <a href='http://perl.com'>Perl</a>, y el programa necesario para extraer los datos ha sido liberado en <a href='http://search.cpan.org/~jmerelo/ES-Senado-0.0.3/'>CPAN</a>, el repositorio de m�dulos en Perl. Tambi�n se pueden obtener los fuentes (y colaborar en el desarrollo, si es necesario) en <a href=' http://github.com/JJ/Senado.info'>github</a>. La base de datos se puede descargar completa del mismo repositorio, o de <a href='/data/senado.sql.gz'>este sitio, en formato MySQL</a></p>

<h2>Sobre el Senado</h2>

<p>Nuestra Constituci�n espa�ola define al Senado como la C�mara de representaci�n territorial dada su composici�n, funciones que tiene encomendadas y estructura.</p>

<p>Las funciones del senado son las siguientes:<ul>

<li>Las de integraci�n territorial, legislativa, de control e impulso pol�tico, de control de la pol�tica exterior.</li>

<li>El Senado tramita proyectos de ley que son iniciativas remitidas por el gobierno al Congreso de los Diputados y ya aprobadas por �ste. Tambi�n tramita proposiciones de ley, que son iniciativas remitidas por el Congreso de Diputados u originadas en el propio Senado</li>
</ul>

<p>Un <strong>Senador</strong> es un miembro integrante de la C�mara de Senadores o Senado. En los pa�ses democr�ticos, los senadores los eligen los ciudadanos de ese pa�s. Para ser senador se tiene que tener m�s de 18 a�os y pertenecer a un partido pol�tico.</P>

<P>Seg�n la Constituci�n de cada pa�s, los Senadores duran entre cuatro y ocho a�os en su cargo, se renuevan alternadamente cada determinados a�os y pueden ser reelegidos indefinidamente o una cierta cantidad de veces.</p>

<h2>ORGANOS DEL SENADO</h2>

<p>El Senado est� compuesto principalmente por:<ul>

<li>El Presidente, que ostenta la representaci�n de la C�mara.</li>

<li>La Mesa del Senado, cuyas funciones principales son las de regir y ordenar el trabajo de toda la instituci�n.</li>

<li>La Junta de Portavoces, su funci�n principal es fijar el orden del d�a de las sesiones del Pleno.</li>

<li>Las comisiones, pueden ser permanentes y no permanentes. En el caso de las comisiones permanentes, el Pleno del Senado puede conferirles competencia legislativa plena en relaci�n a un asunto, con lo que podr�n aprobar o rechazar definitivamente el proyecto de ley en cuesti�n; en el caso de las comisiones no permanentes son aquellas creadas con un prop�sito espec�fico y cuya tem�tica y duraci�n est�n fijadas de antemano por el Pleno del Senado.</li>
</ul>
</p>

  </div><!-- .senador -->
  
  </div><!-- #main_content -->
  
			
			
		
  </div><!-- #content -->
	
</div><!-- #container -->

</body>
</html>
