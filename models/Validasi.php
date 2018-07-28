<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "validasi".
 *
 * @property int $id
 * @property int $kategori_validasi_id
 * @property string $nama
 */
class Validasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'validasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori_validasi_id', 'nama'], 'required'],
            [['kategori_validasi_id'], 'integer'],
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
            'kategori_validasi_id' => 'Kategori Validasi ID',
            'nama' => 'Nama',
        ];
    }
}
