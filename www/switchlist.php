<script type="text/javascript">
function switchit(list)
{
	var items = document.getElementById(list).style;
	if (items.display == "none")
	{
		items.display = "block";
	}
	else
	{
		items.display = "none";
	}
}
</script>
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
	
	  echo "<a style=\"".$style."\" href=\"javascript:switchit('ID".sprintf("%04d",$SL_CURRENT)."');\">".$titulo."</a><ul style=\"display:none;";
	
	if ($disc)
	{
		echo "list-style-type: ".$disc.";";
	}
	
	echo "\" id='ID".sprintf("%04d",$SL_CURRENT)."'>";
	
	if ($SL_LEVEL)
	{
		echo "</li>";
	}
	
	$SL_CURRENT++;	
	$SL_LEVEL++;
}


?>
