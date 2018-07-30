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

    CONST AKTIF = 1;
    CONST TIDAK_AKTIF = 0;

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
            'inovasi_id' => 'Inovasi',
            'validasi_id' => 'Validasi',
            'aktif' => 'Aktif',
        ];
    }

    public function getInovasi()
    {
        return $this->hasOne(Inovasi::class,['id' => 'inovasi_id']);
    }

    public function getValidasi()
    {
        return $this->hasOne(Validasi::class,['id' => 'validasi_id']);
    }

    public function getStatus()
    {
        if ($this->aktif == static::AKTIF) {
            return "Aktif";
        } else {
            return "Tidak Aktif";
        }
    }
}
