<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use yii\web\UploadedFile;

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
            ['gambar_ilustrasi','file', 'extensions' => ['png', 'jpg', 'jpeg']]
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'waktu_dibuat',
                'updatedAtAttribute' => 'waktu_diubah',
                'value' => new Expression('NOW()'),
            ],
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
            return Html::img('@web/images/logo.png',$htmlOptions);
        } else {
            return Html::img('@web/uploads/inovasi/'. $this->gambar_ilustrasi,$htmlOptions);
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $this->createInovasiValidasi();
        }

        if ($changedAttributes) {
            $this->updateInovasiValidasi();
        }
    }

    public function createInovasiValidasi()
    {
        $validasi = @$_POST['validasi'];

        if ($validasi !== null) {
            foreach ($validasi as $key => $value) {

                $inovasiValidasi = InovasiValidasi::find()->andWhere([
                    'inovasi_id' => $this->id,
                    'validasi_id' => $key
                ])->one();

                if ($inovasiValidasi == null) {
                    $inovasiValidasi = new InovasiValidasi();
                    $inovasiValidasi->inovasi_id = $this->id;
                    $inovasiValidasi->validasi_id = $key;
                    $inovasiValidasi->aktif = $value;
                    $inovasiValidasi->save(false);
                }
            }
        }
    }

    public function updateInovasiValidasi()
    {
        $inovasiValidasi = InovasiValidasi::find()->andWhere(['inovasi_id' => $this->id])->all();

        foreach ($inovasiValidasi as $value) {
            $value->delete();
        }

        $this->createInovasiValidasi();
    }

    public function saveGambar()
    {
        $gambar_ilustrasi = UploadedFile::getInstance($this, 'gambar_ilustrasi');

        if (is_object($gambar_ilustrasi)) {
            $this->gambar_ilustrasi = $gambar_ilustrasi->basename;
            $this->gambar_ilustrasi .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            $this->gambar_ilustrasi .= '.' . $gambar_ilustrasi->extension;

            $path = Yii::getAlias('@app').'/web/uploads/inovasi/'.$this->gambar_ilustrasi;
            $gambar_ilustrasi->saveAs($path, false);
        } else {
            $this->gambar_ilustrasi = null;
        }
    }

    public function updateGambar($gambar_ilustrasi_lama)
    {
        $gambar_ilustrasi = UploadedFile::getInstance($this, 'gambar_ilustrasi');

        if (is_object($gambar_ilustrasi)){
            $this->gambar_ilustrasi = $gambar_ilustrasi->baseName;
            $this->gambar_ilustrasi .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            $this->gambar_ilustrasi .= '.' . $gambar_ilustrasi->extension;

            $path = Yii::getAlias('@app').'/web/uploads/inovasi/'.$this->gambar_ilustrasi;

            $gambarLama = Yii::getAlias('@app').'/web/uploads/inovasi/'.$gambar_ilustrasi_lama;

            $gambar_ilustrasi->saveAs($path, false);

            if (file_exists($gambarLama) AND $gambar_ilustrasi_lama !== null) {
                unlink($gambarLama);
            }

        } else {
            $this->gambar_ilustrasi = $gambar_ilustrasi_lama;
        }
    }

    public function deletGambar()
    {
        $gambar = Yii::getAlias('@app').'/web/uploads/inovasi/'.$this->gambar_ilustrasi;

        if (file_exists($gambar) AND $this->gambar_ilustrasi !== null) {
            unlink($gambar);
        } else {
            return false;
        }
    }

    public static function getGrafik($value='')
    {
        $chart = null;
        $tahunKebelakang = date('Y') - 5;
        $tahunSekarang = date('Y');

        for ($i = $tahunKebelakang; $i <= $tahunSekarang ; $i++) {
            $data = static::find()->andWhere(['tahun_inisiasi' => $i])->count();
            $chart .= '{"label":"'.$i.'","value":"'.$data.'"},';
        }

        return $chart;
    }

    public function findInovasiTerbaru()
    {
        return static::find()->orderBy(['waktu_dibuat' => SORT_DESC])->one();
    }

    public static function getList()
    {
        return yii\helpers\ArrayHelper::map(self::find()->all(),'id','nama_inovasi');
    }

}
