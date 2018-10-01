<?php 
use app\models\User;
?>

<div class="container">
	<div class="box">
		<div class="box-header with-border">
			<h3  class="box-title">Grafik</h3>
		</div>

		<div class="box-body">
			<div id="grafik-inovasi"> FusionChart XT will load here! </div>

			<div>&nbsp;</div>

			<div id="grafik-post"> FusionChart XT will load here! </div>
		</div>
	</div>
</div>

<div>&nbsp;</div>

<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-inovasi",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Jumlah Inovasi Berdasarkan User Pembuat",
              "xAxisName": "User Pembuat",
              "yAxisName": "Jumlah Inovasi",
              "theme": "fint"
           },
          "data":        
              [ <?php print User::getGrafik('inovasi'); ?> ]
             
           
        }
    });

    revenueChart.render();
});

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-post",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Jumlah Post Berdasarkan User Pembuat",
              "xAxisName": "User Pembuat",
              "yAxisName": "Jumlah Post",
              "theme": "fint"
           },
          "data":        
              [ <?php print User::getGrafik('post'); ?> ]
             
           
        }
    });

    revenueChart.render();
});
    
</script> 