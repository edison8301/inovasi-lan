<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_validasi".
 *
 * @property int $id
 * @property string $nama
 */
class KategoriValidasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_validasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    public function getManyValidasi()
    {
        return $this->hasMany(Validasi::class,['kategori_validasi_id'=>'id']);
    }
}
