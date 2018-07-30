<?php 
use yii\helpers\Html;
use app\models\Kabkota;
use app\models\Post;
use kv4nt\owlcarousel\OwlCarouselWidget;
use app\models\PostCategory;
?>

<div>&nbsp;</div>

<div class="box-post">
	<div class="container">
		<div class="widget-header-white">
			<i class="fa fa-th"></i> KOLOM
			<?= Html::a("Lihat Semua", ['site/post-index'], ['class' => 'pull-right anchor-white']); ?>
		</div>

		<?php OwlCarouselWidget::begin([
		    'container' => 'div',
		    'containerOptions' => [
		        'id' => 'container-id',
		        'class' => 'container-class'
		    ],
		    'pluginOptions'    => [
		        'autoplay'          => true,
		        'autoplayTimeout'   => 3000,
		        'items'             => 5,
		        'loop'              => true,
		        'nav'				=> false,
		        'responsive'		=> [
		        	0 => [
		        		'items' 	=> 2,
		        		'nav'		=> false
		        	],
		        	600 => [
		        		'items' 	=> 3,
		        		'nav'		=> false
		        	],
		        	1000 => [
		        		'items' 	=> 5,
		        		'nav'		=> false,
		        		'loop'		=> false
		        	]
		        ]
		    ]
		]); ?>

		<?php foreach (Post::findPostLimit(PostCategory::E_BOOK,15) as $postSlide) { ?>
			<div class="item-class" style="margin: 3%">
				<?= Html::a($postSlide->getThumbnail(['class' => 'img-responsive','style' => 'width:120px']), ['site/post-view','id' => $postSlide->id], ['option' => 'value']); ?>
				<h4 class="carousel-title">
					<?= Html::a($postSlide->getTitleSlide()."....", ['site/post-view','id' => $postSlide->id], ['class' => 'anchor-white']); ?>
				</h4>
			</div>
		<?php } ?>


		<?php OwlCarouselWidget::end(); ?>

	</div>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>

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

	<!-- <div class="row">
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
	</div> -->
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>