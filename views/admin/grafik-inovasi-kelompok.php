<?php 
use app\models\KelompokInovator;
?>

<!-- <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            Statistik Inovasi
        </h3>
    </div>

    <div class="box-body">
        <div id="grafik-inovasi-kelompok"> FusionChart XT will load here! </div>
    </div>
</div> -->

<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-inovasi-kelompok",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Jumlah Inovasi Berdasarkan Kelompok",
              "xAxisName": "Kelompok Inovasi",
              "yAxisName": "Jumlah Inovasi",
              "theme": "fint"
           },
          "data":        
              [ <?php print KelompokInovator::getGrafik(); ?> ]
             
           
        }
    });

    revenueChart.render();
})

</script>
<div id="grafik-inovasi-kelompok"> FusionChart XT will load here! </div>