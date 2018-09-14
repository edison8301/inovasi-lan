<?php 

use app\components\Helper;
use yii\helpers\Html;
use yii\helpers\StringHelper;

?>

<div class="widget-content-list">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="box-list-berita-thumbnail">
				<?= $model->getGambar(['class'=> 'img-responsive']) ?>
			</div>
		</div>

		<div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: -20px;">
			<div class="title">
				<h3>
					<?= Html::a($model->nama_inovasi, ['site/inovasi-view','id' => $model->id], ['option' => 'value']); ?>
				</h3>

			</div>

				<?=  Html::tag('p',Html::encode(StringHelper::truncate($model->deskripsi, 150))) ?>

				<div>&nbsp;</div>

				<?= 'Diterbitkan <span class="text-merah">'.Helper::getTanggalSingkat($model->waktu_dibuat).'</span> Oleh <span class="text-merah">'.@$model->user->username.'</span>' ?>
		</div>
	</div>
</div>