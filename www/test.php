<?php

include("db.php");

$arr=listByName();

foreach ($arr as $item)
{
	if (!isset($partido[$item['zona']]))
		$partido[$item['zona']]=1;
	else
		$partido[$item['zona']]++;
}

$chart="";
foreach ($partido as $p=>$n)
{
	$chart.="\n\t\t['$p', $n],";
}
$chart=chop($chart,',');

?>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
    
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1', {'packages':['table']});
      
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
      
      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

      // Create our data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Zona');
        data.addColumn('number', 'Senador');
        data.addRows([<?php echo $chart ?>
        ]);

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.Table(document.getElementById('chart_div'));
        chart.draw(data, {width: 400, height: 240, is3D: true, title: 'Distribucion Partidos Politicos'});
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
