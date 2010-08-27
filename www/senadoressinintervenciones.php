<?php

include("db.php");

$senadores = executeQuery("select personas.id,personas.grupo, personas.zona, personas.nombre,personas.apellidos,count(intervencion_actividades.id) as veces from intervencion_actividades,personas where personas.id=intervencion_actividades.persona_id group by personas.id having veces<2;");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Sena2.info - Senadores sin intervenciones</title>
  <meta name="description" content="Sena2.info - Como parte de El Desafío AbreDatos 2010 ponemos a disposición esta web con análisis estadísticos del Senado español." />
  <meta name="keywords" content="senado,senadores,españa,españoles,politica,politicos,abredatos,desafio,2010,estadisticas,investigacion,camara alta,cortes generales,español,intervenciones" />


  <meta name="robots" content="NOODP, " />
  <meta http-equiv="Content-Language" content="es" />

  <link href="/stylesheets/style.css" media="screen" rel="Stylesheet" type="text/css" />
  <link rel="shortcut icon" href="/favicon.ico">

</head>
<body style="overflow:auto;margin: 20px 20px 20px 20px;">
		
			<h1 style="text-align:center;">Senadores que no han intervenido ni una s&oacute;la vez en toda la legislatura</h1>
				<br/><br/>
				
				
				<table>
				<?php
					if ($senadores)
						foreach ($senadores as $item)
						{
						  echo "<tr><td><a onclick=\"window.close();window.opener.window.location='/senador/".$item['id']."';return false;\" href=\"/senador/".$item['id']."\">".mb_convert_case($item['nombre'],MB_CASE_TITLE,'iso-8859-1')." ".mb_convert_case($item['apellidos'],MB_CASE_TITLE,'iso-8859-1')."</a><br>".mb_convert_case($item['zona'],MB_CASE_TITLE,'iso-8859-1')." &middot; ".$item['grupo']."</td></tr>\n";
						}
					else
						echo "<tr><td>Sin resultados</td></tr>\n";
				?>
				</p>
					
				</table>
</body>
</html>
