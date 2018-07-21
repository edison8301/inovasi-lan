<?php 

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use app\models\PenelitianJenis;
use app\models\User;

?>

<?php NavBar::begin([
	'brandLabel' => 'LEMBAGA ADMINISTRASI NEGARA REPUBLIK INDONESIA',
	'brandUrl' => ['site/index'],
	'options' => ['class' => 'navbar navbar-inverse'],
]); ?>


<?= Nav::widget([
    'items' => [
        ['label' => 'Tentang Kami','url'=>['site/index']],
        ['label' => 'Berita','url'=>['site/index']],
        ['label' => 'Artikel','url'=>['site/index']],
        ['label' => 'Kontak Kami','url'=>['site/index']],
        //['label' => 'Logout','url' => ['site/logout'], 'options' => ['data-method' => 'post'], 'visible' => !Yii::$app->user->isGuest],
        //['label' => 'Login','url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
    ],
    'options' => ['class' => 'navbar-nav pull-left'],
]); ?>


<?php NavBar::end(); ?>