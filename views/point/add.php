<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавить точку доступа';

$form = ActiveForm::begin();

?>

<h2><?= $this->title ?></h2>

<?= $form->field($model, 'name')->textInput()->label("Название") ?>
<?= $form->field($model, 'city_id')->dropDownList($cities)->label("Город") ?>
<?= $form->field($model, 'language_id')->dropDownList($languages)->label("Язык по умолчанию") ?>
<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
