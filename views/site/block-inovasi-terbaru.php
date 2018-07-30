<?php

use app\models\Inovasi;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use app\components\Helper;
use yii\widgets\ListView;

?>

<?php

$inovasi = Inovasi::find()->orderBy(['waktu_dibuat' => SORT_DESC])->limit(5)->all();

?>

<div class="widget-header" style="margin-top:0px !important">
	INOVASI TERBARU
</div>

<?php foreach ($inovasi as $inovasi) { ?>
    <div class="widget-content-list">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <?= $inovasi->getGambar(['class' => 'img-responsive']) ?>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="title">
                    <?= Html::a($inovasi->nama_inovasi, ['site/inovasi-view','id' => $inovasi->id], ['option' => 'value']); ?>
                </div>

                <?= Helper::getTanggalSingkat($inovasi->waktu_dibuat) ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php /*ListView::widget([
	'dataProvider' => $dataProvider,
	'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        //'nextPageLabel' => 'next',
        //'prevPageLabel' => 'previous',
        'maxButtonCount' => 3,
    ],
	'itemView' => 'listview-inovasi-terbaru'
])*/ ?>