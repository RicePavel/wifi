<?php

namespace app\models\ar;

use yii\db\ActiveRecord;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Language extends ActiveRecord {
    
    public function rules() {
        return [
            [['name', 'code'], 'required', 'message' => 'Обязательное поле'],
            [['name', 'code'], 'string', 'max' => 250, 'message' => 'Значение должно быть строкой', 'tooLong' => 'не более {max} символов'],
        ];
    }
        
    public static function tableName() {
        return '{{language}}';
    }
    
}

