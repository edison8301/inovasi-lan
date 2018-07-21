<?php
use yii\helpers\Html;
use yii\helpers\Url;
use dmstr\widgets\Alert;
use app\models\PenelitianJenis;
use app\models\User;

?>

<?php $this->beginContent('@app/themes/adminlte/views/layouts/frontend/main.php'); ?>

<div id="map-inovation">
	<?= Html::img("@web/images/peta.png", ['class' => 'img-responsive','style' => 'width:100%']); ?>
</div>

<div class="container" style="margin-top: 3%">
	<?= $content ?>
</div>

<?php $this->endContent(); ?>

