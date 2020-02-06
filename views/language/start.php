<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Изменить настройки';

?>

<?php $form = ActiveForm::begin(['action' => ['language/change_for_city']]) ?>
    <?= Html::submitButton('Изменить настройки для точек одного города', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>

<br/>
<div></div>
<br/>

<?php $form = ActiveForm::begin(['action' => ['language/change_for_all']]) ?>
    <?= Html::submitButton('Изменить настройки для всех точек', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>

