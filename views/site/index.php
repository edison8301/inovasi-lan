<?php
use app\components\Helper;
use app\models\JenisInovasi;
use app\models\Kabkota;
use app\models\KelompokInovator;
use app\models\Provinsi;
use yii\helpers\Html;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\KuesionerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistem Informasi Kajian (Siska) LAN';

?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="widget-header">
				INOVASI TERBARU
			</div>

			<div class="box-main-thumbnail">
				<?= $inovasiTerbaru->getGambar(['style' => 'width:100%']) ?>
			</div>
			
			<div class="widget-content-list">
				<div class="title">
					<h3>
						<?= Html::a($inovasiTerbaru->nama_inovasi, ['site/inovasi-view','id' => $inovasiTerbaru->id], ['class' => 'anchor-black']); ?>
					</h3>
				</div>
				<?= "Diterbitkan ".Helper::getTanggalSingkat($inovasiTerbaru->waktu_dibuat) ?>
				<?=  "Oleh ".@$inovasiTerbaru->user->username?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="widget-header">
				&nbsp;
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
				'itemView' => 'listview-inovasi-terbaru'
			]) ?>

		</div>

		<div class="col-md-4">
			<div class="widget">
				<div class="widget-header">
					PROVINSI
				</div>

				<?php foreach (Provinsi::findProvinsi() as $provinsi) { ?>
					<div class="widget-content-list">
						<div class="row">
							<div class="col-md-10 col-sm-10 col-xs-10">
								<div class="title">
									<?= Html::a($provinsi->nama, ['site/inovasi-index','provinsi_id' => $provinsi->id], ['option' => 'value']); ?>
								</div>
							</div>

							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="title">	
									<?= $provinsi->getCountInovasi() ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="widget">
				<div class="widget-header">
					KOTA
				</div>

				<?php foreach (Kabkota::findKabkota() as $kabkota) { ?>
					<div class="widget-content-list">
						<div class="row">
							<div class="col-md-10 col-sm-10 col-xs-10">
								<div class="title">
									<?= Html::a($kabkota->nama, ['site/inovasi-index','kabkota_id' => $kabkota->id], ['option' => 'value']); ?>
								</div>
							</div>

							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="title">	
									<?= $kabkota->getCountInovasi() ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="widget">
				<div class="widget-header">
					JENIS
				</div>

				<?php foreach (JenisInovasi::findJenisInovasi() as $jenisInovasi) { ?>
					<div class="widget-content-list">
						<div class="row">
							<div class="col-md-10 col-sm-10 col-xs-10">
								<div class="title">
									<?= Html::a($jenisInovasi->nama, ['site/inovasi-index','jenis_inovasi_id' => $jenisInovasi->id], ['option' => 'value']); ?>
								</div>
							</div>

							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="title">	
									<?= $jenisInovasi->getCountInovasi() ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="widget">
				<div class="widget-header">
					KELOMPOK
				</div>

				<?php foreach (KelompokInovator::findKelompokInovator() as $inovator) { ?>
					<div class="widget-content-list">
						<div class="row">
							<div class="col-md-10 col-sm-10 col-xs-10">
								<div class="title">
									<?= Html::a($inovator->nama, ['site/inovasi-index','kelompok_inovator_id' => $inovator->id], ['option' => 'value']); ?>
								</div>
							</div>

							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="title">	
									<?= $inovator->getCountInovasi() ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?= $this->render('blok-post') ?>

<div>&nbsp;</div>