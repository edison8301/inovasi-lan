<?php

use yii\widgets\ListView;
use yii\helpers\Html;

?>

<div class="container">
	<div class="row">
		<div class="col-md-7 col-sm-7 col-xs-12">
			<div class="widget-subject">
				DAFTRA INOVASI
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
				'itemView' => 'listview-inovasi'
			]) ?>
		</div>

		<div class="col-md-5 col-sm-5 col-xs-12">
		</div>
	</div>
</div>