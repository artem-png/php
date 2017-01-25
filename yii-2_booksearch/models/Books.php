<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 */
class Books extends \yii\db\ActiveRecord
{
    public $authorname;
    public $file;
    public $del_img;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_create', 'date_update', 'date', 'author_id','authorname'], 'required'],
            [['name', 'preview'], 'string'],
            [['date_create', 'date_update', 'date'], 'safe'],
            [['author_id'], 'integer'],
            [['del_img'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'preview' => 'Preview',
            'date' => 'Date',
            'author_id' => 'Author name',
            'authorname'=> 'Author name',
        ];
    }


    /**
     * Uploads file  in /img.
     *
     *
     */

    public function uploadFile($id){
        $this->file = UploadedFile::getInstance($this, 'preview');
        if ($this->file)
            $this->preview="/chamelion/web/img". "/".$this->file->baseName.".".$this->file->extension;
        else {
            $n= Books::findOne(["id"=>$id]);
            $this->preview=$n->preview;
        }
    }
    /**
     * Searching authors in db if found write his ID in author_id
     * if not found, make new
     * then saves the author
     *
     */

    public function authorValidation(){
        $namesurname=$this->authorname;
        $parts=  explode(" ", $namesurname);
        if (Author::find()->where(['firstname' => $parts[0],'lastname' => $parts[1]])->exists()) {
            $n= Author::findOne(["firstname"=>$parts[0],"lastname"=>$parts[1]]);
            $this->author_id=$n->id;

        }
        else {
            //createnew
            $author= new Author();
            $author->lastname=$parts[1];
            $author->firstname=$parts[0];
            $author->save();
            $this->author_id=Yii::$app->db->lastInsertID;
        }
    }

    /**
     * One to many
     *
     * @return authors
     */

    public function getAuthor(){
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
}
