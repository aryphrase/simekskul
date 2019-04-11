<!-- Chart Jenis Proker -->
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var record={!! json_encode($jenis_proker) !!};
        console.log(record);
		var data = new google.visualization.DataTable;
		data.addColumn('string', 'nama_jenisproker');
        data.addColumn('number', 'total');
        for(var k in record) {
            var v = record[k];
           
             data.addRow([k,v]);
          console.log(v);
        }
		var options = {
			title : 'Jenis Proker',
			pieHole: 0.4,
			legend : { position : 'bottom' }
		};
		var chart = new google.visualization.PieChart(document.getElementById('chart_jenisproker'));
		chart.draw(data, options);
	}
</script>