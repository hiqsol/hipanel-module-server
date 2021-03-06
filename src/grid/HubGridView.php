<?php

namespace hipanel\modules\server\grid;

use hipanel\grid\RefColumn;
use hipanel\grid\MainColumn;
use hipanel\modules\client\grid\ClientColumn;
use hipanel\modules\server\menus\HubActionsMenu;
use hipanel\widgets\gridLegend\ColorizeGrid;
use hiqdev\yii2\menus\grid\MenuColumn;
use Yii;
use yii\helpers\Html;

class HubGridView extends \hipanel\grid\BoxedGridView
{
    use ColorizeGrid;

    public function columns()
    {
        return array_merge(parent::columns(), [
            'inn' => [
                'enableSorting' => false,
                'filterOptions' => ['class' => 'narrow-filter'],
            ],
            'model' => [
                'enableSorting' => false,
                'filterOptions' => ['class' => 'narrow-filter'],
            ],
            'ip' => [
                'enableSorting' => false,
                'filterOptions' => ['class' => 'narrow-filter'],
            ],
            'mac' => [
                'enableSorting' => false,
                'filterOptions' => ['class' => 'narrow-filter'],
            ],
            'actions' => [
                'class' => MenuColumn::class,
                'menuClass' => HubActionsMenu::class,
            ],
            'traf_server_id' => [
                'format' => 'html',
                'enableSorting' => false,
                'value' => function ($model) {
                    return Html::a($model->traf_server_id_label, ['@server/view', 'id' => $model->traf_server_id]);
                }
            ],
            'vlan_server_id' => [
                'format' => 'html',
                'enableSorting' => false,
                'value' => function ($model) {
                    return Html::a($model->vlan_server_id_label, ['@server/view', 'id' => $model->vlan_server_id]);
                }
            ],
            'buyer' => [
                'label' => Yii::t('hipanel:server:hub', 'Buyer'),
                'class' => ClientColumn::class,
                'idAttribute' => 'buyer_id',
                'attribute' => 'buyer_id',
                'nameAttribute' => 'buyer',
                'enableSorting' => false,

            ],
            'switch' => [
                'class' => MainColumn::class,
                'attribute' => 'name',
                'filterAttribute' => 'name_ilike',
                'note' => 'note',
            ],
            'type' => [
                'class' => RefColumn::class,
                'filterOptions' => ['class' => 'narrow-filter'],
                'enableSorting' => false,
                'findOptions' => [
                    'select' => 'full',
                    'mapOptions' => ['from' => 'id', 'to' => 'label'],
                ],
                'attribute' => 'type_id',
                'i18nDictionary' => 'hipanel:server:hub',
                'gtype' => 'type,device,switch',
                'value' => function ($model) {
                    return Yii::t('hipanel:server:hub', $model->type_label);
                },
            ],
        ]);
    }
}
