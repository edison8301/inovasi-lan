<?php 
use yii\helpers\Html;
use app\models\Kabkota;
use app\models\Post;
use kv4nt\owlcarousel\OwlCarouselWidget;
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

		<?php foreach (Post::findPostLimit(3,15) as $postSlide) { ?>
			<div class="item-class" style="margin: 3%">
				<?= Html::a($postSlide->getThumbnail(['class' => 'img-responsive','style' => 'width:200px']), ['site/post-view','id' => $postSlide->id], ['option' => 'value']); ?>
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
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="box">
				<div class="box-header box-video">
					<h2 class="box-title-video">
						<i class="fa fa-play-circle-o"></i> VIDEO
					</h2>
						<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-white']); ?>
				</div>

				<div class="box-body" style="background: black">
					<div class="row">
						<div class="col-md-8">
							<div class="box-main-vid">
								<?= Html::img("@web/images/ikan.jpg", ['option' => 'value']); ?>

								<h3 class="box-main-video-title">
									<?= Html::a("Lorem Ipsum Dolor", $url = null, ['option' => 'value']); ?>
								</h3>
							</div>
						</div>

						<div class="col-md-4">
							<div class="box-small-vid">
								<div class="box-small-vid-container">
									<div class="box-small-thumb">
										<?= Html::img("@web/images/test.png", ['option' => 'value']); ?>
									</div>
									<?= Html::a("Lorem Ipsum", $url = null, ['class' => 'anchor-white']); ?>
								</div>
							</div>
							<div class="box-small-vid">
								<div class="box-small-vid-container">
									<div class="box-small-thumb">
										<?= Html::img("@web/images/test.png", ['option' => 'value']); ?>
									</div>
									<?= Html::a("Lorem Ipsum", $url = null, ['class' => 'anchor-white']); ?>
								</div>
							</div>
							<div class="box-small-vid">
								<div class="box-small-vid-container">
									<div class="box-small-thumb">
										<?= Html::img("@web/images/test.png", ['option' => 'value']); ?>
									</div>
									<?= Html::a("Lorem Ipsum", $url = null, ['class' => 'anchor-white']); ?>
								</div>
							</div>
							<div class="box-small-vid">
								<div class="box-small-vid-container">
									<div class="box-small-thumb">
										<?= Html::img("@web/images/test.png", ['option' => 'value']); ?>
									</div>
									<?= Html::a("Lorem Ipsum", $url = null, ['class' => 'anchor-white']); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="widget-header">
						<i class="fa fa-newspaper-o"></i> BERITA
						<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-black']); ?>
					</div>

					<?php $no = 1; ?>
					<?php foreach (Post::findPostLimit(1,5) as $postBerita) { ?>
						<?php if ($no == 1) { ?>
							<?= $postBerita->getMainPost() ?>
						<?php } else { ?> 
							<?= $postBerita->getSubPost() ?>
						<?php } ?>
					<?php $no++; } ?>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="widget-header">
						<i class="fa fa-newspaper-o"></i> ARTIKEL
						<?= Html::a("Lihat Semua", $url = null, ['class' => 'pull-right anchor-black']); ?>
					</div>

					<?php $no = 1; ?>
					<?php foreach (Post::findPostLimit(2,5) as $postBerita) { ?>
						<?php if ($no == 1) { ?>
							<?= $postBerita->getMainPost() ?>
						<?php } else { ?> 
							<?= $postBerita->getSubPost() ?>
						<?php } ?>
					<?php $no++; } ?>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="widget-header">
				BERITA INOVASI
			</div>

			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<?php $no = 1; ?>
					<?php foreach (Kabkota::findInovasiTerbesar() as $kabKota) { ?>
						<tr class="tr-berita-inovasi">
							<td class="td-berita-inovasi"><?= $no.'. '.Html::a($kabKota->nama, ['site/inovasi-index','kabkota_id' => $kabKota->id],['class' => 'anchor-black']) ?></td>
							<td width="20px"><?= $kabKota->getCountInovasi() ?></td>
						</tr>
					<?php $no++; } ?> 
				</table>
			</div>
		</div>
	</div>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>