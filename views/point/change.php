<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Изменить настройки';

$form = ActiveForm::begin();

?>

<h2><?= $this->title ?></h2>

<?php if ($model != null) { ?>

    <?= $form->field($model, 'name')->textInput(['disabled' => true])->label("Название") ?>
    <?= $form->field($model, 'city_id')->dropDownList($cities, ['disabled' => true])->label("Город") ?>
    <?= $form->field($model, 'language_id')->dropDownList($languages)->label("Язык по умолчанию") ?>
    <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>

<?php } else { ?>
    <h3>Точка доступа с таким id не найдена</h3>
<?php } ?>

<?php ActiveForm::end(); ?>
