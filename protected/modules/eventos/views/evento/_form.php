<?php
Util::tsRegisterAssetJs('_form.js');
/** @var EventoController $this */
/** @var Evento $model */
/** @var AweActiveForm $form */
?>
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Evento::label(1); ?></h3>
        </div>
        <div class="panel-body">

            <?php
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                'type' => 'horizontal',
                'id' => 'evento-form',
                'enableAjaxValidation' => true,
                'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
                'enableClientValidation' => false,
            ));
            ?>

            <?php echo $form->textFieldGroup($model, 'nombre', array('maxlength' => 128)) ?>

            <?php
            echo $form->datePickerGroup(
                    $model, 'fecha_inicio', array(
                'widgetOptions' => array(
                    'options' => array(
                        'language' => 'es',
                        'format' => 'dd/mm/yyyy',
                    ),
                ),
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                    )
            );
            ?>
            <?php
            echo $form->datePickerGroup(
                    $model, 'fecha_fin', array(
                'widgetOptions' => array(
                    'options' => array(
                        'language' => 'es',
                        'format' => 'dd/mm/yyyy',
                    ),
                ),
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                    )
            );
            ?>

            <?php echo $form->textAreaGroup($model, 'descripcion') ?>
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