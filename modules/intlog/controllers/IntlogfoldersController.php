<?php

namespace app\modules\intlog\controllers;

use Yii;
use app\modules\intlog\models\Intlogfolders;
use app\modules\intlog\models\IntlogfoldersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\intlog\models\Rolememberof;
use app\modules\intlog\models\Rolemembers;
use app\modules\intlog\models\RolememberofSearch;
use app\modules\intlog\models\Users;
use app\modules\intlog\models\UsersSearch;
use yii\web\ForbiddenHttpException;
use yii\data\ActiveDataProvider;

/**
 * IntlogfoldersController implements the CRUD actions for Intlogfolders model.
 */
class IntlogfoldersController extends Controller
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
     * Lists all Intlogfolders models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (($this->checkUser()) !== 'intlog') {
            throw new ForbiddenHttpException('Access denied');
        }
        $searchModel = new IntlogfoldersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionRoles()
    {
        if (($this->checkUser()) !== 'intlog') {
            throw new ForbiddenHttpException('Access denied');
        }
        $searchModel = new RolememberofSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('roles', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

       // $roles = Rolememberof::find()->all();
       // return $this->render('roles',compact('roles'));


        //return $this->render('roles', [
        //   'searchModel' => $searchModel,
        //    'dataProvider' => $dataProvider,


    }

    public function actionUsers()
    {
        if (($this->checkUser()) !== 'intlog') {
            throw new ForbiddenHttpException('Access denied');
        }
        $searchModel = new UsersSearch();
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

    public function actionViewrole($role)
    {
        if (($this->checkUser()) !== 'intlog') {
            throw new ForbiddenHttpException('Access denied');
        }
        $model = Rolememberof::findAll([
            'role' => $role,
        ]);
        $model2 = Rolemembers::findAll([
            'role' => $role,
        ]);
/*
        return $this->render('viewrole', [
            'model' => $model,
        ]);*/
        $query = Rolememberof::find()
            ->where(['role' => $role]);



        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);
        return $this->render('viewrole', [
            'model' => $model,
            'model2' => $model2,
            'dataProvider' => $dataProvider,
        ]);


    }

    /**
     * Displays a single Intlogfolders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (($this->checkUser()) !== 'intlog') {
            throw new ForbiddenHttpException('Access denied');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionView2($folder)
    {
        if (($this->checkUser()) !== 'intlog') {
            throw new ForbiddenHttpException('Access denied');
        }
        #$model = new Intlogfolders();

     /*   $model = Intlogfolders::findAll([
            'folder' => 'O:\IntLog\93_LOR11\10_R11_Отдел_доставки',
            ]);*/
        $model = Intlogfolders::findAll([
            'folder' => $folder,
        ]);


        return $this->render('view2', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Intlogfolders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Intlogfolders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    /**
     * Updates an existing Intlogfolders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  /*  public function actionUpdate($id)
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
     * Deletes an existing Intlogfolders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  /*  public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Intlogfolders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Intlogfolders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Intlogfolders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function checkUser()
    {
        $users = array("11", "22", "Linux");
        if (in_array($_SERVER['AUTH_USER'], $users)) {
            return 'intlog';
        }
        return false;
    }
}
