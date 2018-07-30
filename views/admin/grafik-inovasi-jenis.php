<?php 
use app\models\JenisInovasi;
?>

<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "inovasi-grafik-jenis",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Jumlah Inovasi Berdasarkan Jenis",
              "xAxisName": "Jenis Inovasi",
              "yAxisName": "Jumlah Inovasi",
              "theme": "fint"
           },
          "data":        
              [ <?php print JenisInovasi::getGrafik(); ?> ]
             
           
        }
    });

    revenueChart.render();
})
    
</script> 
<div id="inovasi-grafik-jenis"> FusionChart XT will load here! </div>