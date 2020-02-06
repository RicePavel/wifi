<?php

namespace app\models\ar;

use yii\db\ActiveRecord;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Point extends ActiveRecord {
    
    public function rules() {
        return [
            [['city_id', 'name', 'language_id'], 'required', 'message' => 'Обязательное поле'],
            [['name'], 'string', 'max' => 250, 'message' => 'Значение должно быть строкой', 'tooLong' => 'не более {max} символов'],
            [['language_id'], 'safe']
        ];
    }
    
    public function getCity() {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }
    
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['language_id' => 'language_id']);
    }
        
    public static function tableName() {
        return '{{point}}';
    }
    
}

