<?php
use app\components\Helper;
use yii\helpers\StringHelper;
use yii\helpers\Html;
?>

<div class="widget-content-list">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<div class="box-list-thumbnail">
				<?= $model->getGambar(['class' => 'img-responsive']) ?>
			</div>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
			<div class="title">
				<?= Html::a(StringHelper::truncate($model->nama_inovasi, 30), ['site/inovasi-view','id' => $model->id], ['option' => 'value']); ?>
			</div>

			<?= 'Diterbitkan '.Helper::getTanggalSingkat($model->waktu_dibuat).' Oleh '.@$model->user->username ?>
		</div>
	</div>
</div>