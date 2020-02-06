<?php

namespace app\models\language;

use Yii;
use yii\base\Model;

use app\models\ar\City;
use app\models\ar\Language;
use app\models\ar\Point;

class ChangeForAllForm extends Model {
    
    private $errorsArray = [];
    
    public $language_id;
    
    public function rules() {
        return [
            [['language_id'], 'safe'],
            [['language_id'], 'required', 'message' => 'Выберите язык']
        ];
    }
    
    public function change() {
        $this->errorsArray = [];
        $language = Language::findOne($this->language_id);
        if (!$language) {
            $this->errorsArray[] = "Язык с таким id не найден";
        }
        if (count($this->errorsArray) == 0) {
            $points = Point::find()->all();
            foreach ($points as $point) {
                $point->link('language', $language);
                $ok = $point->save();
                if (!$ok) {
                    $this->errorsArray = array_merge($this->errorsArray, $point->getErrorSummary(true));
                    break;
                }
            }  
        }
        return (empty($this->errorsArray));
    }
    
    public function getError() {
        return implode(',', $this->errorsArray);
    }
    
}



