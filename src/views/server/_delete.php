<?php
use hipanel\widgets\ModalButton;
use yii\helpers\Html;

echo ModalButton::widget([
    'model'    => $model,
    'scenario' => 'delete',
    'button'   => ['label' => '<i class="fa fa-trash-o"></i>' . Yii::t('hipanel/server', 'Delete')],
    'body'     => Yii::t('hipanel/server', 'Are you sure you want to delete server {name}? You will loose everything!', ['name' => $model->name]),
    'modal'    => [
        'header'        => Html::tag('h4', Yii::t('hipanel/server', 'Confirm server deleting')),
        'headerOptions' => ['class' => 'label-danger'],
        'footer'        => [
            'label'             => Yii::t('hipanel/server', 'Delete server'),
            'data-loading-text' => Yii::t('hipanel/server', 'Deleting server...'),
            'class'             => 'btn btn-danger',
        ]
    ]
]);
