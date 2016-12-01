<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;



class ContactsForm extends ActiveRecord
{
   /* public $address;
    public $phone;
    public $user;
    public $cart;*/



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['address', 'phone','cart','user','date'], 'required'],

        ];
    }
    
    public function db(){
         /*global $address,$phone,$user,$cart;
        $con= new Contacts();
        $user=Yii::$app->user->id;
        $session = Yii::$app->session;
        $ncart=  $session->get('cart');
        $cart= serialize($ncart);
       
        
        $con->setAddr($address);
        $con->setPhone($phone);
        $con->setUser($user);
        $con->setCart($cart);
        $con->save();
        
        return true;*/
    }


}
