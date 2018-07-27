<?php

use app\models\InovasiSearch;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

?>

<?php

$postSearch = new InovasiSearch();
$query = $postSearch->getQuerySearch();
$query->limit(5);


$dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 5
    ],
]);

?>

<div class="widget-header" style="margin-top:0px !important">
	INOVASI TERBARU
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
	'itemView' => 'listview-inovasi-terbaru'
]) ?>