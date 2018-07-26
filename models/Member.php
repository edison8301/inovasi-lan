<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $nama_instansi
 * @property string $alamat_instansi
 * @property string $telepon_instansi
 * @property string $login_terakhir
 * @property int $aktif
 * @property string $waktu_dibuat
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alamat', 'alamat_instansi'], 'string'],
            [['login_terakhir', 'waktu_dibuat'], 'safe'],
            [['aktif'], 'integer'],
            [['email', 'password', 'nama', 'telepon', 'nama_instansi', 'telepon_instansi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'nama_instansi' => 'Nama Instansi',
            'alamat_instansi' => 'Alamat Instansi',
            'telepon_instansi' => 'Telepon Instansi',
            'login_terakhir' => 'Login Terakhir',
            'aktif' => 'Aktif',
            'waktu_dibuat' => 'Waktu Dibuat',
        ];
    }
}
