<?php

namespace app\models\ar;

use yii\db\ActiveRecord;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class City extends ActiveRecord {
    
    public function rules() {
        return [
            [['city', 'name'], 'required', 'message' => 'Обязательное поле'],
            [['name'], 'string', 'max' => 250, 'message' => 'Значение должно быть строкой', 'tooLong' => 'не более {max} символов'],
        ];
    }
        
    public static function tableName() {
        return '{{city}}';
    }
    
    public function getPoints() {
        return $this->hasMany(Point::className(), ['city_id' => 'city_id']);
    }
    
}

