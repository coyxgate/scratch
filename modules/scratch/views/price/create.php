<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblPrice */

$this->title = '添加新奖项';

if( isset($campaign) ){
    $this->params['breadcrumbs'][] = ['label' => $campaign->name . ' 奖项列表',
        'url' => ['index', 'campaign_id'=>$campaign->id]];
} else {
    $this->params['breadcrumbs'][] = ['label' => '奖项列表',
        'url' => ['index']];
}

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tbl-price-create">

    <?php
        if( isset($campaign) ){
            $model->campaign_id = $campaign->id;
            echo $this->render('_form', [
                'model' => $model,
                'campaign' => $campaign,
            ]);
        } else {
            echo $this->render('_form', [
                'model' => $model,
            ]);
        }
    ?>

</div>
