<?php
use yii\helpers\Html;
?>

<div class="widget-subject-content">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<?= Html::img("@web/images/logo.png", ['style' => 'width:80px;']); ?>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
			<div class="title">
				<?= Html::a($model->getTitleListView(), ['site/post-detail','id' => $model->id], ['option' => 'value']); ?>
			</div>

			30 Jun 2018
		</div>
	</div>
</div>