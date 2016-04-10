<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TblPriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $campaign->name . ' 奖项列表';
$this->params['breadcrumbs'][] = ['label' => '返回刮刮卡活动列表',
    'url' => ['/scratch/campaigns/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-price-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加新奖项', ['create', 'campaign_id'=>$campaign->id], ['class' => 'btn btn-success']) ?>
    </p>
<?php
    Pjax::begin();
    if($campaign->is_random) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'campaign_id',
                'name',
                'num',
                // 'pic',
                'odds',
                // 'nth',
                // 'is_deleted',
                // 'create_at',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'headerOptions'=>array('width'=>'110px')
                ],
            ],
        ]);
    } else {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'campaign_id',
                'name',
                'num',
                // 'pic',
                // 'odds',
                'nth',
                // 'is_deleted',
                // 'create_at',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'header' => '操作',
                    'headerOptions'=>array('width'=>'110px')
                ],
            ],
        ]);
    }
?>

<?php Pjax::end(); ?></div>
