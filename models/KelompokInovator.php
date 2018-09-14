<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "kelompok_inovator".
 *
 * @property int $id
 * @property string $nama
 */
class KelompokInovator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelompok_inovator';
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

    public static function getList()
    {
        return yii\helpers\ArrayHelper::map(KelompokInovator::find()->all(),'id','nama');
    }

    public function getManyInovasi()
    {
        return $this->hasMany(Inovasi::className(), ['kelompok_inovator_id' => 'id']);
    }

    public function getCountInovasi()
    {
        return $this->getManyInovasi()->count();
    }

    public static function getGrafik($value='')
    {
        $chart = null;

        foreach (self::find()->all() as $data) {
            $chart .= '{"label":"'.$data->nama.'","value":"'.$data->getCountInovasi().'"},';
        }

        return $chart;
    }

    public static function findKelompokInovator()
    {
        $model = self::find()
        ->joinWith('manyInovasi')
        ->groupBy('inovasi.kelompok_inovator_id')
        ->andWhere('inovasi.kelompok_inovator_id IS NOT NULL')
        ->orderBy(new Expression('rand()'))
        ->limit(5)
        ->all();

        return $model;
    }
}
