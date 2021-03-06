<?php

namespace app\modules\admin\controllers;

use app\modules\admin\services\manage\ImageService;
use app\repositories\ImageRepository;
use Yii;
use app\entities\Teachers;
use app\search\TeachersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\forms\teachers\CreateForm;
use app\modules\admin\services\manage\TeacherService;
use app\modules\admin\forms\image\ImageCreateForm;
use app\modules\admin\forms\teachers\EditForm;

/**
 * TeachersController implements the CRUD actions for Teachers model.
 */
class TeachersController extends Controller
{

    public $service;
    public $imageService;

    public function __construct(string $id, $module, TeacherService $service,ImageService $imageService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service=$service;
        $this->imageService=$imageService;
    }
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
     * Lists all Teachers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeachersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teachers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Teachers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $form=new CreateForm();
        $imageForm=new ImageCreateForm();
        $imageRepository=new ImageRepository();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try{
                $teacher=$this->service->create($form);
                return $this->redirect(['view', 'id' => $teacher->id]);
            }catch (\DomainException $e){
                Yii::error($e);
                Yii::$app->session->setFlash('error','Учитель не сохранен');
            }
        }
        return $this->render('create', [
            'model' => $form,
            'imageRepository'=>$imageRepository,
            'image_id'=>null,
            'imageForm'=>$imageForm
        ]);
    }

    /**
     * Updates an existing Teachers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $teacher = $this->findModel($id);
        $form=new EditForm($teacher);
        $imageForm=new ImageCreateForm();
        $imageRepository=new ImageRepository();
        if ($form->load(Yii::$app->request->post()) && $form->validate()){
            try{
                $this->service->edit($teacher->id,$form);
                return $this->redirect(['view', 'id' => $teacher->id]);
            }catch (\DomainException $e){
                Yii::error($e);
                Yii::$app->session->setFlash('error','Изменения не применены');
            }

        }

        return $this->render('update', [
            'model' => $form,
            'imageRepository'=>$imageRepository,
            'image_id'=>$teacher->image->id,
            'imageForm'=>$imageForm,
            'teacher'=>$teacher
        ]);
    }

    /**
     * Deletes an existing Teachers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teachers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teachers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teachers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
