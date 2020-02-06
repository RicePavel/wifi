<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Изменить настройки для всех точек одного города';

?>

<h2><?= $this->title ?></h2>

<div><?= ($error ? $error : '') ?></div>

<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'city_id')->dropDownList($cities)->label("Город") ?>
    <?= $form->field($model, 'language_id')->dropDownList($languages)->label("Язык по умолчанию") ?>
    <?= Html::submitButton("Изменить настройки") ?>
<?php ActiveForm::end() ?>

