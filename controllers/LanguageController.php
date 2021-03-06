<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\ar\City;
use app\models\ar\Language;
use app\models\ar\Point;
use app\models\language\ChangeForCityForm;
use app\models\language\ChangeForAllForm;

class LanguageController extends Controller {
    
    public function actionStart() {
        return $this->render('start');
    }
    
    public function actionChange_for_city() {
        
        $model = new ChangeForCityForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $ok = $model->change();
            if ($ok) {
                Yii::$app->session->setFlash("success", "Настройки изменены");
                return $this->redirect(['language/start']);
            }    
        }
        
        $citiesModels = City::find()->all();
        $languagesModels = Language::find()->all();
        $cities = ["" => ""];
        $languages = ["" => ""];
        foreach ($citiesModels as $cityModel) {
            $cities[$cityModel->city_id] = $cityModel->name;
        }
        foreach ($languagesModels as $languageModel) {
            $languages[$languageModel->language_id] = $languageModel->code;
        }
        
        return $this->render('change_for_city', ['model' => $model, 'error' => $model->getError(), 'cities' => $cities, 'languages' => $languages]);
    }
    
    public function actionChange_for_all() {
        $model = new ChangeForAllForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $ok = $model->change();
            if ($ok) {
                Yii::$app->session->setFlash("success", "Настройки изменены");
                return $this->redirect(['language/start']);
            }  
        }
        $languagesModels = Language::find()->all();
        $languages = ["" => ""];
        foreach ($languagesModels as $languageModel) {
            $languages[$languageModel->language_id] = $languageModel->code;
        }
        
        return $this->render('change_for_all', ['model' => $model, 'error' => $model->getError(), 'languages' => $languages]);
    }
    
   
    
}

