<?php
	include_once("db.php");

	// Numero de senadores
	$result = executeQuery("select count(id) as senadores from personas;");
	$senadores = $result[0]['senadores'];

	// Numero de intervenciones
	$result = executeQuery("select count(id) as intervenciones from intervencion_actividades;");
	$intervenciones = $result[0]['intervenciones'];

	// Numero de actividades
	$result = executeQuery("select count(titulo) as iniciativas from actividades;");
	$iniciativas = $result[0]['iniciativas'];
?>
	<div class="cont">
			
			<div id="search">
				<a href="info.php">Acerca de</a><br/>
				<a href="blog/">Blog</a>
			</div><!-- #search -->
			
			<a href="/" id="logo"><img src="/img/logoweb.png"></a>
			
			
			<div id="tagline">
				
				<div class="senadores">
					<span class="num"><?php echo $senadores ?></span> <a href='/busqueda'>senadores</a>
				</div>

				<div class="intervenciones">
					<span class="num"><?php echo $intervenciones ?></span> intervenciones
				</div>

				<div class="iniciativas">
					<span class="num"><?php echo $iniciativas ?></span> iniciativas
				</div>
			</div>

			<!--	<div class="cargos">
					<span class="num">234</span> cargos
				</div> -->

		
		</div><!-- .cont -->
