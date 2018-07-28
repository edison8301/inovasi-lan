<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Tabs;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use app\models\Kategori;
use app\models\JenisInovasi;
use app\models\KelompokInovator;
use app\models\StatusInovasi;
use app\models\TeknikValidasi;
use app\models\KategoriValidasi;

/* @var $this yii\web\View */
/* @var $model app\models\Inovasi */
/* @var $form yii\widgets\ActiveForm */
?>


<div>&nbsp;</div>

<?php foreach(KategoriValidasi::find()->all() as $kategoriValidasi) { ?>

<div class="form-group">
    <div col-sm-2>   
        <?php print Html::label($kategoriValidasi->nama,'',array('class'=>'col-sm-2 control-label','style'=>'text-align:right')); ?>
    </div>
    <div class="col-sm-9 form-g">

        <?php foreach($kategoriValidasi->manyValidasi as $validasi) { ?>

        <?php print Html::checkBox('validasi['.$validasi->id.']','',array('style'=>'margin-bottom:5px;margin-right:5px;')); ?><?php print $validasi->nama; ?><br>

        <?php } ?>

    </div>
</div>

<div>&nbsp;</div>


<?php } ?>

<?= $form->field($model, 'status_inovasi_id')->widget(Select2::className(), [
    'data' => StatusInovasi::getList(),
    'pluginOptions' => ['allowClear' => true],
    'options' => [
        'placeholder' => '- Status Inovasi -',
    ]
]) ?>
                                            

