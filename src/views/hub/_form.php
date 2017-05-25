<?php
/** @var array $types */

use hipanel\helpers\Url;
use hipanel\widgets\DynamicFormWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin([
    'id' => 'dynamic-form',
    'validationUrl' => Url::toRoute(['validate-form', 'scenario' => $model->scenario]),
]); ?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 999, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $model,
    'formId' => 'dynamic-form',
    'formFields' => [
        'inn',
        'name',
        'type_id',
        'mac',
        'note',
        'model',
        'order_no',
    ],
]) ?>

<div class="container-items">
    <?php foreach ($models as $i => $model) : ?>
        <div class="item">
            <?php if (!$model->isNewRecord) : ?>
                <?= Html::activeHiddenInput($model, "[$i]id") ?>
            <?php endif; ?>
            <div class="box box-solid">
                <?php if ($model->isNewRecord) : ?>
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-success btn-sm add-item">
                                <i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm remove-item">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, "[$i]name") ?>
                            <?= $form->field($model, "[$i]type_id")->dropDownList($types, ['prompt' => '--']) ?>
                            <?= $form->field($model, "[$i]inn") ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, "[$i]mac") ?>
                            <?= $form->field($model, "[$i]ip") ?>
                            <?= $form->field($model, "[$i]model") ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, "[$i]order_no") ?>
                            <?= $form->field($model, "[$i]note")->textarea() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php DynamicFormWidget::end() ?>

<?= Html::submitButton(Yii::t('hipanel', 'Save'), ['class' => 'btn btn-success']) ?>
&nbsp;
<?= Html::button(Yii::t('hipanel', 'Cancel'), ['class' => 'btn btn-default', 'onclick' => 'history.go(-1)']) ?>

<?php $form->end() ?>
