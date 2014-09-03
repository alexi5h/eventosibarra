<?php
/** @var RamaActividadController $this */
/** @var RamaActividad $model */
/** @var AweActiveForm $form */
?>
<div class="col-lg-8">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . RamaActividad::label(1); ?></h3>
        </div>
        <div class="panel-body">

            <?php
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                'type' => 'horizontal',
                'id' => 'rama-actividad-form',
                'enableAjaxValidation' => true,
                'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
                'enableClientValidation' => false,
            ));
            ?>

            <?php echo $form->textFieldGroup($model, 'nombre', array('maxlength' => 45)) ?>


            <?php // echo $form->dropDownListGroup($model, 'sector_detalle_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',), 'widgetOptions' => array('data' => array('' => ' -- Seleccione -- ') + CHtml::listData(Subsector::model()->findAll(), 'id', Subsector::representingColumn()), 'htmlOptions' => array(),))) ?>
            <?php
            echo $form->select2Group(
                    $model, 'sector_detalle_id', array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-12',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Subsector::model()->findAll(), 'id', Subsector::representingColumn()),
                    'asDropDownList' => true,
                    'options' => array(
                        'tokenSeparators' => array(',', ' ')
                    )
                )
                    )
            );
            ?>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <?php
                    $this->widget('booster.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                    ));
                    ?>
                    <?php
                    $this->widget('booster.widgets.TbButton', array(
                        'label' => Yii::t('AweCrud.app', 'Cancel'),
                        'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
                    ));
                    ?>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>