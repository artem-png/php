<?php

namespace app\models;

use yii\base\Model;

class Status extends Model
{
    /**
     * class for rules Form
     */

    public $author;
    public $name;
    public $from;
    public $to;


    public function rules()
    {
        return [

            [['name', 'author','from','to'], 'default'],
        ];
    }

    public function attributeLabels()
    {

        return [
            'author' => 'Author',
            'name' => 'Book title',
            'from' => 'Date from',
            'to'=> 'Date to',
        ];
    }

    public function getPermissions() {
        return array (self::PERMISSIONS_PRIVATE=>'Private',self::PERMISSIONS_PUBLIC=>'Public');
    }

    public function getPermissionsLabel($permissions) {
        if ($permissions==self::PERMISSIONS_PUBLIC) {
            return 'Public';
        } else {
            return 'Private';
        }
    }
}
?>