<?php 
use kartik\tabs\TabsX;
use yii\helpers\Url;
?>

<div>&nbsp;</div>

<?php $items = [
    [
        'label' => 'Pendorong',
        'content' => "Faktor-faktor yang menjadi pendorong keberhasilan program ini, antara lain: <br><br> $model->faktor_pendorong",
        'active' => true
    ],
    [
        'label' => 'Pengahambat',
        'content' => "Faktor penghambat dari pelaksanaan program ini adalah: <br><br> $model->faktor_penghambat",
    ],
    [
        'label' => 'Tahapan Proses',
        'content' => "Tahapan yang dilakukan untuk melaksanakan program tersebut adalah: <br><br> $model->tahapan_proses",
    ],
    [
        'label' => 'Manfaat',
        'content' => "Manfaat yang telah dicapai dalam program ini adalah: <br><br> $model->manfaat",
    ],
    [
        'label' => 'Prasyarat Replikasi',
        'content' => "Prasyarat yang diperlukan jika program ini akan direplikasi antara lain: <br><br>$model->prasyarat_replikasi",
    ],
]; ?>

<?= TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false
]); ?>