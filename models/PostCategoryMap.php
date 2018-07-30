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
    CONST AKTIF = 1;
    CONST TIDAK_AKTIF = 0;

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

    public function getPost()
    {
        return $this->hasOne(Post::class,['id' => 'post_id']);
    }

    public function getPostCategory()
    {
        return $this->hasOne(PostCategory::class,['id' => 'post_category_id']);
    }

    public function getStatus()
    {
        if ($this->active == static::AKTIF) {
            return "Aktif";
        } else {
            return "Tidak Aktif";
        }
    }

}
