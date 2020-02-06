<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;

use app\models\ar\Point;
use app\models\ar\Language;
use app\models\ar\City;

class Point_apiController extends Controller {
    
    public function actionGet($point_id) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $point = Point::findOne($point_id);
        $lang = "";
        if ($point != null) {
            $lang = $point->language->code;
        }
        return $lang;
    }
    
}

