<?php
/** @var ParticipanteController $this */
/** @var Participante $model */
/** @var AweActiveForm $form */
?>
<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Participante::label(1); ?></h3>
        </div>
        <div class="panel-body">

            <?php
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                'type' => 'horizontal',
                'id' => 'participante-form',
                'enableAjaxValidation' => true,
                'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
                'enableClientValidation' => false,
            ));
            ?>

            <?php echo $form->textFieldGroup($model, 'nombres', array('maxlength' => 128)) ?>

            <?php echo $form->textFieldGroup($model, 'apellidos', array('maxlength' => 128)) ?>

            <?php echo $form->dropDownListGroup($model, 'tipo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',), 'widgetOptions' => array('data' => array('N' => 'N', 'E' => 'E', 'CIA' => 'CIA', 'COO' => 'COO', 'ASO' => 'ASO',), 'htmlOptions' => array(),))) ?>

            <?php echo $form->textFieldGroup($model, 'telefono', array('maxlength' => 45)) ?>

            <?php echo $form->textFieldGroup($model, 'email', array('maxlength' => 45)) ?>

            <?php echo $form->textAreaGroup($model, 'direccion', array('rows' => 3, 'cols' => 50)) ?>

            <?php echo $form->dropDownListGroup($model, 'sector_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',), 'widgetOptions' => array('data' => array('' => ' -- Seleccione -- ') + CHtml::listData(Sector::model()->findAll(), 'id', Sector::representingColumn()), 'htmlOptions' => array(),))) ?>

            <?php echo $form->dropDownListGroup($model, 'subsector_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',), 'widgetOptions' => array('data' => array('' => ' -- Seleccione -- ') + CHtml::listData(Subsector::model()->findAll(), 'id', Subsector::representingColumn()), 'htmlOptions' => array(),))) ?>

            <?php echo $form->dropDownListGroup($model, 'rama_actividad_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',), 'widgetOptions' => array('data' => array('' => ' -- Seleccione -- ') + CHtml::listData(RamaActividad::model()->findAll(), 'id', RamaActividad::representingColumn()), 'htmlOptions' => array('empty' => Yii::t('AweApp', 'None')),))) ?>

            <?php echo $form->dropDownListGroup($model, 'actividad_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',), 'widgetOptions' => array('data' => array('' => ' -- Seleccione -- ') + CHtml::listData(Actividad::model()->findAll(), 'id', Actividad::representingColumn()), 'htmlOptions' => array('empty' => Yii::t('AweApp', 'None')),))) ?>
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
</div>