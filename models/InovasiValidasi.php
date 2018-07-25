<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inovasi_validasi".
 *
 * @property int $id
 * @property int $inovasi_id
 * @property int $validasi_id
 * @property int $aktif
 */
class InovasiValidasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inovasi_validasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inovasi_id', 'validasi_id'], 'required'],
            [['inovasi_id', 'validasi_id', 'aktif'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inovasi_id' => 'Inovasi ID',
            'validasi_id' => 'Validasi ID',
            'aktif' => 'Aktif',
        ];
    }
}
