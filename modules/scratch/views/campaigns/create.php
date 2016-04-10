<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblCampaigns */

$this->title = '新建刮刮卡';
$this->params['breadcrumbs'][] = ['label' => '刮刮卡列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-campaigns-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
