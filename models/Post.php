<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $post_category_id
 * @property string $title
 * @property string $content
 * @property string $thumbnail
 * @property string $tags
 * @property int $total_views
 * @property string $created_time
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_category_id', 'total_views'], 'integer'],
            [['title'], 'required'],
            [['content'], 'string'],
            [['created_time'], 'safe'],
            [['title', 'thumbnail', 'tags'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_category_id' => 'Post Category',
            'title' => 'Title',
            'content' => 'Content',
            'thumbnail' => 'Thumbnail',
            'tags' => 'Tags',
            'total_views' => 'Total Views',
            'created_time' => 'Created Time',
        ];
    }

    public function getPostCategory()
    {
        return $this->hasOne(PostCategory::className(),['id' => 'post_category_id']);
    }

    public function getTitle()
    {
        return ucwords(strtolower($this->title));
    }

    public function getTitleListView()
    {
        return substr($this->getTitle(), 0, 65)." ...";
    }

    public static function findPostProvider()
    {
        return self::find()->orderBy(['created_time' => SORT_DESC]);
    }

    public function getThumbnail($htmlOptions=[])
    {
        $path = Yii::$app->basePath;

        if ($this->thumbnail !== null AND file_exists($path.'/web/uploads/'.$this->thumbnail)) {
            return Html::img('@web/uploads/'. $this->thumbnail,$htmlOptions);;
        } else  {
            return Html::img("@web/images/banner_nav_left.jpg", ['class' => 'img-responsive']);
        }
    }
}
