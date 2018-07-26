<?php

namespace app\models;

use Yii;

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
}
