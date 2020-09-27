<?php

namespace app\modules\cdc\controllers;

use Yii;
use app\modules\cdc\models\Cdcfolders;
use app\modules\cdc\models\CdcfoldersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\cdc\models\CdcusersSearch;
use yii\web\ForbiddenHttpException;

/**
 * CdcfoldersController implements the CRUD actions for Cdcfolders model.
 */
class CdcfoldersController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public $layout = 'main';

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
     * Lists all Cdcfolders models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (($this->checkUser()) !== 'cdc') {
            throw new ForbiddenHttpException('Access denied');
        }
        $searchModel = new CdcfoldersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cdcfolders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (($this->checkUser()) !== 'cdc') {
            throw new ForbiddenHttpException('Access denied');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionView2($folder)
    {
        if (($this->checkUser()) !== 'cdc') {
            throw new ForbiddenHttpException('Access denied');
        }
   /*     if (($this->checkUser()) !== 'intlog') {
            throw new ForbiddenHttpException('Access denied');
        }*/
        #$model = new Intlogfolders();

        /*   $model = Intlogfolders::findAll([
               'folder' => 'O:\IntLog\93_LOR11\10_R11_Отдел_доставки',
               ]);*/
        $model = Cdcfolders::findAll([
            'folder' => $folder,
        ]);



        return $this->render('view2', [
            'model' => $model,
        ]);
    }

    public function actionUsers()
    {
        if (($this->checkUser()) !== 'cdc') {
            throw new ForbiddenHttpException('Access denied');
        }
        $searchModel = new CdcusersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('users', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        // $roles = Rolememberof::find()->all();
        // return $this->render('roles',compact('roles'));


        //return $this->render('roles', [
        //   'searchModel' => $searchModel,
        //    'dataProvider' => $dataProvider,


    }

    /**
     * Creates a new Cdcfolders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   /* public function actionCreate()
    {
        if (($this->checkUser()) !== 'intlog') {
            throw new ForbiddenHttpException('Access denied');
        }
        $model = new Cdcfolders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    /**
     * Updates an existing Cdcfolders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   /* public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /**
     * Deletes an existing Cdcfolders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   /* public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Cdcfolders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cdcfolders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cdcfolders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function checkUser()
    {

        $users = array("11", "22", "Linux");
        if (in_array($_SERVER['AUTH_USER'], $users)) {
            return 'cdc';
        }
        return false;
    }
}
