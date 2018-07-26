<?php 
use yii\widgets\ListView;
use yii\helpers\Html;
use app\components\Helper;

$this->params['breadcrumbs'][] = ['label' => 'Berita'];
?>

<div class="row">
	<div class="col-md-8 col-sm-8 col-xs-12">
		<div class="widget-subject">
			DAFTRA BERITA
		</div>

		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'pager' => [
		        'firstPageLabel' => 'first',
		        'lastPageLabel' => 'last',
		        //'nextPageLabel' => 'next',
		        //'prevPageLabel' => 'previous',
		        'maxButtonCount' => 3,
		    ],
			'itemView' => 'listview-berita'
		]) ?>
		
	</div>

	<div class="col-md-4 col-sm-4 col-xs-12">

	</div>
</div>