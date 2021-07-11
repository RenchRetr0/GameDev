<?php

namespace app\modules\product\controllers;

use Yii;
use app\modules\product\models\Product;
use app\modules\product\models\ProductSearch;
use app\modules\product\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

class DefaultController extends Controller{

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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $article = $this->findModel($id);
        /*$model = $article->category->title;
        var_dump($model);
        exit;*/
        //var_dump($article->category->title);
        return $this->render('view', [
            'model' => $model,
            //'title' => $title,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->save(false);
            $model->create();
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_img = $model->img;

        if ($model->load(Yii::$app->request->post())/* && $model->save()*/) {
            $tovar = UploadedFile::getInstance($model, 'img');
            if($tovar){
                //unlink($old_img);
                $model->upload($old_img);
            } else {
                $model->img = $old_img;
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);



        if(file_exists("img/tovar/{$id}")){
            //$model->dalete($id);
            //$id = $this->id;
            //var_dump($model->img);
            unlink(str_replace("/img", "img", $model->img));
            rmdir("img/tovar/{$id}");
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    // Твои нововедения

    public function actionFilter(){
        
        $product = Product::find()
        ->with('katalog')
        ->where(['url'=>$id]);
        //->one();
        //var_dump($katalog);
        return $this->redirect('index', ['product'=>$product]);
    }
    //Твои нововедения

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetCategory($id)
    {
        /*$category = Category::findOne(2);
        var_dump($category->product);
        exit;*/
        $article = $this->findModel($id);

        $selectedCategory = $article->category->id;

        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');

        if(Yii::$app->request->isPost)
        {
            $category = Yii::$app->request->post('category');
            if($article->saveCategory($category))
            {
                return $this->redirect(['view', 'id'=>$article->id]);
            }
            return $this->redirect(['view', 'id'=>$article->id]);
        }
        
        return $this->render('category', [
            'article' => $article,
            'selectedCategory' => $selectedCategory,
            'categories' => $categories,
        ]);
        
    }

}