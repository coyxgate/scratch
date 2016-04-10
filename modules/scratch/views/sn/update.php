<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSn */

$this->title = 'Update Tbl Sn: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-sn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
