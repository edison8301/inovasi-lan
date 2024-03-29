<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $auth_key;
    public $access_token;
    public $password_konfirmasi;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['role_id'], 'integer'],
            ['role_id','safe'],
            [['username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'role_id' => 'Role ID',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getRole()
    {
        return $this->hasOne(Role::class,['id'=>'role_id']);
    }

    public function getManyInovasi()
    {
        return $this->hasMany(Inovasi::className(), ['created_by' => 'id']);
    }

    public function getManyPost()
    {
        return $this->hasMany(Post::className(), ['created_by' => 'id']);
    }

    public static function getGrafik($params)
    {
        $chart = null;

        foreach (self::find()->all() as $data) {
            if ($params == 'inovasi') {
                $value = $data->manyInovasiCount;
            } else {
                $value = $data->manyPostCount;
            }

            $chart .= '{"label":"'.$data->username.'","value":"'.$value.'"},';
        }

        return $chart;
    }

    public function getManyInovasiCount()
    {
        return count($this->manyInovasi);
    }

    public function getManyPostCount()
    {
        return count($this->manyPost);
    }

    public function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'username');
    }
}
