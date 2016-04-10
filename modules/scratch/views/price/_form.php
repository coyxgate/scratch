<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-price-form">

    <?php

        $form = ActiveForm::begin();
        $model->campaign_id = $campaign->id;

    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num')->textInput() ?>

    <?//= $form->field($model, 'pic')->fileInput() ?>


    <?php
        if($campaign->is_random) {
            echo $form->field($model, 'odds')->textInput()->hint('该活动选择随机概率,请输入随机概率数值0至100.例如40则代表中奖概率为40%');
        } else {
            echo $form->field($model, 'nth')->textInput()->hint('该活动选择非随机概率,输入的数值代表第N位刮奖者中该奖');
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
