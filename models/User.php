<?php

namespace app\models;

use Yii;

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

    public static function getGrafik()
    {
        $chart = null;

        foreach (self::find()->all() as $data) {
            $chart .= '{"label":"'.$data->username.'","value":"'.$data->manyInovasiCount.'"},';
        }

        return $chart;
    }

    public function getManyInovasiCount()
    {
        return count($this->manyInovasi);
    }
}
