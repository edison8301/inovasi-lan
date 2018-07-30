<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_inovasi".
 *
 * @property int $id
 * @property string $nama
 */
class JenisInovasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_inovasi';
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
        return yii\helpers\ArrayHelper::map(JenisInovasi::find()->all(),'id','nama');
    }

    public function getManyInovasi()
    {
        return $this->hasMany(Inovasi::className(), ['jenis_inovasi_id' => 'id']);
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
}
