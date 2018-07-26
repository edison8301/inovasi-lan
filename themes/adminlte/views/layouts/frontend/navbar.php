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
<<<<<<< HEAD
        ['label' => 'Publikasi','url'=>['site/index']],
        ['label' => 'Kontak Kami','url'=>['site/index']],
        //['label' => 'Logout','url' => ['site/logout'], 'options' => ['data-method' => 'post'], 'visible' => !Yii::$app->user->isGuest],
        //['label' => 'Login','url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
=======
        ['label' => 'Kontak Kami','url'=>['site/contact']],
        ['label' => 'Logout','url' => ['site/logout'], 'options' => ['data-method' => 'post'], 'visible' => !Yii::$app->user->isGuest],
        ['label' => 'Login','url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
>>>>>>> 20b890f8b1a632939675dd2179d502a62ce2c02e
    ],
    'options' => ['class' => 'navbar-nav pull-left'],
]); ?>


<?php NavBar::end(); ?>