<?php

namespace app\controllers;

use Yii;
use app\models\Inovasi;
use app\models\InovasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * InovasiController implements the CRUD actions for Inovasi model.
 */
class InovasiController extends Controller
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
     * Lists all Inovasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InovasiSearch();
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
     * Displays a single Inovasi model.
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
     * Creates a new Inovasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inovasi();

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {

            $referrer = $_POST['referrer'];

            $model->saveGambar();
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
     * Updates an existing Inovasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $referrer = Yii::$app->request->referrer;
        $gambar_ilustrasi_lama = $model->gambar_ilustrasi;

        if ($model->load(Yii::$app->request->post())) {

            $referrer = $_POST['referrer'];

            if ($gambar_ilustrasi_lama !== null) {
                $model->updateGambar($gambar_ilustrasi_lama);
            } else {
                $model->saveGambar();
            }

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
     * Deletes an existing Inovasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        /*
        * uncomment if you want to delete picture in directory after delete data 
        */

        // $model->deletGambar();
        if($model->delete()) {
            Yii::$app->session->setFlash('success','Data berhasil dihapus');
        } else {
            Yii::$app->session->setFlash('error','Data gagal dihapus');
        }

        return $this->redirect(Yii::$app->request->referrer);


    }

    /**
     * Finds the Inovasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inovasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inovasi::findOne($id)) !== null) {
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
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(20);
        $sheet->getColumnDimension('N')->setWidth(20);
        $sheet->getColumnDimension('O')->setWidth(20);
        $sheet->getColumnDimension('P')->setWidth(20);
        $sheet->getColumnDimension('Q')->setWidth(20);
        $sheet->getColumnDimension('R')->setWidth(20);
        $sheet->getColumnDimension('S')->setWidth(20);
        $sheet->getColumnDimension('T')->setWidth(20);
        $sheet->getColumnDimension('U')->setWidth(20);
        $sheet->getColumnDimension('V')->setWidth(20);
        $sheet->getColumnDimension('W')->setWidth(20);
        $sheet->getColumnDimension('X')->setWidth(20);
        $sheet->getColumnDimension('Y')->setWidth(20);
        $sheet->getColumnDimension('Z')->setWidth(20);
        $sheet->getColumnDimension('AA')->setWidth(20);
        $sheet->getColumnDimension('AB')->setWidth(20);
        $sheet->getColumnDimension('AC')->setWidth(20);
        $sheet->getColumnDimension('AD')->setWidth(20);
        $sheet->getColumnDimension('AE')->setWidth(20);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Kategori ID');
        $sheet->setCellValue('C3', 'Jenis Inovasi ID');
        $sheet->setCellValue('D3', 'Nama Inovasi');
        $sheet->setCellValue('E3', 'Produk Inovasi');
        $sheet->setCellValue('F3', 'Penggagas');
        $sheet->setCellValue('G3', 'Kelompok Inovator ID');
        $sheet->setCellValue('H3', 'Deskripsi');
        $sheet->setCellValue('I3', 'Nama Instansi');
        $sheet->setCellValue('J3', 'Unit Instansi');
        $sheet->setCellValue('K3', 'Tahun Inisiasi');
        $sheet->setCellValue('L3', 'Tahun Implementasi');
        $sheet->setCellValue('M3', 'Faktor Pendorong');
        $sheet->setCellValue('N3', 'Faktor Penghambat');
        $sheet->setCellValue('O3', 'Tahapan Proses');
        $sheet->setCellValue('P3', 'Output');
        $sheet->setCellValue('Q3', 'Outcome');
        $sheet->setCellValue('R3', 'Manfaat');
        $sheet->setCellValue('S3', 'Prasyarat Replikasi');
        $sheet->setCellValue('T3', 'Kontak');
        $sheet->setCellValue('U3', 'Sumber');
        $sheet->setCellValue('V3', 'Teknik Validasi ID');
        $sheet->setCellValue('W3', 'Status Inovasi ID');
        $sheet->setCellValue('X3', 'Gambar Ilustrasi');
        $sheet->setCellValue('Y3', 'Jumlah Dilihat');
        $sheet->setCellValue('Z3', 'Jumlah Diunduh');
        $sheet->setCellValue('AA3', 'Tanggal Inovasi');
        $sheet->setCellValue('AB3', 'Member ID');
        $sheet->setCellValue('AC3', 'Waktu Dibuat');
        $sheet->setCellValue('AD3', 'Waktu Diterbitkan');
        $sheet->setCellValue('AE3', 'Waktu Diubah');

        $PHPExcel->getActiveSheet()->setCellValue('A1', 'Data Inovasi');

        $PHPExcel->getActiveSheet()->mergeCells('A1:AE1');

        $sheet->getStyle('A1:AE3')->getFont()->setBold(true);
        $sheet->getStyle('A1:AE3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $row = 3;
        $i=1;

        $searchModel = new InovasiSearch();

        foreach($searchModel->getQuerySearch($params)->all() as $data){
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->setCellValue('B' . $row, $data->kategori_id);
            $sheet->setCellValue('C' . $row, $data->jenis_inovasi_id);
            $sheet->setCellValue('D' . $row, $data->nama_inovasi);
            $sheet->setCellValue('E' . $row, $data->produk_inovasi);
            $sheet->setCellValue('F' . $row, $data->penggagas);
            $sheet->setCellValue('G' . $row, $data->kelompok_inovator_id);
            $sheet->setCellValue('H' . $row, $data->deskripsi);
            $sheet->setCellValue('I' . $row, $data->nama_instansi);
            $sheet->setCellValue('J' . $row, $data->unit_instansi);
            $sheet->setCellValue('K' . $row, $data->tahun_inisiasi);
            $sheet->setCellValue('L' . $row, $data->tahun_implementasi);
            $sheet->setCellValue('M' . $row, $data->faktor_pendorong);
            $sheet->setCellValue('N' . $row, $data->faktor_penghambat);
            $sheet->setCellValue('O' . $row, $data->tahapan_proses);
            $sheet->setCellValue('P' . $row, $data->output);
            $sheet->setCellValue('Q' . $row, $data->outcome);
            $sheet->setCellValue('R' . $row, $data->manfaat);
            $sheet->setCellValue('S' . $row, $data->prasyarat_replikasi);
            $sheet->setCellValue('T' . $row, $data->kontak);
            $sheet->setCellValue('U' . $row, $data->sumber);
            $sheet->setCellValue('V' . $row, $data->teknik_validasi_id);
            $sheet->setCellValue('W' . $row, $data->status_inovasi_id);
            $sheet->setCellValue('X' . $row, $data->gambar_ilustrasi);
            $sheet->setCellValue('Y' . $row, $data->jumlah_dilihat);
            $sheet->setCellValue('Z' . $row, $data->jumlah_diunduh);
            $sheet->setCellValue('AA' . $row, $data->tanggal_inovasi);
            $sheet->setCellValue('AB' . $row, $data->member_id);
            $sheet->setCellValue('AC' . $row, $data->waktu_dibuat);
            $sheet->setCellValue('AD' . $row, $data->waktu_diterbitkan);
            $sheet->setCellValue('AE' . $row, $data->waktu_diubah);
            
            $i++;
        }

        $sheet->getStyle('A3:AE' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D3:AE' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E3:AE' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A3:AE' . $row)->applyFromArray($setBorderArray);

        $path = 'exports/';
        $filename = time() . '_DataPenduduk.xlsx';
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save($path.$filename);
        return Yii::$app->getResponse()->redirect($path.$filename);
    }

}
