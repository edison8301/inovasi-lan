<?php

use app\models\PostSearch;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

?>

<?php

$postSearch = new PostSearch();
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
	'itemView' => 'listview-post'
]) ?>