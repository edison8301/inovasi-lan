<?php 
use app\models\User;
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Statistik Inovasi Berdasarkan User Pembuat
                </h3>
            </div>

            <div class="box-body">
                <div id="grafik-user"> FusionChart XT will load here! </div>
            </div>
        </div>
    </div>
</div>

<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-user",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Jumlah Inovasi Berdasarkan User Pembuat",
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
    
</script> 
<!-- <div id="inovasi-grafik-jenis"> FusionChart XT will load here! </div> -->