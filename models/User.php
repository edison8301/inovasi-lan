<?php

namespace app\models;

use Yii;
use yii2tech\ar\softdelete\SoftDeleteBehavior;
use yii\helpers\Html;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $id_user_role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const AKTIF = 1;
    const NON_AKTIF = 0;

    public $auth_key;
    public $access_token;
    public $password_konfirmasi;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'id_user_role','email','password_konfirmasi','id_unit'], 'required'],
            ['email','unique'],
            [['id_user_role','id_pegawai','id_anggota','id_unit'], 'integer'],
            ['email', 'email'],
            [['username', 'password','model','email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'id_unit' => 'Unit',
            'id_pegawai' => 'Nama Pegawai',
            'id_anggota' => 'Nama Anggota',
            'model' => 'Model',
            'id_user_role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id' => 'id_anggota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'id_pegawai']);
    }


    public function getRelationField($relation,$field)
    {
        if(!empty($this->$relation->$field)){
            return $this->$relation->$field;   
        } else {
            return null;
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
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

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getRole()
    {
        if ($this->id_user_role === UserRole::ADMIN) {
            return 'Admin';
        } 

        if ($this->id_user_role === UserRole::PEGAWAI) {
            return 'Pegawai';
        }

        if ($this->id_user_role === UserRole::ANGGOTA) {
            return 'Anggota';
        }
    }

    public static function getIdUser()
    {
        return Yii::$app->user->identity->id;
    }

    public static function getTahun()
    {
        return Yii::$app->session->get('tahun',date('Y'));
    }

    public static function isAdmin()
    {
        if (Yii::$app->user->identity->id_user_role == UserRole::ADMIN) {
            return true;
        } else {
            return false;
        }
    }

    public static function isPegawai()
    {
        if (Yii::$app->user->identity->id_user_role == UserRole::PEGAWAI) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAnggota()
    {
        if (Yii::$app->user->identity->id_user_role == UserRole::ANGGOTA) {
            return true;
        } else {
            return false;
        }
    }

    public static function isUnit()
    {
        if (Yii::$app->user->identity->id_user_role == UserRole::UNIT) {
            return true;
        } else {
            return false;
        }
    }

    public static function isDeputi()
    {
        if (Yii::$app->user->identity->id_user_role == UserRole::DEPUTI) {
            return true;
        } else {
            return false;
        }
    }

    public function getIdPegawai()
    {
        if (Yii::$app->user->identity->id_user_role == UserRole::PEGAWAI) {
            return Yii::$app->user->identity->id_pegawai;
        }
    }

    public function getIdUnit()
    {
        if (Yii::$app->user->identity->id_user_role == UserRole::UNIT) {
            return Yii::$app->user->identity->id_unit;
        }

        if (Yii::$app->user->identity->id_user_role == UserRole::PEGAWAI) {
            return Yii::$app->user->identity->pegawai->id_unit;
        }

        return null;
    }



    public static function getRoleList()
    {
        return [
            UserRole::ADMIN => 'Admin',
            UserRole::PEGAWAI => 'Pegawai',
        ];
    }

    public function setPassword()
    {
        if (User::isAdmin()) {
            return Html::a('<i class="glyphicon glyphicon-lock">', ['set-password','id' => $this->id], ['data-toggle' => 'tooltip', 'title' => 'Set Password']);
        }

        if (User::isPegawai()) {
            return Html::a('<i class="glyphicon glyphicon-lock">', ['set-password'], ['data-toggle' => 'tooltip', 'title' => 'Set Password']);
        }
    }

    public function getLabelStatusAktif()
    {
        if ($this->status === self::AKTIF) {
            return Html::a('<i class="fa fa-check"></i>', null, ['class' => 'label label-success','data-toggle' => 'tooltip','title' => 'Aktif']);
        } else {
            return Html::a('<i class="fa fa-close"></i>', ['user/aktif','id' => $this->id], ['class' => 'label label-danger','data-toggle' => 'tooltip','title' => 'Belum Aktif']);
        }
    }

    public function setToken()
    {
        $token = Yii::$app->getSecurity()->generateRandomString(50);

        $this->token = $token;
        if ($this->save(false)) {
            return true;
        }

        return false;
    }

    public function sendEmailLupaPassword()
    {
        $this->setToken();

        /*$pesan = '
        Hi '.$this->username.' <br><br>

        Untuk melakukan ganti password pada akun anda klik <a href="http://localhost/kajian-lan/web/index.php?r=user/set-password-guest&id='.$this->id.'&token='.$this->token.'">Ganti Password</a>';*/

    return Yii::$app->mailer->compose('@app/components/email-notifikasi', ['model' => $model])
        ->setFrom(['siska.lan@indomailer.net' => 'Sistem Informasi Kajian LAN RI'])
        ->setTo($model->email)
        ->setSubject('Notifikasi Pengisian Ulasan Kajian')
        ->send();
    }

    public function accessView()
    {
        if (User::isAdmin()) {
            return true;
        }

        return false;
    }

    public static function getStaticCount($id_user_role)
    {
        return self::find()->andWhere(['id_user_role' => $id_user_role])->count();
    }

    public static function getQueryPenelitian($params=[])
    {
        $query = Penelitian::find();
        $query->andWhere('status_hapus = 0');

        $query->andFilterWhere([
            'status_susun'=>@$params['status_susun']
        ]);

        if(User::isUnit()) {
            $query->andWhere(['id_unit'=>User::getIdUnit()]);
        }

        return $query;
    }

    public static function getAllPenelitian($params=[])
    {
        $query = User::getQueryPenelitian($params);

        return $query->all();
    }

    public static function getCountPenelitian()
    {
        $query = User::getQueryPenelitian();

        return $query->count();
    }

    public static function getQueryPenelitianTahap($params=[])
    {
        $query = PenelitianTahap::find();

        $query->andFilterWhere([
            'id_penelitian_tahap_status'=>@$params['id_penelitian_tahap_status']
        ]);

        return $query;
    }

    public static function getAllPenelitianTahap($params=[])
    {
        $query = User::getQueryPenelitianTahap($params);

        return $query->all();
    }

    public static function getCountPenelitianTahap($params=[])
    {
        $query = User::getQueryPenelitianTahap($params);

        return $query->count();
    }
}
