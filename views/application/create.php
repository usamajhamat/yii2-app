<?php
/** @var yii\web\View $this */
/** @var app\models\Application $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create New Application';
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'date_of_birth')->input('date') ?>
<?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
<?= $form->field($model, 'income')->input('number', ['step' => '0.01']) ?>
<?= $form->field($model, 'number_of_dependants')->input('number') ?>

<div class="form-group">
    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
