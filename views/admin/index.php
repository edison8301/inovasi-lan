<?php

use yii\helpers\Html;
use yii\helpers\Url; 
use app\models\User;
use app\models\Penelitian;
use app\models\PenelitianStatus;
use app\models\PenelitianTahap;
use app\models\PenelitianTahapStatus;

$this->title = "Halaman Dashboard";

?>

<?php if(User::isAdmin() OR User::isDeputi()) { ?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Daftar Verifikasi Tahap Kajian</h3>
	</div>
	<div class="box-body">
		<?php if(User::getCountPenelitianTahap(['id_penelitian_tahap_status'=>PenelitianTahapStatus::VERIFIKASI])!=0) { ?>
		<table class="table table-hover">
		<thead>
		<tr>
			<th style="text-align: center" width="50px">No</th>
			<th>Judul Kajian</th>
			<th style="text-align: center">Jenis</th>
			<th width="120px" style="text-align: center">Tahun</th>
			<th width="200px" style="text-align: center">Unit</th>
			<th style="text-align: center" width="80px">Tahap</th>
			<th style="text-align: center" width="80px">Jumlah<br>Ulasan</th>
			<th style="text-align: center" width="80px">Aksi</th>
		</tr>
		</thead>
		<?php $i=1; foreach(User::getAllPenelitianTahap(['id_penelitian_tahap_status'=>PenelitianTahapStatus::VERIFIKASI]) as $penelitianTahap) { ?>
		<tr>
			<td style="text-align: center"><?= $i; ?></td>
			<td><?= Html::a($penelitianTahap->penelitian->judul,['penelitian-tahap/view','id'=>$penelitianTahap->id]); ?></td>
			<td style="text-align: center"><?= @$penelitianTahap->penelitianJenis->nama; ?></td>
			<td style="text-align: center"><?= @$penelitianTahap->penelitian->tahun; ?></td>
			<td style="text-align: center"><?= @$penelitianTahap->unit->nama; ?></td>
			<td style="text-align: center"><?= @$penelitianTahap->tahap->nama; ?></td>
			<td style="text-align: center"><?= @$penelitianTahap->getCountPenelitianUlasan(); ?></td>
			<td style="text-align: center">
				<?= $penelitianTahap->getLinkIconSetSetuju(); ?>		
				<?= $penelitianTahap->getLinkIconSetPerbaikan(); ?>		
			</td>
		</tr>
		<?php $i++; } ?>
		</table>
		<?php } ?>
		<?php if(User::getCountPenelitianTahap(['id_penelitian_tahap_status'=>PenelitianTahapStatus::VERIFIKASI])==0) { ?>
		<p>Tidak ada kajian yang harus diverifikasi</p>
		<?php } ?>
	</div>
</div>
<?php } ?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Daftar Penyusunan Kajian</h3>
	</div>
	<div class="box-body">
		<?php if(User::getCountPenelitian()!=0) { ?>
		<table class="table table-hover">
		<thead>
		<tr>
			<th style="text-align: center" width="50px">No</th>
			<th>Judul Kajian</th>
			<th style="text-align: center">Jenis</th>
			<th width="120px" style="text-align: center">Tahun</th>
			<th width="200px" style="text-align: center">Unit</th>
			<th style="text-align: center" width="80px">Progres</th>
		</tr>
		</thead>
		<?php $i=1; foreach(User::getAllPenelitian(['status_susun'=>1]) as $penelitian) { ?>
		<tr>
			<td style="text-align: center"><?= $i; ?></td>
			<td><?= Html::a($penelitian->judul,['penelitian/view-susun','id'=>$penelitian->id]); ?></td>
			<td style="text-align: center"><?= @$penelitian->penelitianJenis->nama; ?></td>
			<td style="text-align: center"><?= @$penelitian->tahun; ?></td>
			<td style="text-align: center"><?= @$penelitian->unit->nama; ?></td>
			<td style="text-align: center"><?= @$penelitian->getProgres(); ?></td>
		</tr>
		<?php $i++; } ?>
		</table>
		<?php } ?>

		<?php if(User::getCountPenelitian()==0) { ?>
		<p>Tidak ada penyusunan kajian</p>
		<?php } ?>
	</div>
</div>

<?php /*
<?= $this->render('box-dashboard') ?>
*/ ?>

<?= $this->render('grafik') ?>

<?php /*
<?= $this->render('daftar-kajian-ulasan') ?>
*/ ?>