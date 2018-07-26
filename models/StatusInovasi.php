<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_inovasi".
 *
 * @property int $id
 * @property string $nama
 */
class StatusInovasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_inovasi';
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
        return yii\helpers\ArrayHelper::map(TeknikValidasi::find()->all(),'id','nama');
    }
}
