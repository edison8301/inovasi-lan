<?php 
use yii\helpers\Html;
use app\components\Helper;
?>

<div class="widget-content-list">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="box-list-berita-thumbnail">
				<?= $model->getThumbnail(['class'=> 'img-responsive']) ?>
			</div>
		</div>

		<div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: -20px;">
			<div class="title">
				<h3>
					<?= Html::a($model->getTitle(), ['site/post-view','id' => $model->id], ['option' => 'value']); ?>
				</h3>

			</div>

				<?=  Html::tag('p',Html::decode(substr($model->content, 200, 250))) ?>

				<div>&nbsp;</div>

				<?= Helper::getTanggal($model->created_time) ?>
		</div>
	</div>
</div>

