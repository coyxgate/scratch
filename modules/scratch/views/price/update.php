<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrice */

$this->params['breadcrumbs'][] = ['label' => $model->getCampaign()->one()->name . ' 奖项列表',
                                        'url' => ['index', 'campaign_id'=>$model->getCampaign()->one()->id]];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="tbl-price-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
