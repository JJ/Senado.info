<link href='/stylesheets/tagcloud.css' media="screen" rel="Stylesheet" type="text/css" />
<?php

include_once("db.php");

function ae_detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}

function ae_detect_opera()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false))
        return true;
    else
        return false;
}

function random_color(){
    /*mt_srand((double)microtime()*1000000);
    $c = '';
    while(strlen($c)<6){
        $c .= sprintf("%02X", mt_rand(0, 255));
    }
    return $c;*/
    
    $color = array();
    $color[0] = "4F0043";
    $color[1] = "9C0804";
    $color[2] = "FFA929";
    $color[3] = "7E991B";
    
    return $color[rand(0,count($color)-1)];
}

function mysort($arr)
{
	$ret = array($arr[0]);
	
	array_shift($arr);
	
	foreach ($arr as $item)
	{
		if (count($ret)%2)
		{
			array_unshift($ret, $item);
		}
		else
		{
			array_push($ret, $item);
		}
	}
	
	return $ret;
}

function generateCloud($arr, $min_size, $max_size)
{

	// Obtenemos maximos y minimos
	$min_n = 0;
	$max_n = 0;
	foreach ($arr as $desc)
	{
		$min_n = ($min_n>$desc['N'])?$desc['N']:$min_n;
		$max_n = ($max_n<$desc['N'])?$desc['N']:$max_n;
	}

	// Una vez obtenemos calculamos la proporcion
	$prop = ($max_size-$min_size)/($max_n-$min_n);

	echo "
	<div id='nube'>
	<div id='etiquetas'>
	";

	// A escribir!
	$i=0;$script="var item,x;\n";
	foreach ($arr as $desc)
	{
		$id = "desc$i";
		
		echo "<span style='font-size:".($min_size+round($desc['N']*$prop,2))."px;color:".random_color().";'  id='$id'>".$desc['descriptor']."</span>";
		
		// Intercambia ancho y alto
		if (!rand(0,4) && !ae_detect_opera())
		{
			if (ae_detect_ie())
			{
				$script.="item = document.getElementById('$id');\n";
				$script.="x = item.clientWidth;\n";
				$script.="if (x<=70) {\n";
				$script.="document.getElementById('$id').className += 'vertical';\n";
				$script.="}\n";
			}
			else
			{
				$script.="item = document.getElementById('$id');\n";
				$script.="x = item.clientWidth;\n";
				$script.="if (x<=70) {\n";
				$script.="item.style.width=item.clientHeight;\n";
				$script.="item.style.height=x;\n";
				$script.="document.getElementById('$id').className += 'vertical';\n";
				$script.="item.style.marginLeft=item.style.width;\n";
				$script.="item.style.width=0;\n";
				$script.="item.style.whiteSpace='nowrap';\n";
				$script.="}\n";
			}
		}
		
		
		
		$i++;
	}
	/*$script .= "x = document.getElementById('nube').offsetWidth;\n";
	$script .= "for (var i=0;i<$i;i++){\n";
	$script .= "item=document.getElementById('desc'+i);\n";
	$script .= "while (item.clientWidth>x){\n";
	$script .= "item.style.fontSize=parseInt(item.style.fontSize.replace('px',''))-1;}}\n";*/

	echo "
	<div style='clear:both'></div>
	</div>
	</div>
	";
	
	echo "<script type='text/javascript'>\n$script</script>\n";
}

?>
