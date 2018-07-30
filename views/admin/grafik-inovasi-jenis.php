<?php 
use app\models\JenisInovasi;
?>

<!-- <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            Statistik Inovasi
        </h3>
    </div>

    <div class="box-body">
        <div id="inovasi-grafik-jenis"> FusionChart XT will load here! </div>
    </div>
</div> -->

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