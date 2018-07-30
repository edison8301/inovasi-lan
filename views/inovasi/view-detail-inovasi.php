<?php 
use app\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

	<?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'faktor_pendorong',
                'format' => 'raw',
                'value' => $model->faktor_pendorong,
            ],
            [
                'attribute' => 'faktor_penghambat',
                'format' => 'raw',
                'value' => $model->faktor_penghambat,
            ],
            [
                'attribute' => 'tahapan_proses',
                'format' => 'raw',
                'value' => $model->tahapan_proses,
            ],
            [
                'attribute' => 'manfaat',
                'format' => 'raw',
                'value' => $model->manfaat,
            ],
            [
                'attribute' => 'prasyarat_replikasi',
                'format' => 'raw',
                'value' => $model->prasyarat_replikasi,
            ],
            [
                'attribute' => 'waktu_dibuat',
                'format' => 'raw',
                'value' => Helper::getWaktuWIB($model->waktu_dibuat),
            ],
            [
                'attribute' => 'waktu_diterbitkan',
                'format' => 'raw',
                'value' => Helper::getWaktuWIB($model->waktu_diterbitkan),
            ],
            [
                'attribute' => 'waktu_diubah',
                'format' => 'raw',
                'value' => Helper::getWaktuWIB($model->waktu_diubah),
            ],
            [
                'attribute' => 'jumlah_dilihat',
                'format' => 'raw',
                'value' => $model->jumlah_dilihat,
            ],
            [
                'attribute' => 'jumlah_diunduh',
                'format' => 'raw',
                'value' => $model->jumlah_diunduh,
            ],
            [
                'attribute' => 'output',
                'format' => 'raw',
                'value' => $model->output,
            ],
            [
                'attribute' => 'outcome',
                'format' => 'raw',
                'value' => $model->outcome,
            ],
            [
                'attribute' => 'status_inovasi_id',
                'format' => 'raw',
                'value' => @$model->statusInovasi->nama,
            ],
        ],
    ]) ?>