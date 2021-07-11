<?php

namespace app\modules\product\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string|null $content
 * @property float $price
 * @property string $img
 */

class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    /*public function getFocus1()
    {
        return $this->hasMany(Focus1::className(), ['id_product' => 'id']);
    }*/

    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content', 'price'], 'required'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['category_id'], 'number'],
            //[['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id' => 'category_id']],
            [['name'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'name' => 'Имя',
            'content' => 'Описание',
            'price' => 'Цена',
            'img' => 'Картинка',
            'min_price' => 'От',
            'max_price' => 'До',
            'category_id' => 'Категория',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(/*Указываем, с какой моделью конектим*/ Category::className(), ['id' => 'category_id']);
    }
    //public $image;
    public function upload($old_img){
        $id = $this->id;
        if($old_img != 'no-image.png'){
            unlink(str_replace("/png", "img", $old_img));
        }
        if (!file_exists("png/tovar/{$id}")){
            mkdir("png/tovar/{$id}");
        }
        $papka = "png/tovar/{$id}/";
        $this->img = UploadedFile::getInstance($this, 'img');
        $patch = uniqid()."_".uniqid();
        $this->img->saveAs($papka . $patch . "." . $this->img->extension);
        $this->img = '/' . $papka . $patch . "." . $this->img->extension;
    }

    public function create(){
        $id = $this->id;

        // Создаём товар.
        if (!file_exists("png/tovar")){
            mkdir("png/tovar");
        }
        
        // Создаём папку для конкретного товара
        mkdir("png/tovar/{$id}");

        // Закладываем в переменную
        $papka = "png/tovar/{$id}/";

        // Берём картинку, которую загружают
        $this->img = UploadedFile::getInstance($this, 'img');
        $patch = uniqid()."_".uniqid();
        $this->img->saveAs($papka . $patch . "." . $this->img->extension);
        $this->img = '/' . $papka . $patch . "." . $this->img->extension;
    }

    public function saveCategory($category_id)
    {
        // $this->category_id = $category_id;
        // return $this->save(false);

        $category = Category::findOne($category_id);
        if($category != null)
        {
            $this->link('category', $category);
            return true;
        }

    }


}
