<?php

namespace app\controllers;

use app\models\Product;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }




// show all products

    public function actionIndex()
    {
        $query = Product::find();



        $products = $query
            ->all();

        return $this->render('index', [
            'products' => $products,
        ]);


    }


    public function actionUpdateproductname(){
        $this->enableCsrfValidation = false;
        $request = Yii::$app->request;

        $id = $request->post('id');
        $name =  $request->post('name');

        Product::updateAll(['name' => $name], ['like', 'id', ''.$id]);

        $data = ['successful'=>1];
        return json_encode($data);
    }

    public function actionUpdateproductcategory(){
        $this->enableCsrfValidation = false;
        $request = Yii::$app->request;

        $id = $request->post('id');
        $name =  $request->post('name');

        Product::updateAll(['category' => $name], ['like', 'id', ''.$id]);

        $data = ['successful'=>1];
        return json_encode($data);
    }

    public function actionUpdateproductprice(){
        $this->enableCsrfValidation = false;
        $request = Yii::$app->request;

        $id = $request->post('id');
        $name =  $request->post('name');

        Product::updateAll(['price' => $name], ['like', 'id', ''.$id]);

        $data = ['successful'=>1];
        return json_encode($data);
    }

    public function actionDeleteproduct(){
        $this->enableCsrfValidation = false;
        $request = Yii::$app->request;

        $id = $request->post('id');

        Product::deleteAll(['id' => $id]);
        $product = new Product();

        $data = ['successful'=>1];
        return json_encode($data);
    }


    public function actionAddproduct(){
        $this->enableCsrfValidation = false;
        $request = Yii::$app->request;
        $name=$request->post('name');
        $category=$request->post('category');
        $price=$request->post('price');
       // if ($price==null) $price=-999999;
        //$prevId =  Yii::$app->db->getLastInsertId();
        Yii::$app->db->createCommand()->insert('product', [
            'name' => ''.$name,
            'category' => ''.$category,
            'price' => ''.$price,
        ])->execute();


        $id = Yii::$app->db->getLastInsertId();


        $data = ['successful'=>1, 'id'=>$id];
        return json_encode($data);

    }








    /*  public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }*/

}
