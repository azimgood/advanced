<?php

namespace app\modules\news\modules\approve\controllers;

use common\models\News;
use common\models\NewsSearch;
use yii\web\ForbiddenHttpException;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ApproveController extends \yii\web\Controller
{
    public function actionIndex()
    {
      $searchModel = new NewsSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('approve', [
                'model' => $model,
            ]);
        }
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
