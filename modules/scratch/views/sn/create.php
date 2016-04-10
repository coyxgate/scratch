<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblSn */

$this->title = 'Create Tbl Sn';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
