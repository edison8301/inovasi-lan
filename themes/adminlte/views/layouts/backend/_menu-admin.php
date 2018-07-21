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
        ['label' => 'Penyusunan Kajian', 'icon' => 'pencil', 'items' => [
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
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_NOTE,'status_susun'=>1]).'</small></span></a>'
            ],
        
        ]],
        ['label' => 'Hasil Kajian','icon'=>'file','items'=>[
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
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::KAJIAN,'status_hasil'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Jurnal',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-penilaian','id_penelitian_jenis' => PenelitianJenis::JURNAL],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::JURNAL,'status_hasil'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Brief',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-penilaian','id_penelitian_jenis' => PenelitianJenis::POLICY_BRIEF],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_BRIEF,'status_hasil'=>1]).'</small></span></a>'
            ],
            [
                'label' => 'Policy Note',
                'icon' => 'circle-o', 
                'url' => ['/penelitian/index-penilaian','id_penelitian_jenis' => PenelitianJenis::POLICY_NOTE],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Penelitian::getStaticCount(['id_penelitian_jenis'=>PenelitianJenis::POLICY_NOTE,'status_hasil'=>1]).'</small></span></a>'
            ],
        ]],
        
        ['label' => 'MENU LAINNYA', 'options' => ['class' => 'header']],
        ['label' => 'Penelitian Unduhan', 'icon' => 'download', 'url' => ['/penelitian-unduh'],],
        ['label' => 'Penelitian Tahapan', 'icon' => 'tasks', 'url' => ['/tahap'],],
        //['label' => 'Kuesioner', 'icon' => 'pencil-square-o', 'url' => ['/kuesioner'],],
        /*[
            'label' => 'Riwayat Unduhan', 
            'icon' => 'history', 
            'url' => ['/penelitian-unduh'],
            'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.PenelitianUnduh::getCountUnduhan().'</small></span></a>'
        ],*/
        

        ['label' => 'MENU SISTEM', 'options' => ['class' => 'header']],
        ['label' => 'Penilaian', 'icon' => 'check-square-o', 'items' => [
            ['label' => 'Penilaian Aspek', 'icon' => 'circle-o', 'url' => ['penilaian-aspek/index']],
            ['label' => 'Penilaian Aspek Pilihan', 'icon' => 'circle-o', 'url' => ['penilaian-aspek-pilihan/index']],
            ['label' => 'Penilaian Interval', 'icon' => 'circle-o', 'url' => ['penilaian-interval/index']],
            
        ]], 
        [
            'label' => 'Unit Kajian',
            'icon' => 'bank', 
            'url' => ['/unit'],
            'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Unit::getStaticCount().'</small></span></a>'
        ],
        [
            'label' => 'Pegawai',
            'icon' => 'users',
            'url' => ['/pegawai'],
            'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Pegawai::getCountPegawai().'</small></span></a>'
        ],
        [
            'label' => 'Anggota',
            'icon' => 'users', 
            'url' => ['/anggota'],
            'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.Anggota::getCountAnggota().'</small></span></a>'
        ],
        
        ['label' => 'User', 'icon' => 'users', 'items' => [
            [
                'label' => 'Admin',
                'icon' => 'circle-o', 
                'url' => ['/user','id_user_role' => UserRole::ADMIN],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.User::getStaticCount(['id_user_role' => UserRole::ADMIN]).'</small></span></a>'
            ],
            [
                'label' => 'Pegawai',
                'icon' => 'circle-o',
                'url' => ['/user','id_user_role' => UserRole::PEGAWAI],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.User::getStaticCount(['id_user_role' => UserRole::PEGAWAI]).'</small></span></a>'
            ],
            [
                'label' => 'Anggota', 
                'icon' => 'circle-o',
                'url' => ['/user','id_user_role' => UserRole::ANGGOTA],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.User::getStaticCount(['id_user_role' => UserRole::ANGGOTA]).'</small></span></a>'
            ],
            [
                'label' => 'Unit Kerja', 
                'icon' => 'circle-o',
                'url' => ['/user','id_user_role' => UserRole::UNIT],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.User::getStaticCount(['id_user_role' => UserRole::UNIT]).'</small></span></a>'
            ],
            [
                'label' => 'Deputi', 
                'icon' => 'circle-o',
                'url' => ['/user','id_user_role' => UserRole::DEPUTI],
                'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-primary">'.User::getStaticCount(['id_user_role' => UserRole::DEPUTI]).'</small></span></a>'
            ],
        ]],  
        ['label' => 'Master Ref', 'icon' => 'users', 'items' => [
            ['label' => 'Jenis Kajian', 'url' => ['/penelitian-jenis/index']],
            //['label' => 'Status Penelitian', 'icon' => 'circle-o', 'url' => ['/penelitian-status']],
            ['label' => 'Unit Eselon', 'url' => ['/unit-eselon']],
            ['label' => 'Status Penelitian Tahap', 'url' => ['/penelitian-tahap-status']],
            //['label' => 'Kuesioner Rincian Jenis', 'url' => ['/kuesioner-rincian-jenis']],
            
            ['label' => 'Jenis Keperluan', 'url' => ['/keperluan/index']],
            ['label' => 'Jenis Pekerjaan', 'url' => ['/jenis-pekerjaan/index']],

            
        ]], 

        ['label' => 'Logout', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
    ],
]) ?>