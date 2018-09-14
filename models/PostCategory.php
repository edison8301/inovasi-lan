<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "post_category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    CONST BERITA = 1;
    CONST ARTIKEL = 2;
    CONST E_BOOK = 3;
    CONST POLICE_BRIEF = 4;
    CONST TOKOH_INOVASI = 9;
    CONST HASIL_KAJIAN = 11;
    CONST LABORATORIUM_INOVASI = 23;

    public static function tableName()
    {
        return 'post_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
        ];
    }

    public function getParent()
    {
        return $this->hasOne(self::class,['parent_id' => 'id']);
    }

    public function getList()
    {
        return ArrayHelper::map(static::find()->all(), 'id', 'title');
    }

}
