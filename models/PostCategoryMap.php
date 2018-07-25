<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_category_map".
 *
 * @property int $id
 * @property int $post_id
 * @property int $post_category_id
 * @property int $active
 */
class PostCategoryMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'post_category_id', 'active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'post_category_id' => 'Post Category ID',
            'active' => 'Active',
        ];
    }
}
