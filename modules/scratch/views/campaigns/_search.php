<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblCampaignsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-campaigns-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'keyword') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'contact_us_info') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'start_at') ?>

    <?php // echo $form->field($model, 'end_at') ?>

    <?php // echo $form->field($model, 'hints') ?>

    <?php // echo $form->field($model, 'duplicate_reply') ?>

    <?php // echo $form->field($model, 'end_title') ?>

    <?php // echo $form->field($model, 'end_description') ?>

    <?php // echo $form->field($model, 'is_random') ?>

    <?php // echo $form->field($model, 'total_limit_num') ?>

    <?php // echo $form->field($model, 'each_limit_num') ?>

    <?php // echo $form->field($model, 'is_launched') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
