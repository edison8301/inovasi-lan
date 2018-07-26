<?php 

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use app\models\PenelitianJenis;
use app\models\User;

?>

<?php NavBar::begin([
	'brandLabel' => '<img src="images/header-navbar-logo.png" class="img-brand-navbar img-responsive"/>',
	'brandUrl' => ['site/index'],
	'options' => ['class' => 'navbar navbar-inverse'],
]); ?>


<?= Nav::widget([
    'items' => [
        ['label' => 'Tentang Kami','url'=>['site/about']],
        ['label' => 'Berita','url'=>['site/berita']],
        ['label' => 'Artikel','url'=>['site/artikel']],
        ['label' => 'Publikasi','url'=>['site/index']],
        ['label' => 'Kontak Kami','url'=>['site/contact']],
        ['label' => 'Admin','url' => ['admin/index'], 'options' => ['data-method' => 'post'], 'visible' => !Yii::$app->user->isGuest],
        ['label' => 'Logout','url' => ['site/logout'], 'options' => ['data-method' => 'post'], 'visible' => !Yii::$app->user->isGuest],
    ],
    'options' => ['class' => 'navbar-nav pull-left'],
]); ?>


<?php NavBar::end(); ?>