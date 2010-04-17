<?php

include("config.php");

$link = 0;

function connect_db()
{
	global $db_host,$db_user,$db_pwd,$db_name,$link;
	$link = mysql_connect($db_host, $db_user, $db_pwd) or die(mysql_error());
	mysql_select_db($db_name, $link) or die(mysql_error());
}

function close_db()
{
	global $link;
	mysql_close($link);
}

/*
	Funciones de busqueda. No son muy utiles, salvo la ultima.
*/


function listByName()
{
	connect_db();
	global $link;
	$result = mysql_query("SELECT * FROM personas ORDER BY nombre ASC;",$link)  or die(mysql_error());
	close_db();
	
	$i=0;
	while ($item = mysql_fetch_assoc($result))
	{
		$ret[$i++]=$item;
	}
	
	return $ret;
}

function listBySurname()
{
	connect_db();
	global $link;
	$result = mysql_query("SELECT * FROM personas ORDER BY apellidos ASC;",$link)  or die(mysql_error());
	close_db();
}

function listByGroup()
{
	connect_db();
	global $link;
	$result = mysql_query("SELECT * FROM personas ORDER BY grupo ASC;",$link)  or die(mysql_error());
	close_db();
}

function listByZone()
{
	connect_db();
	global $link;
	$result = mysql_query("SELECT * FROM personas ORDER BY zona ASC;",$link)  or die(mysql_error());
	close_db();
}

function listByParty()
{
	connect_db();
	global $link;
	$result = mysql_query("SELECT * FROM personas ORDER BY partido ASC;",$link) or die(mysql_error());
	close_db();
}

/*
	Realiza busquedas de senadores bajo diferentes criterios. No es sensible a mayusculas.

	Los parametros son por orden: apellidos, grupo, zona, partido, genero, lugar de nacimiento, estado civil y fecha de nacimiento.

	Se tendran en cuenta cuando la cadena que se pasa como parametro no este vacia.

	El ultimo parametro ($OR) determina que los elementos quen los elementos deben cumplir todas las
	condiciones (false) o solo una (true).
*/
function search($surname, $group, $zone, $party, $genre, $birthplace, $state, $birthdate, $OR=false)
{
	$search = "";
	
	if ($surname)
		$search = "SELECT * FROM personas WHERE apellidos LIKE '%$surname%' ";
	
	if ($group)
	{
		if ($search)
			$search.=(($OR)?" UNION SELECT * FROM personas WHERE grupo LIKE '%$group%';":" AND id IN ( SELECT id FROM personas WHERE grupo LIKE '%$group%' )");
		else
			$search = "SELECT * FROM personas WHERE grupo LIKE '%$group%' ";
	}
	
	if ($zone)
	{
		if ($search)
			$search.=(($OR)?" UNION SELECT * FROM personas WHERE zona LIKE '%$zone%';":" AND id IN ( SELECT id FROM personas WHERE zona LIKE '%$zone%' )");
		else
			$search = "SELECT * FROM personas WHERE zona LIKE '%$zone%' ";
	}
	
	if ($party)
	{
		if ($search)
			$search.=(($OR)?" UNION SELECT * FROM personas WHERE partido LIKE '%$party%';":" AND id IN ( SELECT id FROM personas WHERE partido LIKE '%$party%' )");
		else
			$search = "SELECT * FROM personas WHERE partido LIKE '%$party%' ";
	}

	if ($genre)
	{
		if ($search)
			$search.=(($OR)?" UNION SELECT * FROM personas WHERE genero LIKE '%$genre%';":" AND id IN ( SELECT id FROM personas WHERE genero LIKE '%$genre%' )");
		else
			$search = "SELECT * FROM personas WHERE genero LIKE '%$genre%' ";
	}

	if ($birthplace)
	{
		if ($search)
			$search.=(($OR)?" UNION SELECT * FROM personas WHERE lugar_nacimiento LIKE '%$birthplace%';":" AND id IN ( SELECT id FROM personas WHERE lugar_nacimiento LIKE '%$birthplace%' )");
		else
			$search = "SELECT * FROM personas WHERE lugar_nacimiento LIKE '%$birthplace%' ";
	}

	if ($birthdate)
	{
		if ($search)
			$search.=(($OR)?" UNION SELECT * FROM personas WHERE fecha_nacimiento LIKE '%$birthdate%';":" AND id IN ( SELECT id FROM personas WHERE fecha_nacimiento LIKE '%$birthdate%' )");
		else
			$search = "SELECT * FROM personas WHERE fecha_nacimiento LIKE '%$birthdate%' ";
	}

	if ($state)
	{
		if ($search)
			$search.=(($OR)?" UNION SELECT * FROM personas WHERE estado_civil LIKE '%$state%';":" AND id IN ( SELECT id FROM personas WHERE estado_civil LIKE '%$state%' )");
		else
			$search = "SELECT * FROM personas WHERE estado_civil LIKE '%$state%' ";
	}

	global $link;
	connect_db();
	$result = mysql_query("$search;",$link) or die(mysql_error());
	close_db();
	
	$i=0;
	while ($item = mysql_fetch_assoc($result))
	{
		$ret[$i++]=$item;
	}
	
	return $ret;
}

?>
