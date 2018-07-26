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
        ['label' => 'Berita','url'=>['site/index']],
        ['label' => 'Artikel','url'=>['site/index']],
        ['label' => 'Kontak Kami','url'=>['site/contact']],
        ['label' => 'Logout','url' => ['site/logout'], 'options' => ['data-method' => 'post'], 'visible' => !Yii::$app->user->isGuest],
        ['label' => 'Login','url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
    ],
    'options' => ['class' => 'navbar-nav pull-left'],
]); ?>


<?php NavBar::end(); ?>