<?php
use yii\helpers\Html;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\KuesionerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistem Informasi Kajian (Siska) LAN';

?>

<div class="row">

	<?= $this->render('_peta'); ?>

</div>

<div class="row">
	<div class="col-md-4">
		<div class="widget-subject">
			INOVASI TERBARU
		</div>

		<?= Html::img("@web/images/logo.png", ['style' => 'width:100%; margin-bottom:5%']); ?>
		
		<div class="widget-subject-content">
			<div class="title">
				<h3>
					<a href="">Layanan Sinergi 3 in 1 Gratis Bagi Keluarga Miskin Pemegang Kartu Menuju Sejahtera (KMS)</a>
				</h3>
			</div>
			30 Jun 2018
		</div>
	</div>

	<div class="col-md-4">
		<div class="widget-subject">
			
		</div>

		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'pager' => [
		        'firstPageLabel' => 'first',
		        'lastPageLabel' => 'last',
		        //'nextPageLabel' => 'next',
		        //'prevPageLabel' => 'previous',
		        'maxButtonCount' => 3,
		    ],
			'itemView' => 'listview-post'
		]) ?>

	</div>

	<div class="col-md-4">
		<div class="widget-subject">
			PROVINSI
		</div>

		<div class="widget-subject-content">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="title">
						<a href="">JAWA BARAT</a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-sm-2">
					<div class="title">	
						3
					</div>
				</div>
			</div>
		</div>

		<div class="widget-subject-content">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="title">
						<a href="">DKI JAKARTA</a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-sm-2">
					<div class="title">	
						1
					</div>
				</div>
			</div>
		</div>

		<div class="widget-subject">
			KOTA
		</div>

		<div class="widget-subject-content">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="title">
						<a href="">KOTA JAKARTA PUSAT</a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-sm-2">
					<div class="title">	
						1
					</div>
				</div>
			</div>
		</div>

		<div class="widget-subject-content">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="title">
						<a href="">KABUPATEN GARUT</a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-sm-2">
					<div class="title">	
						1
					</div>
				</div>
			</div>
		</div>

		<div class="widget-subject-content">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="title">
						<a href="">KOTA BANDUNG</a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-sm-2">
					<div class="title">	
						1
					</div>
				</div>
			</div>
		</div>

		<div class="widget-subject-content">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="title">
						<a href="">KOTA DEPOK</a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-sm-2">
					<div class="title">	
						1
					</div>
				</div>
			</div>
		</div>

		<div class="widget-subject">
			JENIS
		</div>

		<div class="widget-subject-content">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="title">
						<a href="">Metode</a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-sm-2">
					<div class="title">	
						1
					</div>
				</div>
			</div>
		</div>

		<div class="widget-subject">
			KELOMPOK
		</div>

		<div class="widget-subject-content">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="title">
						<a href="">Provinsi / Kabupaten / Kota</a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-sm-2">
					<div class="title">	
						1
					</div>
				</div>
			</div>
		</div>
	</div>
</div>