<?php

namespace app\models;

use app\models\Author;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Books;


/**
 * BooksSearch represents the model behind the search form about `app\models\Books`.
 */
class BooksSearch extends Books
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
            [['name', 'date_create', 'date_update', 'preview', 'date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates array of data
     * @return array of Books and authors
     */
    public function search()
    {
        $array = Books::find()->all();
        return $array;
    }



    /**
     * Searching by order
     * $column - column
     * $order- DESC or ASC
     *
     * @return array of books
     */

    public function searchOrderBy($column,$order){


        if ($order=="true")
            $array = Books::find()->orderBy("$column DESC")->all();
        else
            $array = Books::find()->orderBy("$column ASC")->all();
        return $array;

    }
    /**
     * Searching by where
     * $rules- array of rules
     *
     *
     * @return array of books
     */

    public function searchWhere($rules){
        $array=null;
        if (!$rules) return $this->search();
        if (count($rules)==1) {
            $c1 = $rules[0]['column'];
            $v1 = $rules[0]['val'];
            $array = Books::find()->where("$c1 = :r", ["r" => $v1])->all();
        }
        else if (count($rules)==2){
              if ($rules[0]['column']=="from"){
                  $v1 = $rules[0]['val'];
                  $v2 = $rules[1]['val'];

                  $array = Books::find()->where(['between','date', $v1, $v2])->all();
              }
              else {

                  $c1 = $rules[0]['column'];
                  $v1 = $rules[0]['val'];
                  $c2 = $rules[1]['column'];
                  $v2 = $rules[1]['val'];
                  $array = Books::find()->where("$c1 = :r", ["r" => $v1])->andWhere("$c2 = $v2")->all();
              }
        }
        else if (count($rules)==3){
            $c1 = $rules[0]['column'];
            $v1 = $rules[0]['val'];
            $v2 = $rules[1]['val'];
            $v3 = $rules[2]['val'];
            $array = Books::find()->where("$c1 = :r", ["r" => $v1])->andWhere(['between','date', $v2, $v3])->all();


        }
        else {
            $c1 = $rules[0]['column'];
            $v1 = $rules[0]['val'];
            $c2 = $rules[1]['column'];
            $v2 = $rules[1]['val'];
            $v3 = $rules[2]['val'];
            $v4 = $rules[3]['val'];
            $array = Books::find()->where("$c1 = :r", ["r" => $v1])->andWhere("$c2 = $v2")->andWhere(['between','date', $v3, $v4])->all();

        }



        return $array;
    }

}
