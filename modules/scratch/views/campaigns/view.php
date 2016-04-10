<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblCampaigns */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '刮刮卡列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

function getStatus($model)
{
    if($model->is_launched)
        return '已开始';
    else
        return '未开始';
}

function isRandom($model)
{
    if($model->is_random)
        return '随机';
    else
        return '不随机';
}
?>
<div class="tbl-campaigns-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您是否确定要删除该刮刮卡活动?',
                'method' => 'post',
            ],
        ]) ?>
        </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'keyword',
            'name',
            'contact_us_info',
            'description',
            'start_at',
            'end_at',
            'hints',
            'duplicate_reply',
            'end_title',
            'end_description',
            'total_limit_num',
            'each_limit_num',
            [
                'label' => '是否随机',
                'value' => isRandom($model)
            ],
            [
                'label' => '状态',
                'value' => getStatus($model)
            ],
            'create_at',

        ],
    ]) ?>

</div>
