<?php
use app\components\Helper;
use yii\helpers\Html;

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
				<?= Html::img("@web/images/banner_nav_left.jpg", ['class' => 'img-responsive']); ?>
				<?php //$model->getThumbnail(); ?>
			</div>

			<div class="content">
				<div class="post-content">
					<?= $model->deskripsi ?>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<?= Html::img("@web/images/banner_nav_left.jpg", ['class' => 'img-responsive']); ?>
		</div>
	</div>
</div>

<div>&nbsp;</div>
