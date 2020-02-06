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
   
   public function actionAdd() {     
       $model = new Point();
       if ($model != null && $model->load(Yii::$app->request->post())) {
           $ok = $model->save();
           if ($ok) {
               return $this->redirect(['point/list']);
           }
       } 
       return $this->render('add', ['model' => $model, 'cities' => $this->getCitiesSelect(), 'languages' => $this->getLanguagesSelect()]);
   }
   
   public function actionDelete() {
       $point_id = Yii::$app->request->post("point_id");
       $point = Point::findOne($point_id);
       if ($point != null) {
           $point->delete();
       }
       return $this->redirect(['point/list']);
   }
   
   public function actionChange($point_id) {       
       $model = Point::findOne($point_id);
       if ($model != null && $model->load(Yii::$app->request->post())) {
           $ok = $model->save();
           if ($ok) {
               return $this->redirect(['point/list']);
           }
       } 
       return $this->render('change', ['model' => $model, 'cities' => $this->getCitiesSelect(), 'languages' => $this->getLanguagesSelect()]);
   }
   
   private function getCitiesSelect() {
       $citiesModels = City::find()->orderBy(['name' => SORT_ASC])->all();
       $cities = [];
       foreach ($citiesModels as $cityModel) {
           $cities[$cityModel->city_id] = $cityModel->name;
       }
       return $cities;
   }
   
   private function getLanguagesSelect() {
       $languagesModels = Language::find()->all();
       $languages = [];
       foreach ($languagesModels as $languageModel) {
           $languages[$languageModel->language_id] = $languageModel->code;
       }
       return $languages;
   }
    
}
