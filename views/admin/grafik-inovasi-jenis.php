<?php 
use app\models\JenisInovasi;
?>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Statistik Inovasi Berdasarkan Jenis
                </h3>
            </div>

            <div class="box-body">
                <div id="grafik-inovasi-jenis"> FusionChart XT will load here! </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Statistik Inovasi Berdasarkan Jenis
                </h3>
            </div>

            <div class="box-body">
                <div id="pie-inovasi-jenis"> FusionChart XT will load here! </div>
            </div>
        </div>
    </div>
</div>

<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-inovasi-jenis",
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
});

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie3d",
        "renderAt": "pie-inovasi-jenis",
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
<!-- <div id="inovasi-grafik-jenis"> FusionChart XT will load here! </div> -->