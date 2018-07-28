<?php

use yii\helpers\Url;

?>

<style type="text/css">
	.bluerow { 
        background: #b7daff
    }
	#map-row { 
        max-width: 1080px; 
        width: 100%; 
        height: 520px; 
        display: block; 
        margin: -20px auto 20px; 
        position: relative; 
    }
	.legend { 
        position: absolute; 
        left: 20px; 
        bottom: 20px; 
        display: block; 
        padding: 10px 20px; 
        background: rgba(255,255,255,0.5); 
        font-size: 12px
    }
	#blockcontainer { 
        margin: 0 10px; 
        display: inline-block;
    }
	.block-color { 
        float: left; 
        display: block; 
        width: 20px; 
        height: 10px; 
        position: relative;
    }
	.boxcontainer { 
        display:none; position: absolute; 
        z-index: 1; 
        background: white; 
        padding: 10px 20px; text-align: center;
        min-width: 120px; 
        font-size: 12px;
    }
	.boxcontainer .titlebox { 
        font-weight: bold; 
        font-size: 16px;
        text-transform: uppercase;
    }
	.boxcontainer .contentbox { 
        font-size: 16px;
        font-weight: bold;
    }
	#map-content { 
        width: 300px; 
        height: 250px; 
        display: block; 
        position: relative; 
        overflow: hidden;
    }
</style>

<div class="row bluerow">
	<div id="map-row">
		<div id="map-container">

		</div>

		<div class="legend">
	    	0 <div id="blockcontainer"> </div> 100    
		</div>

		<div class="boxcontainer">
	     
	  		<div class="titlebox"></div>
	  		<div class="contentbox"></div>
	    	inovasi
	  
		</div>
	</div>
</div>

<script defer="defer">        
      
      var stage = new Kinetic.Stage({
        container: 'map-container',
        width: 1080,
        height: 520,
        draggable: true
      });
      var mapLayer = new Kinetic.Layer({
      	x: 60,
        y: 0,
        scale: 1,
      });
      var topLayer = new Kinetic.Layer({
      	x: 60,
        y: 0,
        scale: 1
      });

    $getWidth = $(window).width();

    if($getWidth <= 768){
      stage.setWidth($getWidth);
      var $getHeight = ($getWidth/16)*9;
      stage.setHeight($getHeight);
      
      stage.setScale({x:$getWidth/1080,y:$getHeight/607.5});
      mapLayer.setPosition({x:40,y:0});
      console.log(stage.getScale());
      stage.add(mapLayer);
      stage.draw();

      function makePos(x, y) {
          return {
              'x': x,
              'y': y
          };
      }
      var self = this;
      var stage,
        mapLayer,
        zoomOrigin = makePos(0, 0),
        zoomFactor = 1.1,
        pinchLastDist, pinchStartCenter;

    function zoom(newscale, center) { // zoom around center
        var mx = center.x - stage.getX(),
            my = center.y - stage.getY(),
            oldscale = stage.getScaleX();
            //console.log('zoom ' + newscale.toFixed(2) + ' around ' + mx.toFixed(2) + ',' + my.toFixed(2));

        zoomOrigin = makePos(mx / oldscale + zoomOrigin.x - mx / newscale, my / oldscale + zoomOrigin.y - my / newscale);
        stage.setOffset({x:zoomOrigin.x, y:zoomOrigin.y});
        console.log(stage.getScale());
        stage.setScale({x:newscale,y:newscale});
        stage.draw();
    }

    function stageMouseWheel(factor, p) {
        var oldscale = stage.getScaleX(),
        newscale = oldscale * (zoomFactor - (factor < 0 ? 0.2 : 0));
        zoom(newscale, p);
    }

    function stagePinch(p1, p2) {
        var dist = Math.sqrt(Math.pow((p2.x - p1.x), 2) + Math.pow((p2.y - p1.y), 2));
        if (!pinchLastDist) pinchLastDist = dist;
        var newscale = stage.getScale().x * dist / pinchLastDist;

        var center = makePos(Math.abs((p1.x + p2.x) / 2), Math.abs((p1.y + p2.y) / 2));
        if (!pinchStartCenter) pinchStartCenter = center;

        zoom(newscale, pinchStartCenter);
        pinchLastDist = dist;
    }

    function stageTouchEnd() {
        pinchLastDist = pinchStartCenter = 0;
    }

      $(stage.content).on('mousewheel', function(e) {
            e.preventDefault();
            var evt = e.originalEvent;
            stageMouseWheel.call(self, evt.deltaY, makePos(evt.clientX, evt.clientY));
        });


      stage.getContent().addEventListener('touchmove', function(e) {
              e.preventDefault(); // prevent iPAD panning
              var touch1 = e.touches[0];
              var touch2 = e.touches[1];
              if (touch1 && touch2) {
                  touch1.offsetX = touch1.pageX - $(touch1.target).offset().left;
                  touch1.offsetY = touch1.pageY - $(touch1.target).offset().top;
                  touch2.offsetX = touch2.pageX - $(touch2.target).offset().left;
                  touch2.offsetY = touch2.pageY - $(touch2.target).offset().top;
                  stagePinch.call(self, makePos(touch1.offsetX, touch1.offsetY), makePos(touch2.offsetX, touch2.offsetY));
              }
          }, false);
          stage.getContent().addEventListener('touchend', function(e) {
              stageTouchEnd.call(self);
      }, false);
    }

