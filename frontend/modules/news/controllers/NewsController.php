<?php

namespace app\modules\news\controllers;

use Yii;
use common\models\News;
use common\models\Categories;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\ForbiddenHttpException;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],           
        ];
    }

    public function actionIndex()
    {

        $query = News::find()->where('approved != 0');

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $query->count(),
        ]);

        $news = $query->orderBy('updated_at DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'news' => $news,
            'pagination' => $pagination,
        ]);

    }

    public function actionView($id)
    {
      return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
