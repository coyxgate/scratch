<?php

namespace app\modules\scratch\controllers;

use app\models\TblCampaigns;
use Yii;
use app\models\TblPrice;
use app\models\TblPriceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PriceController implements the CRUD actions for TblPrice model.
 */
class PriceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblPrice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPriceSearch();

        if(isset($_GET['campaign_id'])) {
            $campaign = TblCampaigns::findOne($_GET['campaign_id']);
            $searchModel->campaign_id = $campaign->id;
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(isset($_GET['campaign_id'])) {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'campaign'=>$campaign,
            ]);
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single TblPrice model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function upload($model)
    {
        if ($model->validate()) {
            $model->pic->saveAs('/scratch/web/upload/' . $this->pic->baseName . '.' . $this->pic->extension);
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Creates a new TblPrice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPrice();
        if(isset($_GET['campaign_id'])) {
            $campaign = TblCampaigns::findOne($_GET['campaign_id']);
            $model->campaign_id = $_GET['campaign_id'];
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'campaign_id' => $model->campaign_id]);
        } else {
            if(isset($_GET['campaign_id'])) {
                return $this->render('create', [
                    'model' => $model,
                    'campaign'=>$campaign,
                ]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        }
    }

    /**
     * Updates an existing TblPrice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'campaign_id' => $model->getCampaign()->one()->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->pic = UploadedFile::getInstance($model, 'pic');
            if ($model->upload()) {
                // file is uploaded successfully
                echo 'File is uploaded successfully.';
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Deletes an existing TblPrice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPrice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPrice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPrice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
