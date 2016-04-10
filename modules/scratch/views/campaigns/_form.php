<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use janisto\timepicker\TimePicker;
use pjkui\kindeditor\KindEditor;

/* @var $this yii\web\View */
/* @var $model app\models\TblCampaigns */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-campaigns-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'keyword')->textInput(['maxlength' => true])->hint('用户于微信公众平台输入该关键词会触发刮刮卡活动') ?>

    <?= $form->field($model, 'keyword')->hint('用户于微信公众平台输入该关键词会触发刮刮卡活动') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_us_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows'=>3]) ?>

    <?//= $form->field($model, 'start_at')->textInput() ?>


    <?= $form->field($model, 'start_at')->widget(TimePicker::className(), [
        //'language' => 'fi',
        'mode' => 'datetime',
        'clientOptions'=>[
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'HH:mm:ss',
            'showSecond' => true,
        ]
    ]) ?>


    <?//= $form->field($model, 'end_at')->textInput() ?>

    <?= $form->field($model, 'end_at')->widget(TimePicker::className(), [
        //'language' => 'zh-cn',
        'mode' => 'datetime',
        'clientOptions'=>[
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'HH:mm:ss',
            'showSecond' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'hints')->widget('pjkui\kindeditor\Kindeditor',
        ['clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true']]) ?>

    <?= $form->field($model, 'duplicate_reply')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_description')->textarea(['rows'=>5]) ?>

    <?= $form->field($model, 'is_random')->radioList(['1'=>'随机','0'=>'不随机'], ['unselect'=>'1']) ?>

    <?= $form->field($model, 'total_limit_num')->textInput() ?>

    <?= $form->field($model, 'each_limit_num')->textInput() ?>

    <?//= $form->field($model, 'create_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
