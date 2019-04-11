<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Chart Jenis Ekskul -->
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var record={!! json_encode($jenis_ekskul) !!};
        console.log(record);
		var data = new google.visualization.DataTable;
		data.addColumn('string', 'nama_jenisekskul');
        data.addColumn('number', 'total');
        for(var k in record) {
            var v = record[k];
           
             data.addRow([k,v]);
          console.log(v);
        }
		var options = {
			title : 'Ekstrakurikuler Berdasarkan Jenisnya',
			pieHole: 0.4,
			legend : { position : 'bottom' }
		};
		var chart = new google.visualization.PieChart(document.getElementById('chart_jenisekskul'));
		chart.draw(data, options);
	}
</script>

<!-- Chart Jenis Ekskul -->
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var record={!! json_encode($jumlah_anggota) !!};
        console.log(record);
		var data = new google.visualization.DataTable;
		data.addColumn('string', 'nama_kelas');
        data.addColumn('number', 'total');
        for(var k in record) {
            var v = record[k];
           
             data.addRow([k,v]);
          console.log(v);
        }
		var options = {
			title : 'Partisipasi Siswa dalam Ekstrakurikuler per kelas',
			legend : { position : 'bottom' }
		};
		var chart = new google.visualization.ColumnChart(document.getElementById('chart_jumlahanggota'));
		chart.draw(data, options);
	}
</script>