<?php

namespace app\models\language;

use Yii;
use yii\base\Model;

use app\models\ar\City;
use app\models\ar\Language;
use app\models\ar\Point;

class ChangeForCityForm extends Model {
    
    private $errorsArray = [];
    
    public $city_id;
    public $language_id;
    
    public function rules() {
        return [
            [['city_id', 'language_id'], 'safe'],
            [['city_id'], 'required', 'message' => 'Выберите город'],
            [['language_id'], 'required', 'message' => 'Выберите язык']
        ];
    }
    
    public function change() {
        $this->errorsArray = [];
        $model = new ChangeForCityForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $city = City::findOne($this->city_id);
            $language = Language::findOne($this->language_id);
            if (!$city) {
                $errorsArray[] = "Город с таким id не найден";
            }
            if (!$language) {
                $errorsArray[] = "Язык с таким id не найден";
            }
            if (count($this->errorsArray) == 0) {
                $points = $city->points;
                foreach ($points as $point) {
                    $point->link('language', $language);
                    $ok = $point->save();
                    if (!$ok) {
                        $this->errorsArray = array_merge($this->errorsArray, $point->getErrorSummary(true));
                        break;
                    }
                }  
            } 
        }
        return (empty($this->errorsArray));
    }
    
    public function getError() {
        return implode(',', $this->errorsArray);
    }
    
}



