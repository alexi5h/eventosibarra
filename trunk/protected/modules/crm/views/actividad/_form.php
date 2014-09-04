<?php
Util::tsRegisterAssetJs('_form.js');
/** @var ActividadController $this */
/** @var Actividad $model */
/** @var AweActiveForm $form */
?>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Actividad::label(1); ?></h3>
        </div>
        <div class="panel-body">

            <?php
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                'type' => 'horizontal',
                'id' => 'actividad-form',
                'enableAjaxValidation' => true,
                'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
                'enableClientValidation' => false,
            ));
            ?>

            <?php echo $form->textFieldGroup($model, 'nombre', array('maxlength' => 45)) ?>

            <?php
            if ($model->isNewRecord) {
                $data_sector = CHtml::listData(Sector::model()->activos()->findAll(), 'id', Sector::representingColumn());
                $data_subsector = null;
                $data_ramaActividad = null;
            } else {
                $data_sector = CHtml::listData(Sector::model()->activos()->findAll(), 'id', Sector::representingColumn());
                $data_subsector = CHtml::listData(Subsector::model()->activos()->findAll(array(
                                    "condition" => "sector_id =:sector_id",
                                    "order" => "nombre",
                                    "params" => array(':sector_id' => $model->ramaActividad->subsector->sector->id,)
                                )), 'id', Subsector::representingColumn());
                $data_ramaActividad = CHtml::listData(RamaActividad::model()->activos()->findAll(array(
                                    "condition" => "subsector_id =:subsector_id",
                                    "order" => "nombre",
                                    "params" => array(':subsector_id' => $model->ramaActividad->subsector->id,)
                                )), 'id', Subsector::representingColumn());
                $model->sector_id = $model->ramaActividad->subsector->sector->id;
                $model->subsector_id = $model->ramaActividad->subsector->id;
            }
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

            <?php
            echo $form->select2Group(
                    $model, 'subsector_id', array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-8',
                ),
                'widgetOptions' => array(
                    'data' => $data_subsector ? array(null => ' -- Seleccione -- ') + $data_subsector : array(null => ' -- Ninguno -- '),
                    'asDropDownList' => true,
                    'options' => array(
                        'tokenSeparators' => array(',', ' ')
                    )
                )
                    )
            );
            ?>

            <?php
            echo $form->select2Group(
                    $model, 'rama_actividad_id', array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-8',
                ),
                'widgetOptions' => array(
                    'data' => $data_ramaActividad ? array(null => ' -- Seleccione -- ') + $data_ramaActividad : array(null => ' -- Ninguno -- '),
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
</div>