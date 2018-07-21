<?php

use app\models\PenelitianJenis;
use app\models\PenelitianStatus;
use app\models\Penelitian;
use app\models\User;

?>

<?= dmstr\widgets\Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    'items' => [
        ['label' => 'MENU NAVIGASI', 'options' => ['class' => 'header']],
        ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['admin/index']],
        ['label' => 'Kajian Internal Unit', 'icon' => 'pencil', 'items' => [
            [
                'label' => 'Kajian',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-susun-unit','id_penelitian_jenis' => PenelitianJenis::KAJIAN],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::KAJIAN,'status_susun'=>1,'id_unit'=>User::getIdUnit()]).'</small></span></a>'
            ],
            [
                'label' => 'Jurnal',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-susun-unit','id_penelitian_jenis' => PenelitianJenis::JURNAL],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::JURNAL,'status_susun'=>1,'id_unit'=>User::getIdUnit()]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Brief',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-susun-unit','id_penelitian_jenis' => PenelitianJenis::POLICY_BRIEF],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_BRIEF,'status_susun'=>1,'id_unit'=>User::getIdUnit()]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Note',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-susun-unit','id_penelitian_jenis' => PenelitianJenis::POLICY_NOTE],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_NOTE,'status_penyusunan'=>1,'id_unit'=>User::getIdUnit()]).'</small></span></a>'
            ],
        
        ]],
        ['label' => 'Kajian Semua Unit', 'icon' => 'pencil', 'items' => [
            [
                'label' => 'Kajian',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-susun','id_penelitian_jenis' => PenelitianJenis::KAJIAN],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::KAJIAN,'status_susun'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Jurnal',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-susun','id_penelitian_jenis' => PenelitianJenis::JURNAL],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::JURNAL,'status_susun'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Brief',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-susun','id_penelitian_jenis' => PenelitianJenis::POLICY_BRIEF],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_BRIEF,'status_susun'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Note',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-susun','id_penelitian_jenis' => PenelitianJenis::POLICY_NOTE],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_NOTE,'status_penyusunan'=>1]).'</small></span></a>'
            ],
        
        ]],
        ['label' => 'Hasil Kajian', 'icon' => 'file', 'items' => [
            [
                'label' => 'Kajian',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-hasil','id_penelitian_jenis' => PenelitianJenis::KAJIAN],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::KAJIAN,'status_hasil'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Jurnal',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-hasil','id_penelitian_jenis' => PenelitianJenis::JURNAL],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::JURNAL,'status_hasil'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Brief',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-hasil','id_penelitian_jenis' => PenelitianJenis::POLICY_BRIEF],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_BRIEF,'status_hasil'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Note',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-hasil','id_penelitian_jenis' => PenelitianJenis::POLICY_NOTE],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_NOTE,'status_hasil'=>1]).'</small></span></a>'
            ],
        
        ]],
        ['label' => 'Pengukuran Kemanfaatan','icon'=>'check-square-o','items'=>[
            [
                'label' => 'Kajian',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-penilaian','id_penelitian_jenis' => PenelitianJenis::KAJIAN],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::KAJIAN,'status_hasil'=>1,'id_unit'=>User::getIdUnit()]).'</small></span></a>'
            ],
            [
                'label' => 'Jurnal',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-penilaian','id_penelitian_jenis' => PenelitianJenis::JURNAL],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::JURNAL,'status_hasil'=>1,'id_unit'=>User::getIdUnit()]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Brief',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-penilaian','id_penelitian_jenis' => PenelitianJenis::POLICY_BRIEF],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_BRIEF,'status_hasil'=>1,'id_unit'=>User::getIdUnit()]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Note',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-penilaian','id_penelitian_jenis' => PenelitianJenis::POLICY_NOTE],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_NOTE,'status_hasil'=>1,'id_unit'=>User::getIdUnit()]).'</small></span></a>'
            ],
        ]],
        ['label' => 'MENU LAINNYA', 'options' => ['class' => 'header']],
        ['label' => 'Profil', 'icon' => 'user', 'url' => ['/user/profil'],],
        ['label' => 'Ganti Password', 'icon' => 'key', 'url' => ['/user/set-password'],],
        ['label' => 'Logout', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
    ],
]) ?>