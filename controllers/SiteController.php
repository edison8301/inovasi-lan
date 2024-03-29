<?php

namespace app\controllers;

use PhpOffice\PhpWord\Shared\Converter;
use Yii;
use app\models\ContactForm;
use app\models\Inovasi;
use app\models\InovasiSearch;
use app\models\LoginForm;
use app\models\Post;
use app\models\PostSearch;
use app\models\Provinsi;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

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
                        'roles' => ['?'],
                        'allow' => true,
                        'actions' => ['index','login','post-view','map-detail','error','inovasi-index',
                            'inovasi-view','about','contact','berita','artikel','post-index','dev'],
                    ],
                    [
                        'roles' => ['@'],
                        'allow' => true,
                        'actions' => ['logout','index','about','contact','post-index','post-view',
                            'inovasi-index','inovasi-view','login','dev','import'],
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
        $this->layout = '//frontend/main-peta';

        $inovasiSearch = new InovasiSearch();
        $inovasiSearch->load(Yii::$app->request->queryParams);

        $inovasiTerbaru = Inovasi::findInovasiTerbaru();

        $dataProvider = new ActiveDataProvider([
            'query' => $inovasiSearch->getQuerySearch(),
            'pagination' => [
                'pageSize' => 10
            ],
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'inovasiTerbaru' => $inovasiTerbaru
        ]);
    }

    public function actionPostIndex($post_category_id=null)
    {
        $this->layout = '//frontend/main-detail';

        $postSearch = new PostSearch();
        $postSearch->post_category_id = $post_category_id;

        $dataProvider = new ActiveDataProvider([
            'query' => $postSearch->getQuerySearch(),
            'pagination' => [
                'pageSize' => 10
            ],
        ]);

        return $this->render('post-index',[
            'dataProvider' => $dataProvider,
            'postSearch' => $postSearch
        ]);
    }

    public function actionArtikel()
    {
        $this->layout = '//frontend/main-detail';

        return $this->render('artikel');
    }

    public function actionMapDetail($id)
    {
        $this->layout = '//frontend/main';

        return $this->render('map-detail');
    }

    public function actionInovasiIndex($provinsi_id=null,$kabkota_id=null,$jenis_inovasi_id=null,$kelompok_inovator_id=null)
    {
        $this->layout = '//frontend/main-peta';

        $inovasiSearch = new InovasiSearch();
        $inovasiSearch->provinsi_id = $provinsi_id;
        $inovasiSearch->kabkota_id = $kabkota_id;
        $inovasiSearch->jenis_inovasi_id = $jenis_inovasi_id;
        $inovasiSearch->kelompok_inovator_id = $kelompok_inovator_id;

        $dataProvider = new ActiveDataProvider([
            'query' => $inovasiSearch->getQuerySearch(),
            'pagination' => [
                'pageSize' => 10
            ],
        ]);

        return $this->render('inovasi-index',[
            'provinsi_id' => $provinsi_id,
            'dataProvider' => $dataProvider,
            'inovasiSearch' => $inovasiSearch
        ]);
    }

    public function actionInovasiView($id)
    {
    
        $this->layout = '//frontend/main-detail';

        $model = Inovasi::findOne($id);
        $model->jumlah_dilihat += 1;
        $model->save();

        return $this->render('inovasi-view',[
            'model' => $model
        ]);
    }

    public function actionPostView($id)
    {
        $this->layout = '//frontend/main';
        $this->layout = '//frontend/main-detail';

        $model = Post::findOne($id);

        return $this->render('post-view',[
            'model' => $model
        ]);
    }

    public function actionAbout()
    {
        $this->layout = '//frontend/main-detail';

        return $this->render('about');
    }

    public function actionContact()
    {
        $this->layout = '//frontend/main-detail';

        $model = new ContactForm();

        return $this->render('contact',[
            'model' => $model
        ]);
    }

    public function actionLogin()
    {
        if(Yii::$app->user->isGuest==false) {
            return $this->redirect(['admin/index']);            
        }
        
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
        $model = Provinsi::find()
        ->joinWith('manyInovasi')
        ->groupBy('inovasi.provinsi_id')
        ->andWhere('inovasi.provinsi_id IS NOT NULL')
        ->all();

        foreach ($model as $data) {
            echo $data->nama."</br>";
        }
    }

    public function actionError()
    {
        return $this->render('error');
    }

    public function actionImport()
    {
        
    }

}
