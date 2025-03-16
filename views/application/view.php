<?php
/** @var yii\web\View $this */
/** @var app\models\Application $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Application Details: " . Html::encode($model->first_name . " " . $model->last_name);
?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Back to List', ['application/index'], ['class' => 'btn btn-secondary']) ?>
</p>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= Html::encode($model->id) ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= Html::encode($model->first_name) ?></td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td><?= Html::encode($model->last_name) ?></td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td><?= Html::encode($model->date_of_birth) ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?= Html::encode($model->description) ?></td>
    </tr>
    <tr>
        <th>Income</th>
        <td><?= Html::encode($model->income) ?></td>
    </tr>
    <tr>
        <th>Number of Dependants</th>
        <td><?= Html::encode($model->number_of_dependants) ?></td>
    </tr>
    <tr>
        <th>Created At</th>
        <td><?= Html::encode($model->created_at) ?></td>
    </tr>
    <tr>
        <th>Updated At</th>
        <td><?= Html::encode($model->updated_at) ?></td>
    </tr>
</table>
