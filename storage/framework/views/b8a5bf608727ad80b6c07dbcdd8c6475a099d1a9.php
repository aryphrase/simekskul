<?php if($jenis == 1): ?>
<script type="text/javascript">
	var analytics = <?php echo $jenisekskul; ?>

	google.charts.load('current', {'packages':['corechart']});

	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable(analytics);
		var options = {
			title : 'Ekstrakurikuler Berdasarkan Jenisnya'
		};
		var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
		chart.draw(data, options);
	}
</script>
<?php endif; ?>