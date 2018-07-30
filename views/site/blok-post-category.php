<?php 
use app\models\PostCategory;
use yii\helpers\Html;
use app\models\Post;
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="widget-header">
				<i class="fa fa-newspaper-o"></i> BERITA
				<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-black']); ?>
			</div>

					<?php $no = 1; ?>
					<?php foreach (Post::findPostLimit(PostCategory::BERITA,5) as $postBerita) { ?>
						<?php if ($no == 1) { ?>
							<?= $postBerita->getMainPost() ?>
						<?php } else { ?> 
							<?= $postBerita->getSubPost() ?>
						<?php } ?>
					<?php $no++; } ?>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="widget-header">
				<i class="fa fa-newspaper-o"></i> ARTIKEL
				<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-black']); ?>
			</div>

			<?php $no = 1; ?>
			<?php foreach (Post::findPostLimit(PostCategory::ARTIKEL,5) as $postBerita) { ?>
				<?php if ($no == 1) { ?>
					<?= $postBerita->getMainPost() ?>
				<?php } else { ?> 
					<?= $postBerita->getSubPost() ?>
				<?php } ?>
			<?php $no++; } ?>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="widget-header">
				<i class="fa fa-newspaper-o"></i> POLICY BRIEF
				<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-black']); ?>
			</div>

			<?php $no = 1; ?>
			<?php foreach (Post::findPostLimit(PostCategory::POLICE_BRIEF,5) as $postBerita) { ?>
				<?php if ($no == 1) { ?>
					<?= $postBerita->getMainPost() ?>
				<?php } else { ?> 
					<?= $postBerita->getSubPost() ?>
				<?php } ?>
			<?php $no++; } ?>
		</div>
	</div>

	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>

	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="widget-header">
				<i class="fa fa-newspaper-o"></i> HASIL KAJIAN
				<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-black']); ?>
			</div>

					<?php $no = 1; ?>
					<?php foreach (Post::findPostLimit(PostCategory::HASIL_KAJIAN,5) as $postBerita) { ?>
						<?php if ($no == 1) { ?>
							<?= $postBerita->getMainPost() ?>
						<?php } else { ?> 
							<?= $postBerita->getSubPost() ?>
						<?php } ?>
					<?php $no++; } ?>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="widget-header">
				<i class="fa fa-newspaper-o"></i> TOKOH INOVASI
				<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-black']); ?>
			</div>

			<?php $no = 1; ?>
			<?php foreach (Post::findPostLimit(PostCategory::TOKOH_INOVASI,5) as $postBerita) { ?>
				<?php if ($no == 1) { ?>
					<?= $postBerita->getMainPost() ?>
				<?php } else { ?> 
					<?= $postBerita->getSubPost() ?>
				<?php } ?>
			<?php $no++; } ?>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="widget-header">
				<i class="fa fa-newspaper-o"></i> Laboratorium Inovasi
				<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-black']); ?>
			</div>

			<?php $no = 1; ?>
			<?php foreach (Post::findPostLimit(PostCategory::LABORATORIUM_INOVASI,5) as $postBerita) { ?>
				<?php if ($no == 1) { ?>
					<?= $postBerita->getMainPost() ?>
				<?php } else { ?> 
					<?= $postBerita->getSubPost() ?>
				<?php } ?>
			<?php $no++; } ?>
		</div>
	</div>
</div>