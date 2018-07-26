<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use PhpOffice\PhpWord\Shared\Converter;

use app\models\LoginForm;
use app\models\User;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use app\models\Post;
use app\models\Inovasi;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     * Access Roles ? guest bisa action tanpa login
     * Access Roles @ guest diharuskan melakukan login terlebih dahulu sebelum mengakses action tersebut
     */

    public $layout = '//frontend/main';

    public function behaviors()
    {
        return [
            'access' => [  
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','login','view-post','map-detail','error','index-inovasi'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    
                    [
                        'actions' => ['index','view-post','map-detail','logout','index-inovasi'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'components' => [
                'errorHandler' => [
                    'errorAction' => 'site/error',
                ],
            ]
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        $this->layout = '//frontend/main';
        $this->layout = '//frontend/main-peta';

        $dataProvider = new ActiveDataProvider([
            'query' => Post::findPostProvider(),
            'pagination' => [
                'pageSize' => 5
            ],
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionMapDetail($id)
    {
        $this->layout = '//frontend/main';

        return $this->render('map-detail');
    }

    public function actionIndexInovasi($id_provinsi=null)
    {
        $this->layout = '//frontend/main';
        $this->layout = '//frontend/main-peta';

        $dataProvider = new ActiveDataProvider([
            'query' => Inovasi::findInovasiProvider(),
            'pagination' => [
                'pageSize' => 5
            ],
        ]);

        return $this->render('index-inovasi',[
            'id_provinsi' => $id_provinsi,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionViewPost($id)
    {
        $this->layout = '//frontend/main';
        $this->layout = '//frontend/main-detail';

        $model = Post::findOne($id);

        return $this->render('view-post',[
            'model' => $model
        ]);
    }

    public function actionLogin()
    {
        $this->layout = '//backend/main-login';

        $model = new LoginForm();

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->redirect(['admin/index']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLupaPassword()
    {
        $this->layout = '//backend/main-login';

        $model = new LupaPasswordForm();

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {

            $user = User::find()->andWhere(['email' => $model->email])->one();

            if (is_object($user) AND $user->email === $model->email) {
                Yii::$app->session->setFlash('success', 'Kami telah mengirimkan email ke alamat '.$model->email.' . Cek email anda untuk mengganti password anda');
                $user->sendEmailLupaPassword();
                return $this->redirect(['site/login']);
            } else {
                Yii::$app->session->setFlash('warning', 'Pencarian Anda tidak menemukan hasil sama sekali. Harap coba lagi dengan informasi lain.');
                return $this->redirect($referrer);
            }


        }

        return $this->render('form-lupa-password',[
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionDev()
    {
        return $this->render('dev');
    }

    public function actionError()
    {
        return $this->render('error');
    }


}
