<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\SetPasswordForm;
use app\models\Pegawai;
use yii\filters\AccessControl;
use app\models\UserRole;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [  
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['set-password-guest'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index','create','delete','update','profil','view','set-password','aktif'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['profil','set-password'],
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex($id_user_role)
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id_user_role);

        if(Yii::$app->request->get('export')) {
            return $this->exportExcel(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'id_user_role' => $id_user_role,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_user_role=null)
    {
        $model = new User();

        $model->id_user_role = $id_user_role;

        if ($model->id_user_role === UserRole::ADMIN) {
            $model->model = 'Admin';
        }

        if ($model->id_user_role === UserRole::UNIT) {
            $model->model = 'Unit';
        }

        if ($model->id_user_role === UserRole::DEPUTI) {
            $model->model = 'Deputi';
        }

        $referrer = Yii::$app->request->referrer;

        if($model->load(Yii::$app->request->post())) {
            $referrer = $_POST['referrer'];

            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->token = Yii::$app->getSecurity()->generateRandomString(50);

            if($model->save(false)) {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect($referrer);    
            }
            
        }

        return $this->render('create', [
            'model' => $model,
            'referrer'=>$referrer
        ]);

    }

    public function actionProfil()
    {
        $user = User::getIdUser();

        return $this->render('profil', [
            'model' => $this->findModel($user),
        ]); 
    }

    public function actionSetPasswordGuest($id,$token)
    {
        $this->layout = '//backend/main-login';
        $user = $this->findModel($id);

        if ($user->token === $token) {
            $model = new SetPasswordForm();

            if ($model->load(Yii::$app->request->post()) AND $model->validate()) {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);    

                if ($user->save(false)) {
                    $user->setToken();
                    Yii::$app->session->setFlash('success','Password berhasil di simpan');
                    return $this->redirect(['/site/login']); 
                } else {
                    return $this->redirect(['/site/index']);
                }
            }

            return $this->render('set-password-guest', [
                'model' => $model,
            ]);
        } else {
            Yii::$app->session->setFlash('danger','Token tidak valid');
            return $this->redirect(['/site/index']); 
        }
    }

    public function actionSetPassword($id = null)
    {
        $model = new SetPasswordForm();

        if ($id !== null) {
            $user = $this->findModel($id);
        } else {
            $user = User::findOne(Yii::$app->user->identity);
        }

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $referrer = $_POST['referrer'];

            $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            
            if ($user->save(false)) {
                \Yii::$app->session->setFlash('success','Password berhasil disimpan');
                return $this->redirect($referrer);
            } else {
                print_r($user->getErrors());
            }
        }

        return $this->render('set-password', [
            'model' => $model,
            'referrer'=>$referrer
        ]);
    }

    public function actionAktif($id)
    {
        $model = $this->findModel($id);

        /*if ($token !== null AND $model->token == $token) {
            $model->status = User::AKTIF;
            $model->save();
        }

        if ($token == null) {
            $model->status = User::AKTIF;
            $model->save();
        }*/

        if ($model !== null) {
            $model->status = User::AKTIF;
            $model->save(false);
            Yii::$app->session->setFlash('success','User berhasil di Aktifkan');
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->redirect(Yii::$app->request->referrer);
        }

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {

            $referrer = $_POST['referrer'];

            if($model->save(false))
            {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect($referrer);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');


        }

        return $this->render('update', [
            'model' => $model,
            'referrer'=>$referrer
        ]);

    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($model->delete()) {
            Yii::$app->session->setFlash('success','Data berhasil dihapus');
        } else {
            Yii::$app->session->setFlash('error','Data gagal dihapus');
        }

        return $this->redirect(Yii::$app->request->referrer);


    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function exportExcel($params)
    {
        $PHPExcel = new \PHPExcel();

        $PHPExcel->setActiveSheetIndex();

        $sheet = $PHPExcel->getActiveSheet();

        $sheet->getDefaultStyle()->getAlignment()->setWrapText(true);
        $sheet->getDefaultStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $setBorderArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );


        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Role');
        $sheet->setCellValue('C3', 'Kode Pegawai');
        $sheet->setCellValue('D3', 'Username');
        $sheet->setCellValue('E3', 'Password');
        $sheet->setCellValue('F3', 'Nama');
        $sheet->setCellValue('G3', 'Email');
        $sheet->setCellValue('H3', 'Auth Key');
        $sheet->setCellValue('I3', 'Access Token');

        $PHPExcel->getActiveSheet()->setCellValue('A1', 'Data User');

        $PHPExcel->getActiveSheet()->mergeCells('A1:I1');

        $sheet->getStyle('A1:I3')->getFont()->setBold(true);
        $sheet->getStyle('A1:I3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $row = 3;
        $i=1;

        $searchModel = new UserSearch();

        foreach($searchModel->getQuerySearch($params)->all() as $data){
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->setCellValue('B' . $row, $data->role);
            $sheet->setCellValue('C' . $row, $data->kode_pegawai);
            $sheet->setCellValue('D' . $row, $data->username);
            $sheet->setCellValue('E' . $row, $data->password);
            $sheet->setCellValue('F' . $row, $data->nama);
            $sheet->setCellValue('G' . $row, $data->email);
            $sheet->setCellValue('H' . $row, $data->auth_key);
            $sheet->setCellValue('I' . $row, $data->access_token);
            
            $i++;
        }

        $sheet->getStyle('A3:I' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D3:I' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E3:I' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A3:I' . $row)->applyFromArray($setBorderArray);

        $path = 'exports/';
        $filename = time() . '_DataPenduduk.xlsx';
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save($path.$filename);
        return Yii::$app->getResponse()->redirect($path.$filename);
    }

}
