<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use app\components\Helper;

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

    public function getTitleSlide()
    {
        return substr($this->getTitle(), 0, 25);
    }

    public function getTitleListView()
    {
        return substr($this->getTitle(), 0, 65)." ...";
    }

    public static function findPostProvider()
    {
        return self::find()->orderBy(['created_time' => SORT_DESC]);
    }

    public static function findPostByCategory($post_category_id)
    {
        return static::find()->andWhere(['post_category_id' => $post_category_id]);
    }

    public static function findPostLimit($post_category_id,$limit)
    {
        $model = self::findPostByCategory($post_category_id)->limit($limit)->all();

        return $model;
    }

    public function getThumbnail($htmlOptions=[])
    {
        $path = Yii::$app->basePath;
        if ($this->thumbnail == null OR !file_exists($path.'/web/uploads/post/'.$this->thumbnail)) {
            return Html::img("@web/images/logo.png", ['class' => 'img-responsive']);
        } else  {
            return Html::img('@web/uploads/post/'. $this->thumbnail,$htmlOptions);;
        }
    }

    public function getMainPost()
    {
        return '<div class="box-main-post">
                    <div class="box-main-thumbnail">
                        '.$this->getThumbnail(['class' => 'img-responsive']).'
                    </div>
                    <h4 class="box-main-title">
                        '. Html::a(substr($this->title, 0, 30)."....", ['site/post-view','id' => $this->id], ['class' => 'anchor-black']).'
                    </h4>
                    <div class="date-post">
                        '.Helper::getTanggal($this->created_time).'
                    </div>
                </div>';
    }

    public function getSubPost()
    {
        return '<div class="widget-content-list">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="box-list-thumbnail">
                                '. $this->getThumbnail(['style' => 'width:80px;']).'
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <div class="title">
                                '. Html::a(substr($this->title, 0, 55)."....", ['site/post-view','id' => $this->id], ['class' => 'anchor-black']).'
                            </div>

                            <div class="date-post">
                                '.Helper::getTanggal($this->created_time).'
                            </div>
                        </div>
                    </div>
                </div>';
    }
}
