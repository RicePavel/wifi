<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'About';

?>

<h2>Точки доступа</h2>

<?php $form = ActiveForm::begin(['action' => ['point/add']]); ?>
    <?= Html::submitButton('Добавить новую точку доступа', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>

<br/><div></div><br/>

<table class="table">
    <tr>
        <th>Название</th>
        <th>Город</th>
        <th>Язык по умолчанию</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($points as $point) { ?>
        <tr>
            <td><?= $point->name ?></td>
            <td><?= $point->city->name ?></td>
            <td><?= $point->language->code ?></td>
            <td>
                <?php $form = ActiveForm::begin(['action' => ['point/change'], 'method' => 'get']); ?>
                    <input type="hidden" name="point_id" value="<?= $point->point_id ?>" />
                    <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </td>
            <td>
                <?php $deleteForm = ActiveForm::begin(['action' => ['point/delete']]); ?>
                    <input type="hidden" name="point_id" value="<?= $point->point_id ?>" />
                    <?= Html::submitButton('X', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Подтвердите удаление")']) ?>
                <?php ActiveForm::end(); ?>
            </td>
        </tr>
    <?php } ?>
</table>

