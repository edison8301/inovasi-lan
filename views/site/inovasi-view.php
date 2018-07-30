<?php
use app\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Detail Inovasi'];
$this->params['breadcrumbs'][] = $model->nama_inovasi;
?>

<div class="content">
	<div class="title-post-detail">
		<h2 class="title">
			<?= $model->nama_inovasi ?>
		</h2>
	</div>

	<div class="create-time-post-detail">
		<?= Helper::getTanggalSingkat($model->waktu_dibuat) ?>
	</div>

	<div class="icon-sosial-media">
		
	</div>

	<div class="row">
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="thumbnail-post-detail">
				<?= $model->getGambar(['class' => 'img-responsive text-center']) ?>
			</div>

			<div class="content">
				<div class="post-content">
					<h3 class="title">
						Deskripsi
					</h3>

					<?= $model->deskripsi ?>

					<h3 class="title">
						Detil Inovasi
					</h3>

					<?= DetailView::widget([
				        'model' => $model,
				        'template' => '<tr><td width="200px" style="text-align:left">{label}</td><td>{value}</td></tr>',
				        'attributes' => [
				            [
				                'attribute' => 'produk_inovasi',
				                'format' => 'raw',
				                'value' => $model->produk_inovasi,
				            ],
				            [
				                'attribute' => 'jenis_inovasi_id',
				                'format' => 'raw',
				                'value' => $model->jenisInovasi->nama,
				            ],
				            [
				                'attribute' => 'kelompok_inovator_id',
				                'format' => 'raw',
				                'value' => $model->kelompokInovator->nama,
				            ],
				            [
				                'attribute' => 'nama_instansi',
				                'format' => 'raw',
				                'value' => $model->nama_instansi,
				            ],
				            [
				                'attribute' => 'unit_instansi',
				                'format' => 'raw',
				                'value' => $model->unit_instansi,
				            ],
				            [
				                'attribute' => 'penggagas',
				                'format' => 'raw',
				                'value' => $model->penggagas,
				            ],
				            [
				                'attribute' => 'kontak',
				                'format' => 'raw',
				                'value' => $model->kontak,
				            ],
				            [
				                'attribute' => 'sumber',
				                'format' => 'raw',
				                'value' => $model->sumber,
				            ],
				            [
				                'attribute' => 'teknik_validasi_id',
				                'format' => 'raw',
				                'value' => $model->teknikValidasi->nama,
				            ],
				            [
				                'attribute' => 'tahun_inisiasi',
				                'format' => 'raw',
				                'value' => $model->tahun_inisiasi,
				            ],
				            [
				                'attribute' => 'tahun_implementasi',
				                'format' => 'raw',
				                'value' => $model->tahun_implementasi,
				            ],
				        ],
				    ]) ?>
					
					<hr>

					<?= $this->render('tabs-inovasi',[
						'model' => $model
					]) ?>
					
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<?= $this->render('block-inovasi-terbaru'); ?>
		</div>
	</div>
</div>

<div>&nbsp;</div>
