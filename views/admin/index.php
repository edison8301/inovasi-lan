<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\User;
use app\models\Inovasi;
use app\models\JenisInovasi;
use kartik\tabs\TabsX;

$this->title = "Halaman Dashboard";

?>


	<?= $this->render('grafik-inovasi-jenis') ?>

	<?= $this->render('grafik-inovasi-kelompok') ?>

	<?= $this->render('grafik-inovasi-tahun') ?>

<?php /*
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">
			Statistik Inovasi
		</h3>
	</div>

	<div class="box-body">

		<?php $items = [
			[
				'label' => 'Jenis',
		        'content' => $this->render('grafik-inovasi-jenis'),
		        'active' => true
			],
			[
				'label' => 'Kelompok',
		        'content' => $this->render('grafik-inovasi-kelompok')
			],
			[
				'label' => 'Tahun',
		        'content' => $this->render('grafik-inovasi-tahun')
			]
		] ?>

		<?= TabsX::widget([
		    'items' => $items,
		    'position' => TabsX::POS_ABOVE,
		    'encodeLabels' => false
		]); ?>

	</div>
</div>
*/ ?>