<?php 

use app\components\Helper;
use yii\helpers\Html;

?>

<div class="widget-subject-content">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<?= Html::img("@web/images/banner_nav_left.jpg", ['class' => 'img-responsive']); ?>
		</div>

		<div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: -20px;">
			<div class="title">
				<h3>
					<?= Html::a($model->nama_inovasi, ['view-inovasi','id' => $model->id], ['option' => 'value']); ?>
				</h3>

			</div>

				<?= Html::decode(substr($model->deskripsi, 0, 150)).' ......' ?>

				<div>&nbsp;</div>

				<?= Helper::getTanggal($model->waktu_dibuat) ?>
		</div>
	</div>
</div>