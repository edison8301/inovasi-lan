<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

	<?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
        	[
                'attribute' => 'kelompok_inovator_id',
                'format' => 'raw',
                'value' => @$model->kelompokInovator->nama,
            ],
            [
                'attribute' => 'nama_instansi',
                'format' => 'raw',
                'value' => $model->nama_instansi,
            ],
            [
                'attribute' => 'unit_instansi',
                'format' => 'raw',
                'value' => $model->unit_instansi,
            ],
            [
                'attribute' => 'tahun_inisiasi',
                'format' => 'raw',
                'value' => $model->tahun_inisiasi,
            ],
            [
                'attribute' => 'tahun_implementasi',
                'format' => 'raw',
                'value' => $model->tahun_implementasi,
            ],
            [
                'attribute' => 'provinsi_id',
                'format' => 'raw',
                'value' => $model->provinsi_id,
            ],
            [
                'attribute' => 'kabkota_id',
                'format' => 'raw',
                'value' => $model->kabkota_id,
            ],
        ],
    ]) ?>