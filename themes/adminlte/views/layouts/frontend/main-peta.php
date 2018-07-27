<?php
use yii\helpers\Html;
use yii\helpers\Url;
use dmstr\widgets\Alert;
use app\models\PenelitianJenis;
use app\models\User;

?>

<?php $this->beginContent('@app/themes/adminlte/views/layouts/frontend/main.php'); ?>

<!-- <div class="container" style="margin-top: 5%">
	<div id="map-inovation" class="jsmaps-wrapper" style="width: 100%; height: 400px"></div>
</div> -->

	<?= $this->render('/site/_peta'); ?>

	<div class="container" style="margin-top: 20px">
		<?= $content ?>
	</div>

	<script type="text/javascript">
		/*$(function() {
			$('#map-inovation').JSMaps({
				map: 'kabupatenAceh'
			});
		});
		$(function() {
            $('#map-inovation').vectorMap({
            	map: 'indonesia',
            	backgroundColor: "#b7daff",
            	panOnDrag: true
            })
        });*/
        /*function loadMap() {
			var script = document.createElement('script');
			script.type = 'text/javascript';
			script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDiXfEJriD0uBlxECkInqar0k40mSV8aQA&' + 'callback=initMap';
			document.body.appendChild(script);
		}

		initMap = function() {
			var google = window.google || {};

	 		var c_map = new google.maps.Map(document.getElementById('map-inovation'), {
	 			center: new google.maps.LatLng(-0.440388,118.762910),
	 			zoom: 5,
	 			mapTypeId: google.maps.MapTypeId.ROADMAP
	 		});

	 		var geometryObject = new google.maps.FusionTablesLayer({
	 			query: {
	 				select: 'geometry',
	 				from: '18mGzYdaV_q0M1Vg1_IMlMbYQuG1tXxUnXtGxYUMz',
		 		},
	 			map: c_map,
	 			suppressInfoWindows: true
	 		});

	 		google.maps.event.addListener(geometryObject, 'click', function(e) {
	 			console.log(e.row.kode.value + e.row.name.value).document.location.href = document.location.protocol + '//' + document.location.host + '/countries/' + e.row.Name.value.toLowerCase();
	 		});
	 	};
		loadMap();*/
	</script>

<?php $this->endContent(); ?>