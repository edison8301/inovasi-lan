<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "inovasi".
 *
 * @property int $id
 * @property int $kategori_id
 * @property int $jenis_inovasi_id
 * @property string $nama_inovasi
 * @property string $produk_inovasi
 * @property string $penggagas
 * @property int $kelompok_inovator_id
 * @property string $deskripsi
 * @property string $nama_instansi
 * @property string $unit_instansi
 * @property int $tahun_inisiasi
 * @property int $tahun_implementasi
 * @property string $faktor_pendorong
 * @property string $faktor_penghambat
 * @property string $tahapan_proses
 * @property string $output
 * @property string $outcome
 * @property string $manfaat
 * @property string $prasyarat_replikasi
 * @property string $kontak
 * @property string $sumber
 * @property int $teknik_validasi_id
 * @property int $status_inovasi_id
 * @property string $gambar_ilustrasi
 * @property int $jumlah_dilihat
 * @property int $jumlah_diunduh
 * @property string $tanggal_inovasi
 * @property int $member_id
 * @property string $waktu_dibuat
 * @property string $waktu_diterbitkan
 * @property string $waktu_diubah
 */
class Inovasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inovasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_inovasi'],'required','message'=>'{attribute} tidak boleh kosong'],
            [['kategori_id', 'jenis_inovasi_id', 'kelompok_inovator_id', 'tahun_inisiasi', 
                'tahun_implementasi', 'teknik_validasi_id', 'status_inovasi_id', 'jumlah_dilihat', 
                'jumlah_diunduh', 'member_id', 'provinsi_id','kabkota_id'], 'integer'],
            [['deskripsi', 'faktor_pendorong', 'faktor_penghambat', 'tahapan_proses', 'output', 
                'outcome', 'manfaat', 'prasyarat_replikasi'], 'string'],
            [['tanggal_inovasi', 'waktu_dibuat', 'waktu_diterbitkan', 'waktu_diubah'], 'safe'],
            [['nama_inovasi', 'produk_inovasi', 'penggagas', 'nama_instansi', 'unit_instansi', 
                'kontak', 'sumber', 'gambar_ilustrasi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_id' => 'Kategori',
            'jenis_inovasi_id' => 'Jenis Inovasi',
            'nama_inovasi' => 'Nama Inovasi',
            'produk_inovasi' => 'Produk Inovasi',
            'penggagas' => 'Penggagas',
            'provinsi_id' => 'Provinsi',
            'kabkota_id' => 'Kab/Kota',
            'kelompok_inovator_id' => 'Kelompok Inovator',
            'deskripsi' => 'Deskripsi',
            'nama_instansi' => 'Nama Instansi',
            'unit_instansi' => 'Unit Instansi',
            'tahun_inisiasi' => 'Tahun Inisiasi',
            'tahun_implementasi' => 'Tahun Implementasi',
            'faktor_pendorong' => 'Faktor Pendorong',
            'faktor_penghambat' => 'Faktor Penghambat',
            'tahapan_proses' => 'Tahapan Proses',
            'output' => 'Output',
            'outcome' => 'Outcome',
            'manfaat' => 'Manfaat',
            'prasyarat_replikasi' => 'Prasyarat Replikasi',
            'kontak' => 'Kontak',
            'sumber' => 'Sumber',
            'teknik_validasi_id' => 'Teknik Validasi',
            'status_inovasi_id' => 'Status Inovasi',
            'gambar_ilustrasi' => 'Gambar Ilustrasi',
            'jumlah_dilihat' => 'Jumlah Dilihat',
            'jumlah_diunduh' => 'Jumlah Diunduh',
            'tanggal_inovasi' => 'Tanggal Inovasi',
            'member_id' => 'Member ID',
            'waktu_dibuat' => 'Waktu Dibuat',
            'waktu_diterbitkan' => 'Waktu Diterbitkan',
            'waktu_diubah' => 'Waktu Diubah',
        ];
    }

    public function getJenisInovasi()
    {
        return $this->hasOne(JenisInovasi::className(),['id' => 'jenis_inovasi_id']);
    }

    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::class,['id' => 'provinsi_id']);
    }

    public function getKabkota()
    {
        return $this->hasOne(Kabkota::class,['id' => 'kabkota_id']);
    }

    public function getKelompokInovator()
    {
        return $this->hasOne(KelompokInovator::className(),['id' => 'kelompok_inovator_id']);
    }

    public function getStatusInovasi()
    {
        return $this->hasOne(StatusInovasi::class,['id' => 'status_inovasi_id']);
    }

    public function getTeknikValidasi()
    {
        return $this->hasOne(TeknikValidasi::className(),['id' => 'teknik_validasi_id']);
    }

    public static function findInovasiProvider()
    {
        return self::find();
    }

    public function getDeskripsiListView()
    {
        return substr(strtolower($this->deskripsi), 0, 200);
    }

    public function getGambar($htmlOptions=[])
    {
        $path = Yii::$app->basePath;
        if($this->gambar_ilustrasi == null OR !file_exists($path.'/web/uploads/inovasi/'.$this->gambar_ilustrasi)){
            return Html::img('@web/images/no-image.png',$htmlOptions);
        } else {
            return Html::img('@web/uploads/inovasi/'. $this->gambar_ilustrasi,$htmlOptions);
        }
    }

    public function beforeSave($insert)
    {
        if($this->waktu_dibuat==null) {
            $this->waktu_dibuat = date('Y-m-d H:i:s');
        }

        if($this->waktu_diterbitkan==null AND $this->status_inovasi_id == 1) {
            $this->waktu_diterbitkan = date('Y-m-d H:i:s');
        }

        return parent::beforeSave($insert);
    }

}
