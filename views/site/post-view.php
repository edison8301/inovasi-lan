<?php
use app\components\Helper;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => $model->postCategory->title];
$this->params['breadcrumbs'][] = $model->getTitle();
?>

<div class="content">
	<div class="title-post-detail">
		<h2 class="title">
			<?= $model->getTitle() ?>
		</h2>
	</div>

	<div class="create-time-post-detail">
		<?= 'Diterbitkan <span class="text-merah">'.Helper::getTanggalSingkat($model->created_time).'</span> Oleh <span class="text-merah">'.@$model->user->username.'</span>' ?>
	</div>

	<div class="icon-sosial-media">
		
	</div>

	<div class="row">
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="thumbnail-post-detail">
				<?= $model->getThumbnail(['class' => 'img-responsive']); ?>
			</div>

			<div class="content">
				<div class="post-content">
					<?= $model->content ?>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-4">
			<?= $this->render('block-inovasi-terbaru'); ?>
		</div>
	</div>
</div>

<div>&nbsp;</div>
