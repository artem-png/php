<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public $quantity;
    
    function setQuantity($a){
        global $quantity;
        $quantity=$a;
    }
}