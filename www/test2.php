<?php

include("db.php");

$total_pp = count(search("", "", "", "pop", "", "", "", ""));
$total_psoe = count(search("", "", "", "obrero", "", "", "", ""));

$casados_pp = count(search("", "", "", "pop", "", "", "casad", ""));
$casados_psoe = count(search("", "", "", "obrero", "", "", "casad", ""));

$divorciados_pp = count(search("", "", "", "pop", "", "", "div", ""));
$divorciados_psoe = count(search("", "", "", "obrero", "", "", "div", ""));

$solteros_pp = count(search("", "", "", "pop", "", "", "solter", ""));
$solteros_psoe = count(search("", "", "", "obrero", "", "", "solter", ""));

$data = "[
		['Casados', $casados_pp, $casados_psoe],
		['Divorciados', $divorciados_pp, $divorciados_psoe],
		['Solteros', $solteros_pp, $solteros_psoe],
		['Indefinido', ".($total_pp-$casados_pp-$divorciados_pp-$solteros_pp).", ".($total_psoe-$casados_psoe-$divorciados_psoe-$solteros_psoe)."]
	];";

?>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
    
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1', {'packages':['barchart']});
      
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
      
      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

      // Create our data table.
        var data = new google.visualization.DataTable();
        var partidos = ['PP', 'PSOE'];
        var raw_data = <?php echo $data ?>
        
        data.addColumn('string', 'Estado civil');
		  for (var i = 0; i  < raw_data.length; ++i) {
			data.addColumn('number', raw_data[i][0]);    
		  }
		  
		  data.addRows(partidos.length);

		  for (var j = 0; j < partidos.length; ++j) {    
			data.setValue(j, 0, partidos[j].toString());    
		  }
		  for (var i = 0; i  < raw_data.length; ++i) {
			for (var j = 1; j  < raw_data[i].length; ++j) {
			  data.setValue(j-1, i+1, raw_data[i][j]);    
			}
		  }

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 400, height: 240, is3D: true, title: 'Estado civil'});
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
