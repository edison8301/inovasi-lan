<?php 

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Html Layout Email</title>
</head>
<body>
	<div>
            Kepada Yth,
        <br>
            <?= ' '.ucwords("").' ' ?>
        <br><br>
    </div>
    <div>
        Dengan Hormat,
        <br>
            <p>
                Melalui surat elektronik ini, kami ingin mengucapkan terima kasih kepada Bapak/Ibu yang telah berpartisipasi menjadi salah satu anggota pada aplikasi <a href="http://previewaplikasi.com/kajian-lan">Sistem Informasi Kajian LAN</a>.
            </p>
            <p>
                Berikut informasi akun anda :
                <table>
                    <tr>
                        <th style="padding-right: 15px">Nama </th>
                        <th style="padding-right: 10px">:</th>
                        <td>Lorem</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 15px">Instansi </th>
                        <th style="padding-right: 10px">:</th>
                        <td>Lorem</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 15px">Jabatan </th>
                        <th style="padding-right: 10px">:</th>
                        <td>Lorem</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 15px">Keperluan </th>
                        <th style="padding-right: 10px">:</th>
                        <td>Lorem</td>
                    </tr>
                </table>
            </p>
            <p>
                Berikut adalah informasi akun anda :
            	Untuk sekarang akun anda belum aktif, kami akan mengirimkan kembali email jika akun anda telah di aktifkan oleh admin.
            </p>
        <br>
    </div>

    <div>
            Demikian pemberitahuan ini kami sampaikan, atas perhatiannya terima kasih. 
        <br><br>
            Salam Hormat, 
        <br><br><br>
            Admin Sistem Informasi Kajian LAN RI
    </div>
</body>
</html>