<style>
div
{
    position: absolute;
    display: inline;
    height: inherit;
    width: auto;
    vertical-align:middle;

}
div .parent
{
    position: absolute;
    height: auto;
    width: auto;
}
</style>
<script type="text/javascript">
<?php

include("db.php");

$arr=executeQuery("select count(descriptor) as N, descriptor from descriptores_actividad group by descriptor limit 0,50;");

shuffle($arr); // Orden aleatorio

$min_size = 8;
$max_size = 50;

// Obtenemos maximos y minimos
$min_n = 0;
$max_n = 0;
foreach ($arr as $desc)
{
	$min_n = ($min_n>$desc['N'])?$desc['N']:$min_n;
	$max_n = ($max_n<$desc['N'])?$desc['N']:$max_n;
}

echo "var min_size = $min_size;\n";
echo "var max_size = $max_size;\n";
echo "var min_n = $min_n;\n";
echo "var max_n = $max_n;\n";

echo
"
function f(n)
{
	return min_size+(max_size-min_size)/(max_n-min_n) * n;
}
function run()
{
	var descriptors = new Array();
";

$i=0;
foreach ($arr as $desc)
{
	echo "\tdescriptors[$i] = [ ".$desc['N'].", \"".$desc['descriptor']."\" ];\n";
	$i++;
}

?>
	var size, x=0,sumy=0,y=0;
	for (var i in descriptors)
	{
		size = Math.round(f(Number(descriptors[i][0])));
		document.write("<span style='font-size: "+size+"px;' id='dec"+i+"'>"+descriptors[i][1]+"</div>\n");
		y=((document.getElementById("dec"+i).clientHeight + 1)>y)?(document.getElementById("dec"+i).clientHeight + 1):y;
		x+=(document.getElementById("dec"+i).clientWidth + 1);
		
		if (x>500)
		{
			sumy+=y;
			x=y=0;
		}

	}
}
</script>


<script type="text/javascript">run();</script>

