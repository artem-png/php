<?php

namespace app\controllers;

use app\models\Author;
use app\models\SearchForm;
use app\models\Status;
use Yii;
use app\models\Books;
use app\models\BooksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;


/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends Controller
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
     * Lists all Books models. If rules - lists all books with this rules
     * @return books
     */


    public function actionIndex()
    {
        $searchModel = new BooksSearch();
        $model = new Status();


        if ($model->load(Yii::$app->request->post())){
            $rules=null;
            $i=0;
            if  ($model->name){
                $rules[$i]['column']="name";
                $rules[$i++]['val']=$model->name;
            }
            if ($model->author) {

                $parts = explode(" ", $model->author);
                if (count($parts)==2)
                if (Author::find()->where(['firstname' => $parts[0], 'lastname' => $parts[1]])->exists()) {
                    $n = Author::findOne(["firstname" => $parts[0], "lastname" => $parts[1]]);
                    if ($n) {
                        $rules[$i]['column'] = "author_id";
                        $rules[$i++]['val'] = $n->id;
                    }
                    else {
                        $rules[$i]['column'] = "author_id";
                        $rules[$i++]['val'] = -1;
                    }

                }
                else {
                    $rules[$i]['column'] = "author_id";
                    $rules[$i++]['val'] = -1;
                }

            }
            if ($model->from && $model->to){
                $rules[$i]['column']="from";
                $rules[$i++]['val']=$model->from;
                $rules[$i]['column']="to";
                $rules[$i]['val']=$model->to;
            }

            $dataProvider = $searchModel->searchWhere($rules);


        }



        else {


            $dataProvider = $searchModel->search();
        }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);

    }



    /**
     * Displays a single Books model.
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
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest){
            $this->goHome();
        }
        $model = new Books();
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search();


        if ($model->load(Yii::$app->request->post())) {
            $model->uploadFile(0);
            $model->authorValidation();
            $model->date_create=date("Y-m-d");
            $model->date_update=date("Y-m-d");
            $model->save();

            $path = Yii::$app->params['pathUploads'] . "/";
            $model->file->saveAs( $path . $model->file);
            return $this->redirect(['index',  'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $session= $this->sessionInit();
        $this->setValuesInSession();
        if (Yii::$app->user->isGuest){

            $this->goHome();
        }
        $model = $this->findModel($id);
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search();


        if ($model->load(Yii::$app->request->post()) ) {
            $model->date_update=date("Y-m-d");
            $model->uploadFile($id);
            $model->authorValidation();
            $model->save();



            return $this->redirect(['index',
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Books model.
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
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Books::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Deletes book by its ID
     * @return 1 if successfull
     */

    public function actionDeletebook(){
        if (Yii::$app->user->isGuest){
            $this->goHome();
        }
        else {
            $this->enableCsrfValidation = false;
            $request = Yii::$app->request;

            $id = $request->post('id');

            Books::deleteAll(['id' => $id]);

            $data = ['successful' => 1];
            return json_encode($data);
        }
    }



    /**
     * Sorts list of books by name
     * @return books sorted by name
     */

    public function actionSortbyname(){
        $session=$this->sessionInit();
        $searchModel = new BooksSearch();
        $model = new Status();

        $dataProvider = $searchModel->searchOrderBy("name",$session->get('name'));

        if ($session->get('name')=="true")
            $session->set('name','false');
        else
            $session->set('name','true');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);

    }

    /**
     * Sorts list of books by date
     * @return books sorted by date
     */


    public function actionSortbydate(){
        $session=$this->sessionInit();
        $model = new Status();

        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->searchOrderBy("date",$session->get('date'));
        if ($session->get('date')=="true")
            $session->set('date','false');
        else
            $session->set('date','true');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,

        ]);
    }


    /**
     * Sorts list of books by dateupload
     * @return books sorted by dateupload
     */

    public function actionSortbyupload(){
        $session=$this->sessionInit();
        $model = new Status();

        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->searchOrderBy("date_create",$session->get('upload'));
        if ($session->get('upload')=="true")
            $session->set('upload','false');
        else
            $session->set('upload','true');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);


    }


    /**
     * Init session and assign default values
     * @return session
     */


    public function sessionInit(){
        $session = Yii::$app->session;
        if ($session->isActive) {
            $session->open();
            $session->set('name', 'true');
            $session->set('author', 'true');
            $session->set('date', 'true');
            $session->set('upload', 'true');
        }
        return $session;
    }


    /**
     * Sets another values to session variables. if true= false, if false=true
     *
     */

    public function setValuesInSession(){
        $session = Yii::$app->session;
        if ($session->isActive) {
            $session->open();
            $session->set('name', 'true');
            $session->set('author', 'true');
            $session->set('date', 'true');
            $session->set('upload', 'true');
        }
        if ($session->get('upload')=="true")
            $session->set('upload','false');
        else
            $session->set('upload','true');
        if ($session->get('date')=="true")
            $session->set('date','false');
        else
            $session->set('date','true');
        if ($session->get('name')=="true")
            $session->set('name','false');
        else
            $session->set('name','true');
    }

}
