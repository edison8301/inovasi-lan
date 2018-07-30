<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kode_lokasi".
 *
 * @property int $id
 * @property string $kode_provinsi
 * @property string $kode_kabkota
 * @property string $provinsi
 * @property string $kabkota
 */
class KodeLokasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kode_lokasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_provinsi', 'kode_kabkota', 'provinsi', 'kabkota'], 'required'],
            [['kode_provinsi', 'kode_kabkota', 'provinsi', 'kabkota'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_provinsi' => 'Kode Provinsi',
            'kode_kabkota' => 'Kode Kabkota',
            'provinsi' => 'Provinsi',
            'kabkota' => 'Kabkota',
        ];
    }
}
