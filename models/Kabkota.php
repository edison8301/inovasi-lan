<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kabkota".
 *
 * @property string $id
 * @property string $id_provinsi
 * @property string $nama
 * @property string $peta
 *
 * @property Districts[] $districts
 */
class Kabkota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kabkota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provinsi_id', 'nama'], 'required'],
            [['peta'], 'string'],
            [['id'], 'string', 'max' => 4],
            [['provinsi_id'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provinsi_id' => 'Provinsi',
            'nama' => 'Nama',
            'peta' => 'Peta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(Districts::className(), ['regency_id' => 'id']);
    }

    public static function getList()
    {
        return yii\helpers\ArrayHelper::map(Kabkota::find()->all(),'id','nama');
    }

    public function getManyInovasi()
    {
        return $this->hasMany(Inovasi::class,['kabkota_id'=>'id']);
    }

    public function getCountInovasi()
    {
        return $this->getManyInovasi()->count();
    }

    public static function findInovasiTerbesar()
    {
        $model = static::find()->limit(10)->all();

        return $model;
    }
}
