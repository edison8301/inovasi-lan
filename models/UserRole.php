<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_role".
 *
 * @property integer $id
 * @property string $nama
 */
class UserRole extends \yii\db\ActiveRecord
{
    const ADMIN = 1;
    const PEGAWAI = 2;
    const ANGGOTA = 3;
    const UNIT = 4;
    const DEPUTI = 5;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
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
        return ArrayHelper::map(self::find()->all(),'id','nama');
    }
}
