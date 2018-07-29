<?php
use yii\helpers\Html;
use app\components\Helper;
?>

<div class="widget-content-list">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<?= $model->getGambar(['class' => 'img-responsive']) ?>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
			<div class="title">
				<?= Html::a($model->nama_inovasi, ['site/inovasi-view','id' => $model->id], ['option' => 'value']); ?>
			</div>

			<?= Helper::getTanggalSingkat($model->waktu_dibuat) ?>
		</div>
	</div>
</div>