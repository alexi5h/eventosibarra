<?php
/** @var EventoController $this */
/** @var Evento $model */
/** @var AweActiveForm $form */
?>
<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('AweCrud.app',$model->isNewRecord ? 'Create' : 'Update') . ' ' . Evento::label(1); ?></h3>
        </div>
        <div class="panel-body">

            <?php
 
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
            'type' => 'horizontal',
            'id' => 'evento-form',
            'enableAjaxValidation' => true,
            'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
            'enableClientValidation' => false,
            ));
            ?>
            
            
                
                                                    <?php echo $form->textFieldGroup($model, 'nombre', array('maxlength' => 128)) ?>
                                            
                                                    <?php echo $form->textFieldGroup($model, 'fecha_inicio') ?>
                                            
                                                    <?php echo $form->textFieldGroup($model, 'fecha_fin') ?>
                                            
                                                    <?php echo $form->dropDownListGroup($model, 'estado',array( 'wrapperHtmlOptions' => array('class' => 'col-sm-12',),'widgetOptions' => array('data' => array('ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO',),'htmlOptions' => array(),) )) ?>
                                            
                                                    <?php echo $form->textFieldGroup($model, 'descripcion', array('maxlength' => 128)) ?>
                                                        </div>                        <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                                        <?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
                    <?php $this->widget('booster.widgets.TbButton', array(
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>