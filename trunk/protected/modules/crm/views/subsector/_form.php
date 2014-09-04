<?php
/** @var SubsectorController $this */
/** @var Subsector $model */
/** @var AweActiveForm $form */
?>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Subsector::label(1); ?></h3>
        </div>
        <div class="panel-body">
            <?php
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                'type' => 'horizontal',
                'id' => 'subsector-form',
                'enableAjaxValidation' => true,
                'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
                'enableClientValidation' => false,
            ));
            ?>
            <?php echo $form->textFieldGroup($model, 'nombre', array('maxlength' => 45)) ?>

            <?php // echo $form->dropDownListGroup($model, 'estado', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',), 'widgetOptions' => array('data' => array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',), 'htmlOptions' => array(),))) ?>
            <?php
            $data_sector = CHtml::listData(Sector::model()->activos()->findAll(), 'id', Sector::representingColumn());
            ?>

            <?php
            echo $form->select2Group(
                    $model, 'sector_id', array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-8',
                ),
                'widgetOptions' => array(
                    'data' => $data_sector ? array(null => ' -- Seleccione -- ') + $data_sector : array(null => ' -- Ninguno -- '),
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
                    $this->widget('ext.booster.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                        'htmlOptions' => array(
                            'class' => 'btn-default',
                            )
                    ));
                    ?>
                    <?php
                    $this->widget('booster.widgets.TbButton', array(
                        'label' => Yii::t('AweCrud.app', 'Cancel'),
                        'htmlOptions' => array(
                            'class' => 'btn-danger',
                            'onclick' => 'javascript:history.go(-1)')
                    ));
                    ?>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>