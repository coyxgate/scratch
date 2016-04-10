<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblCampaignsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '刮刮卡活动列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-campaigns-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建刮刮卡', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'keyword',
            'name',
            'contact_us_info',
            'description',
            [
                'attribute' => 'start_at',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'end_at',
                'format' => ['date', 'php:Y-m-d']
            ],
            array(
                'attribute'=>'is_launched',
                'content'=>function ($model, $key, $index, $column) {
                    if($model->is_launched)
                        return '已开始';
                    else
                        return '未开始';
                },
                'contentOptions'=>array('width'=>'60px'),
            ),
                // 'hints',
            // 'duplicate_reply',
            // 'end_title',
            // 'end_description',
            // 'is_random',
            // 'total_limit_num',
            // 'each_limit_num',
            // 'is_launched',
            // 'is_deleted',
            // 'create_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'price',
                'buttons' => [
                    // 自定义按钮
                    'list' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '奖项列表'),
                            'aria-label' => Yii::t('yii', '奖项列表'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-list"></span>', Url::toRoute(['price/index', 'campaign_id' => $model->id]), $options);
                    },
                    'add' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '添加奖项'),
                            'aria-label' => Yii::t('yii', '添加奖项'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', Url::toRoute(['price/create', 'campaign_id' => $model->id]), $options);
                    },
                ],
                'template' => '{list} {add}',
                'header' => '奖项操作',
                'headerOptions'=>array('width'=>'40px'),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'campaigns',
                'buttons' => [
                    // 自定义按钮
                    'launch' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '启动'),
                            'aria-label' => Yii::t('yii', '启动'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-play"></span>', $url, $options);
                    },
                    'add' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '添加奖项'),
                            'aria-label' => Yii::t('yii', '添加奖项'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', Url::toRoute(['price/create', 'campaign_id' => $model->id]), $options);
                    },
                ],
                'template' => '{launch} {view} {update} {delete}',
                'header' => '活动操作',
                'headerOptions'=>array('width'=>'90px'),
            ],

        ],
    ]); ?>
<?php Pjax::end(); ?></div>
