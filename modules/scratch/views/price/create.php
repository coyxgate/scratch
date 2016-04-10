<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblPrice */

$this->title = 'Create Tbl Price';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
