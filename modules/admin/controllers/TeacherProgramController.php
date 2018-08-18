<?php

namespace app\modules\admin\controllers;

use app\modules\admin\services\manage\TeacherService;
use Yii;
use app\entities\TeacherProgram;
use app\search\TeacherProgramSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeacherProgramController implements the CRUD actions for TeacherProgram model.
 */
class TeacherProgramController extends Controller
{

    /**
     * {@inheritdoc}
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
     * Lists all TeacherProgram models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeacherProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TeacherProgram model.
     * @param integer $teachers_id
     * @param integer $programs_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($teachers_id, $programs_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($teachers_id, $programs_id),
        ]);
    }

    /**
     * Creates a new TeacherProgram model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model=new TeacherProgram();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'teachers_id' => $model->teachers_id, 'programs_id' => $model->programs_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TeacherProgram model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $teachers_id
     * @param integer $programs_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($teachers_id, $programs_id)
    {
        $model = $this->findModel($teachers_id, $programs_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'teachers_id' => $model->teachers_id, 'programs_id' => $model->programs_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TeacherProgram model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $teachers_id
     * @param integer $programs_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($teachers_id, $programs_id)
    {
        $this->findModel($teachers_id, $programs_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TeacherProgram model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $teachers_id
     * @param integer $programs_id
     * @return TeacherProgram the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($teachers_id, $programs_id)
    {
        if (($model = TeacherProgram::findOne(['teachers_id' => $teachers_id, 'programs_id' => $programs_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
