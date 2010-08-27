<?php

$SL_CURRENT = 0;
$SL_LEVEL = 0;

function decLevel()
{
	echo "</ul>";
	
	global $SL_LEVEL;
	$SL_LEVEL--;
}

function addLevel()
{
	echo "<ul>";
	
	global $SL_LEVEL;
	$SL_LEVEL++;
}

function addItem($titulo, $enlace = "", $style = "")
{
	if ($enlace)
	{
		echo "<li><a ".(($style)?("style=\"$style\""):(""))." href=\"".$enlace."\">".$titulo."</a></li>";
	}
	else
	{
			echo "<li>".$titulo."</li>";
	}
}

function addTitle($titulo, $style = "", $disc="")
{
	global $SL_CURRENT, $SL_LEVEL;
	
	if ($SL_LEVEL)
	{
		echo "<li>";
	}
	
	  echo "<a style=\"".$style."\" href='#' onclick=\"switchit('ID".sprintf("%04d",$SL_CURRENT)."');return false;\">".$titulo."</a><ul style=\"display:none;";
	
	if ($disc)
	{
		echo "list-style-type: ".$disc.";";
	}
	
	echo "\" id='ID".sprintf("%04d",$SL_CURRENT)."'>";
	
	if ($SL_LEVEL)
	{
		echo "</li>\n";
	}
	else echo "\n";
	
	$SL_CURRENT++;	
	$SL_LEVEL++;
}


?>
