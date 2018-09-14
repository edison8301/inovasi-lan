<?php

use app\components\Helper;
use app\models\Inovasi;
use yii\data\ActiveDataProvider;
use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\widgets\ListView;

?>

<?php

$inovasi = Inovasi::find()->orderBy(['waktu_dibuat' => SORT_DESC])->limit(5)->all();

?>

<div class="widget-header" style="margin-top:0px !important">
	INOVASI TERBARU
</div>

<?php /*foreach ($inovasi as $inovasi) { ?>
    <div class="widget-content-list">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="box-list-thumbnail">
                    <?= $inovasi->getGambar(['class' => 'img-responsive']) ?>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="title">
                    <?= Html::a(StringHelper::truncate($inovasi->nama_inovasi, 25), ['site/inovasi-view','id' => $inovasi->id], ['option' => 'value']); ?>
                </div>

                <?= "Diterbitkan ".Helper::getTanggalSingkat($inovasi->waktu_dibuat) ?>
                <?=  "Oleh ".@$inovasi->user->username?>
            </div>
        </div>
    </div>
<?php }*/ ?>

<?php foreach ($inovasi as $inovasi) { ?>
    <div class="widget-content-list">
        <div class="row">
            <div class="col-sm-4 col-xs-12 text-center">
                <div class="box-list-thumbnail">
                    <?= $inovasi->getGambar(['style' => 'width: 80px; height: 60px']) ?>
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                <div class="title">
                    <?= Html::a(StringHelper::truncate($inovasi->nama_inovasi, 25), ['site/inovasi-view','id' => $inovasi->id], ['class' => 'anchor-black']) ?>
                </div>

                <div class="date-post">
                    <?= "Diterbitkan " .Helper::getTanggalSingkat($inovasi->waktu_dibuat).' Oleh '. @$inovasi->user->username ?>
                </div>
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