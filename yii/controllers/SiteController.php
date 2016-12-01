<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegForm;
use app\models\ContactsForm;
use app\models\EntryForm;
use app\models\Blog;
use app\models\Products;
use yii\data\Pagination;
use yii\helpers\Url;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    
   public function init()
    {
        $this->on('beforeAction', function ($event) {
             if (Yii::$app->getUser()->isGuest) {
               $request = Yii::$app->getRequest();
            if  (!( strpos($request->getUrl(), 'login') !== false)) {
                 if  (!( strpos($request->getUrl(), 'logout') !== false))
                      if  (!( strpos($request->getUrl(), 'contacts') !== false))
                          Url::remember();
            }
             }
             
            // запоминаем страницу неавторизованного пользователя, чтобы потом отредиректить его обратно с помощью  goBack()
           
            
            
        });
    }
    
    
    
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
               
            ],
        ];
    }
    
   

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionIndex(){
        $mod= Products::find();
        
        $pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $mod->count(),
        ]);
        
        $model = $mod->orderBy('id DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
          return $this->render('index',[
              'model'=> $model,
              'pagination'=> $pagination,
          ]);
    }


    public function actionReg()
    {
        if (!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;
        $model =  new RegForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                if ($user->status === User::STATUS_ACTIVE):
                    if (Yii::$app->getUser()->login($user)):
                        return $this->goHome();
                    endif;
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации.');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            endif;
        endif;
        return $this->render(
            'reg',
            [
                'model' => $model
            ]
        );
    }



    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;

        $model =  new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()):
            return $this->goBack();
        endif;
        return $this->render(
            'login',
            [
                'model' => $model
            ]
        );
    }
    
    public function actionProduct(){
        $request = Yii::$app->request;
        $id = $request->get('id'); 
        $mod= Products::find()->where(['id'=>$id])->all();
        $session = Yii::$app->session;
        $cart= $session->get('cart');
        $isActive=1;
        for ($i=0;$i<count($cart);$i++){
            if ($id==$cart[$i]->id) $isActive=0;
        }
        if ($mod){
        return $this->render('product', [
            'model' => $mod,
            'isActive' =>  $isActive ,
        ]);
        }
        else {
            $this->goHome();
        }
        
    }
    
    public function actionCart(){
        $session = Yii::$app->session;
        $cart = $session->get('cart');
        
        return $this->render('cart',[
           'cart'=>$cart,
        ]);
    }
    
    public function actionAddtocart(){
         $request = Yii::$app->request;
           
            $id =  $request->post('id');
            $session = Yii::$app->session;
            $items= Products::find()->where(['id'=>$id])->all();
            $newItem=$items[0];
            $newItem->quantity=1;
            
        
            if (!$session->isActive)
                $session->open();
            $cart= $session->get('cart');
            if (!$cart){
                $cart= array( $newItem);
            }
            else{
                $isActive=1;
                for ($i=0;$i<count($cart);$i++){
                    if ($id==$cart[$i]->id) $isActive=0;
                }
                if ($isActive==1)
                array_push($cart, $newItem);
            }
            $session->set('cart',$cart);
             
             $data = ['successful'=>1, 'id'=>$id, 'count'=>count($cart)];
            return json_encode($data);
           
    }
    
    public function actionAddquantity(){
         $request = Yii::$app->request;
           
            $id =  $request->post('id');
            $quantity=$request->post('quantity');
          $session = Yii::$app->session;
          $cart= $session->get('cart');
          $cart[$id-1]->quantity=$quantity;
          $session->set('cart',$cart);
           
          global $total;
          for ($i=0;$i< count($cart);$i++){
          $total=$total+$cart[$i]->price*$cart[$i]->quantity;
             
        }
         $data = ['successful'=>1, 'price'=>$total];
            return json_encode($data);
    }
    
    public function actionDeleteprod(){
         $request = Yii::$app->request;
           
         $id =  $request->post('id');
         $session = Yii::$app->session;
         $cart= $session->get('cart');
         
         for ($i=$id-1;$i<count($cart)-1;$i++){
             $cart[$i]=$cart[$i+1];
         }
         unset($cart[count($cart)-1]);
        global $total;

          for ($i=0;$i< count($cart);$i++){
          $total=$total+$cart[$i]->price*$cart[$i]->quantity;
             
        }
         $data = ['successful'=>1, 'price'=>$total,'count'=>count($cart)];
         $session->set('cart',$cart);
         return json_encode($data);
    }
    
    public function actionHistory(){
        $mod = ContactsForm::find();
        
         $pagination = new Pagination([
            'defaultPageSize' => 15,
            'totalCount' => $mod->count(),
        ]);
        

         $model = $mod->orderBy('id DESC')->where(['user'=>Yii::$app->user->id])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        return $this->render('history',[
            'cart' => $model,
            'pagination' =>$pagination
        ]);
    }
    
    




    
    
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }




    
    public function actionContacts(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
         $session = Yii::$app->session;
        if (!$session->get('cart'))
            return $this->goHome();

        $model = new ContactsForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $session = Yii::$app->session;
            $ncart=  $session->get('cart');
            $cart= serialize($ncart);
            
            $date= date("F j, Y, g:i a");
            $model->load(['user' => Yii::$app->user->id], '');
            $model->load(['cart' => $cart], '');
            $model->load(['date' => $date], '');
            
            $model->save();
            $session->remove('cart');
            
            $mod= ContactsForm::find()->where(['date'=>$model->date])->all();
            $pur=$mod[0];
            return $this->render('success', [
                'model' =>$pur,
            ]);
        }
        return $this->render('contacts', [
            'model' => $model,
        ]);
    }



    
    public function actionPurchase(){
    $request = Yii::$app->request;
    $id = $request->get('id');
    $mod= ContactsForm::find()->where(['id'=>$id])->all();
    if (!$mod) return $this->goHome();
    $model=$mod[0];
    $model->cart = unserialize($model->cart);
    $total=0;
    for ($i=0;$i<count($model->cart);$i++){
        $total=$total+$model->cart[$i]->quantity*$model->cart[$i]->price;
    }
    return $this->render('purchase',[
        'model' => $model,
        'total' => $total,
    ]);


    }

    public function actionPurchaseadm(){
        $request = Yii::$app->request;
        $id = $request->get('id');
        $mod= ContactsForm::find()->where(['id'=>$id])->all();
        if (!$mod) return $this->goHome();
        $model=$mod[0];
        $model->cart = unserialize($model->cart);
        $total=0;
        for ($i=0;$i<count($model->cart);$i++){
            $total=$total+$model->cart[$i]->quantity*$model->cart[$i]->price;
        }
        return $this->render('purchaseadm',[
            'model' => $model,
            'total' => $total,
        ]);
    }


    public function actionAdminorders()
    {
        if (Yii::$app->user->id != 2)
            return $this->goHome();
        else {
            $mod = ContactsForm::find();

            $pagination = new Pagination([
                'defaultPageSize' => 40,
                'totalCount' => $mod->count(),
            ]);


            $model = $mod->orderBy('id DESC')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render('adminorders',[
                'cart' => $model,
                'pagination' =>$pagination
            ]);



        }
    }

    public function actionMakewhite(){
        $request = Yii::$app->request;

        $id =  $request->post('id');
        Yii::$app->db->createCommand()->update('contacts_form', ['shown' => 1], 'id = '.$id)->execute();
        $data =['success'=>1];

        return json_encode($data);
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
   

    /**
     * Login action.
     *
     * @return string
     */
 
    
}
