<?php

use app\models\PenelitianJenis;
use app\models\Penelitian;
use app\models\PenelitianUnduh;
use app\models\Unit;
use app\models\Anggota;
use app\models\Pegawai;
use app\models\UserRole;
use app\models\PenelitianStatus;
use app\models\User;

?>

<?= dmstr\widgets\Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    'items' => [
        ['label' => 'Halaman Depan', 'icon' => 'circle-o', 'url' => ['site/index']],
        ['label' => 'MENU NAVIGASI', 'options' => ['class' => 'header']],
        ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['admin/index']],

        ['label' => 'Post', 'icon' => 'circle-o', 'url' => ['post/index']],
        ['label' => 'Inovasi', 'icon' => 'circle-o', 'url' => ['inovasi/index']],

        ['label' => 'MENU SISTEM', 'options' => ['class' => 'header']],
        ['label' => 'Inovasi Validasi', 'icon' => 'circle-o', 'url' => ['inovasi-validasi/index']],
        ['label' => 'Jenis Inovasi', 'icon' => 'circle-o', 'url' => ['jenis-inovasi/index']],

        ['label' => 'Post Kategori', 'icon' => 'circle-o', 'url' => ['post-category/index']],
        ['label' => 'Post Kategori Map', 'icon' => 'circle-o', 'url' => ['post-category-map/index']],        
        ['label' => 'User', 'icon' => 'users', 'items' => [
            [
                'label' => 'Admin',
                'icon' => 'circle-o', 
                'url' => ['user/index'],
            ],
        ]],

        ['label' => 'Logout', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
    ],
]) ?>