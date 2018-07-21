<?php
use yii\helpers\Html;
use yii\helpers\Url;
use dmstr\widgets\Alert;
use app\models\PenelitianJenis;
use app\models\User;

/* @var $this \yii\web\View */
/* @var $content string */

    
app\assets\FrontendAsset::register($this);

dmstr\web\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="layout-top-nav" id="conten-body" height="100%">

	<?= $this->render('navbar') ?>

	<?php Alert::widget() ?>

    <?php $this->beginBody() ?>

    <?= $content ?>

    <?php $this->endBody() ?>

    <?= $this->render('footer') ?>
    
</body>

</html>

<?php $this->endPage() ?>
