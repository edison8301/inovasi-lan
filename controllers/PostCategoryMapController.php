<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\PostCategoryMap;
use app\models\PostCategoryMapSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostCategoryMapController implements the CRUD actions for PostCategoryMap model.
 */
class PostCategoryMapController extends Controller
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
                        'actions' => ['index','create','view','update','delete'],
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
     * Lists all PostCategoryMap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostCategoryMapSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->get('export')) {
            return $this->exportExcel(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PostCategoryMap model.
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
     * Creates a new PostCategoryMap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PostCategoryMap();

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {

            $referrer = $_POST['referrer'];

            if($model->save()) {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect($referrer);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');

        }

        return $this->render('create', [
            'model' => $model,
            'referrer'=>$referrer
        ]);

    }

    /**
     * Updates an existing PostCategoryMap model.
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

            if($model->save())
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
     * Deletes an existing PostCategoryMap model.
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
     * Finds the PostCategoryMap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PostCategoryMap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PostCategoryMap::findOne($id)) !== null) {
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

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Post ID');
        $sheet->setCellValue('C3', 'Post Category ID');
        $sheet->setCellValue('D3', 'Active');

        $PHPExcel->getActiveSheet()->setCellValue('A1', 'Data PostCategoryMap');

        $PHPExcel->getActiveSheet()->mergeCells('A1:D1');

        $sheet->getStyle('A1:D3')->getFont()->setBold(true);
        $sheet->getStyle('A1:D3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $row = 3;
        $i=1;

        $searchModel = new PostCategoryMapSearch();

        foreach($searchModel->getQuerySearch($params)->all() as $data){
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->setCellValue('B' . $row, $data->post_id);
            $sheet->setCellValue('C' . $row, $data->post_category_id);
            $sheet->setCellValue('D' . $row, $data->active);
            
            $i++;
        }

        $sheet->getStyle('A3:D' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D3:D' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E3:D' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A3:D' . $row)->applyFromArray($setBorderArray);

        $path = 'exports/';
        $filename = time() . '_DataPenduduk.xlsx';
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save($path.$filename);
        return Yii::$app->getResponse()->redirect($path.$filename);
    }

}
