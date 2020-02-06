<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\ar\Point;
use app\models\ar\Language;
use app\models\ar\City;

class PointController extends Controller {
    
   public function actionList() {
       $points = Point::find()->with(['city', 'language'])->all();
       return $this->render('list', ['points' => $points]);
   }
   
   public function actionChange($point_id) {
       $citiesModels = City::find()->all();
       $languagesModels = Language::find()->all();
       $cities = [];
       $languages = [];
       foreach ($citiesModels as $cityModel) {
           $cities[$cityModel->city_id] = $cityModel->name;
       }
       foreach ($languagesModels as $languageModel) {
           $languages[$languageModel->language_id] = $languageModel->code;
       }
       
       $model = Point::findOne($point_id);
       if ($model != null && $model->load(Yii::$app->request->post())) {
           $ok = $model->save();
           if ($ok) {
               return $this->redirect(['point/list']);
           }
       } 
       return $this->render('change', ['model' => $model, 'cities' => $cities, 'languages' => $languages]);
   }
    
}