var TerritoryPathData = {

    <?php if(isset($_GET['id_provinsi'])) { ?>
    <?php $i=1; foreach(\app\models\Kabkota::find()->andWhere(['id_provinsi'=>'32'])->all() as $kabkota) { ?>
    Kabkota_<?= $i; ?> : { id_kabkota : "<?= $kabkota->id; ?>", total : "0", nama : "<?= $kabkota->nama; ?>", path : "<?= $kabkota->peta; ?>"},
    <?php $i++; } ?>
    <?php } else { ?>
    <?php $i=1; foreach(\app\models\Provinsi::find()->all() as $provinsi) { ?>
    Provinsi_<?= $i; ?> : { id_provinsi : "<?= $provinsi->id; ?>", total : "0", nama : "<?= $provinsi->nama; ?>", path : "<?= $provinsi->peta; ?>"},
    <?php $i++; } ?>
    <?php } ?>
};





        if(!color) {            
             var color = ['#f6e7e7','#dca2a2','#cb7373','#b94545','#a00000','#9e0000',
             	'#830000','#7f2222'
             ];
        }

        document.write('<div class="testcontainer">');
        color.forEach(function(entry) {
            document.write('<span class="block-color" style="background-color:'+entry+'"></span>');
        }); 
        document.write('</div>');

        $(".testcontainer").appendTo("#blockcontainer");

        if ($("#blockcontainer").length) {
            $(".testcontainer").appendTo("#blockcontainer");
        }else{
            //$(".testcontainer").hide();
        }

        for(var id in TerritoryPathData) {

      		var key = id;

      		var path = new Kinetic.Path({
	          data: TerritoryPathData[id].path,
            id_provinsi: TerritoryPathData[id].id_provinsi,
	          stroke: '#8b8383',
	          strokeWidth: .5,
	          nama: TerritoryPathData[id].nama,
            id: TerritoryPathData[id].cat_id,
            total: TerritoryPathData[id].total
	        });
	        
          var province =  path.attrs.nama;
          var province_id = path.attrs.id;
          var countProvince = path.attrs.total;

        if(countProvince == 0 ){
            path.setFill(color[0]);
        }else if(countProvince < 15){
            path.setFill(color[1]);
        }else if(countProvince < 30){
            path.setFill(color[2]);
        }else if(countProvince < 45){
            path.setFill(color[3]);
        }else if(countProvince < 60){
            path.setFill(color[4]);
        }else if(countProvince < 75){
            path.setFill(color[5]);
        }else if(countProvince < 80){
            path.setFill(color[6]);
        }else{
            path.setFill(color[7]);
        }

         path.on('mouseover', function() {  
            var mousePos = stage.getPointerPosition();
            var x = mousePos.x - 55 ;
            var y = mousePos.y - 125 ;
            $(".boxcontainer").fadeIn('fast');
            $(".boxcontainer").css({'left': x, 'top': y});
            $('.titlebox').text(this.attrs.nama);          
            $('.contentbox').text(this.attrs.total);
            this.setStroke('black');
            this.setStrokeWidth('1');
            this.moveTo(topLayer);
            topLayer.drawScene();

          });

          path.on('mouseout', function() {
                $(".boxcontainer").css({'display': 'none' });
                this.setStrokeWidth('.5');
                this.moveTo(mapLayer);
                topLayer.draw();     
          });

           path.on("mousedown", function (e) {
                var province_name = this.attrs.nama;
                var id_provinsi = this.attrs.id_provinsi;
                var prov_array = province_name.split(" ");
                var province = prov_array.join('-');
                
				var url = '<?= Url::to(["site/inovasi-index"]); ?>';
				//var url = 'http://indonesiaberinovasi.com/berita-inovasi';
                
                window.location.href = url+'&id_provinsi='+id_provinsi;
          });

		      path.on('touchend', function() {
        		var province_name = this.attrs.nama;
                var id_provinsi = this.attrs.id_provinsi;
                var prov_array = province_name.split(" ");
                var province = prov_array.join('-');

				var url = '<?= Url::to(["site/inovasi-index"]); ?>';
				//var url = 'http://indonesiaberinovasi.com/berita-inovasi';
                window.location.href = url+'&id_provinsi='+id_provinsi;
      		});            

          mapLayer.add(path);
      }

      stage.add(mapLayer);
      stage.add(topLayer);

</script>