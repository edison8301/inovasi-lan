<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $id
 * @property string $nama
 * @property string $peta
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['peta'], 'string'],
            [['id'], 'string', 'max' => 2],
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
            'nama' => 'Nama',
            'peta' => 'Peta',
        ];
    }

    public function getManyInovasi()
    {
        return $this->hasMany(Inovasi::class,['provinsi_id'=>'id']);
    }

    public static function getList()
    {
        return yii\helpers\ArrayHelper::map(self::find()->all(),'id','nama');
    }

    public function getCountInovasi()
    {
        return $this->getManyInovasi()->count();
    }

    public static function findProvinsi()
    {
        $model = Provinsi::find()
        ->joinWith('manyInovasi')
        ->groupBy('inovasi.provinsi_id')
        ->andWhere('inovasi.provinsi_id IS NOT NULL')
        ->orderBy(new Expression('rand()'))
        ->limit(5)
        ->all();

        return $model;
    }
}
