<?php 
use yii\helpers\Html;
use app\models\KabKota;
use kv4nt\owlcarousel\OwlCarouselWidget;
?>

<div class="box-post">
	<div class="container">
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
		        'itemsDesktop'      => [1199, 3],
		        'itemsDesktopSmall' => [979, 3]
		    ]
		]); ?>

		<div class="item-class" style="margin: 3%">
			<img src="../web/images/avatar.jpeg" class="img-responsive" alt="Image 1">
		</div>
		<div class="item-class" style="margin: 3%">
			<img src="../web/images/avatar.jpeg" class="img-responsive" alt="Image 2">
		</div>
		<div class="item-class" style="margin: 3%">
			<img src="../web/images/avatar.jpeg" class="img-responsive" alt="Image 3">
		</div>
		<div class="item-class" style="margin: 3%">
			<img src="../web/images/avatar.jpeg" class="img-responsive" alt="Image 4">
		</div>

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
						<span class="pull-right">Lihat Semua</span>
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
									<?= Html::a("Lorem Ipsum", $url = null, ['option' => 'value']); ?>
								</div>
							</div>
							<div class="box-small-vid">
								<div class="box-small-vid-container">
									<div class="box-small-thumb">
										<?= Html::img("@web/images/test.png", ['option' => 'value']); ?>
									</div>
									<?= Html::a("Lorem Ipsum", $url = null, ['option' => 'value']); ?>
								</div>
							</div>
							<div class="box-small-vid">
								<div class="box-small-vid-container">
									<div class="box-small-thumb">
										<?= Html::img("@web/images/test.png", ['option' => 'value']); ?>
									</div>
									<?= Html::a("Lorem Ipsum", $url = null, ['option' => 'value']); ?>
								</div>
							</div>
							<div class="box-small-vid">
								<div class="box-small-vid-container">
									<div class="box-small-thumb">
										<?= Html::img("@web/images/test.png", ['option' => 'value']); ?>
									</div>
									<?= Html::a("Lorem Ipsum", $url = null, ['option' => 'value']); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="widget-header">
						E-LEARNING
					</div>
				</div>

				<div class="col-md-6">
					<div class="widget-header">
						ULASAN
					</div>
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
					<?php foreach (KabKota::findInovasiTerbesar() as $KabKota) { ?>
						<tr class="tr-berita-inovasi">
							<td class="td-berita-inovasi"><?= $no.'. '.$KabKota->nama ?></td>
							<td width="20px"><?= $KabKota->getCountInovasi() ?></td>
						</tr>
					<?php $no++; } ?> 
				</table>
			</div>
		</div>
	</div>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>