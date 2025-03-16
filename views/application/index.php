<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Application;

$this->title = 'Applications';

// Fetch all applications
$applications = Application::find()->all();
?>

<h1><?= Html::encode($this->title) ?></h1>

<!-- Create Application Form -->
<div class="application-form">
    <h3>Create New Application</h3>
    <?php $model = new Application(); ?>
    <?php $form = ActiveForm::begin(['action' => Url::to(['application/create']), 'method' => 'post']); ?>
    
    <?= $form->field($model, 'first_name')->textInput(['required' => true]) ?>
    <?= $form->field($model, 'last_name')->textInput(['required' => true]) ?>
    <?= $form->field($model, 'date_of_birth')->input('date', ['required' => true]) ?>
    <?= $form->field($model, 'description')->textarea() ?>
    <?= $form->field($model, 'income')->input('number', ['step' => '0.01']) ?>
    <?= $form->field($model, 'number_of_dependants')->input('number') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<hr>

<!-- List Applications -->
<h3>Existing Applications</h3>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Income</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($applications as $app): ?>
    <tr>
        <td><?= $app->id ?></td>
        <td><?= $app->first_name . ' ' . $app->last_name ?></td>
        <td><?= $app->date_of_birth ?></td>
        <td><?= $app->income ?></td>
        <td>
            <!-- Update Button (opens form) -->
            <button class="btn btn-primary btn-sm" onclick="showUpdateForm(<?= $app->id ?>)">Edit</button>
        </td>
    </tr>

    <!-- Hidden Update Form -->
    <tr id="update-form-<?= $app->id ?>" style="display: none;">
        <td colspan="5">
            <h4>Update Application #<?= $app->id ?></h4>
            <?php $updateModel = Application::findOne($app->id); ?>
            <?php $form = ActiveForm::begin(['action' => Url::to(['application/update', 'id' => $app->id]), 'method' => 'post']); ?>

            <?= $form->field($updateModel, 'first_name')->textInput() ?>
            <?= $form->field($updateModel, 'last_name')->textInput() ?>
            <?= $form->field($updateModel, 'date_of_birth')->input('date') ?>
            <?= $form->field($updateModel, 'description')->textarea() ?>
            <?= $form->field($updateModel, 'income')->input('number', ['step' => '0.01']) ?>
            <?= $form->field($updateModel, 'number_of_dependants')->input('number') ?>
            
            <div class="form-group">
                <?= Html::submitButton('Update', ['class' => 'btn btn-warning']) ?>
                <button type="button" class="btn btn-secondary" onclick="hideUpdateForm(<?= $app->id ?>)">Cancel</button>
            </div>

            <?php ActiveForm::end(); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- JavaScript to Show/Hide Update Form -->
<script>
function showUpdateForm(id) {
    document.getElementById('update-form-' + id).style.display = 'table-row';
}
function hideUpdateForm(id) {
    document.getElementById('update-form-' + id).style.display = 'none';
}
</script>
