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
			<?= Html::a("Lihat Semua", ['site/post-index','post_category_id' => PostCategory::E_BOOK], ['class' => 'pull-right anchor-white']); ?>
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
				<div class="box-carousel-thumbnail">
					<?= Html::a($postSlide->getThumbnail(['class' => 'img-responsive','style' => 'width:120px']), ['site/post-view','id' => $postSlide->id], ['option' => 'value']); ?>
				</div>
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

<?= $this->render('blok-post-category') ?>