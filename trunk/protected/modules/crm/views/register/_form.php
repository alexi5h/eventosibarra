<?php
/** @var ParticipanteController $this */
/** @var Participante $model */
/** @var AweActiveForm $form */
Util::tsRegisterAssetJs('_form.js');
?>
<p class="note"><?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span> <?php echo Yii::t('AweCrud.app', 'are required') ?>.</p>

<?php
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'participante-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<?php echo $form->textFieldGroup($model, 'nombres', array('maxlength' => 128)) ?>

<?php echo $form->textFieldGroup($model, 'apellidos', array('maxlength' => 128)) ?>

<?php
echo $form->dropDownListGroup($model, 'tipo', array('wrapperHtmlOptions' => array('class' => 'col-sm-6',), 'widgetOptions' => array(
        'data' => array('N' => 'Natural', 'E' => 'Empresa', 'CIA' => 'Compañía Limitada', 'COO' => 'Cooperativa', 'ASO' => 'Asociación',), 'htmlOptions' => array(),)))
?>

<?php echo $form->textFieldGroup($model, 'cedula', array('maxlength' => 20, 'class' => 'col-sm-6')) ?>
<?php echo $form->textFieldGroup($model, 'celular', array('maxlength' => 45)) ?>
<?php echo $form->textFieldGroup($model, 'telefono', array('maxlength' => 45)) ?>

<?php echo $form->textFieldGroup($model, 'email', array('maxlength' => 45)) ?>

<?php
if ($model->isNewRecord) {
    $data_sector = CHtml::listData(Sector::model()->activos()->findAll(), 'id', Sector::representingColumn());
    $data_subsector = null;
    $data_rama_actividad = null;
    $data_actividad = null;
} else {
    $data_sector = CHtml::listData(Sector::model()->activos()->findAll(), 'id', Sector::representingColumn());
    $data_subsector = CHtml::listData(Subsector::model()->activos()->findAll(array(
                        "condition" => "sector_id =:sector_id",
                        "order" => "nombre",
                        "params" => array(':sector_id' => $model->subsector->sector->id,)
                    )), 'id', Subsector::representingColumn());
    $model->sector_id = $model->subsector->sector->id;
    $data_actividad = null;
    $data_rama_actividad = CHtml::listData(RamaActividad::model()->activos()->findAll(array(
                        "condition" => "subsector_id =:subsector_id",
                        "order" => "nombre",
                        "params" => array(':subsector_id' => $model->sector_id,)
                    )), 'id', RamaActividad::representingColumn());
    if ($model->rama_actividad_id) {
        $data_actividad = CHtml::listData(Actividad::model()->activos()->findAll(array(
                            "condition" => "rama_actividad_id =:rama_actividad_id",
                            "order" => "nombre",
                            "params" => array(':rama_actividad_id' => $model->rama_actividad_id,)
                        )), 'id', Actividad::representingColumn());
    }
}
?>
<?php
echo $form->select2Group(
        $model, 'sector_id', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-8 ',
    ),
    'widgetOptions' => array(
        'data' => $data_sector ? array(null => ' -- Seleccione -- ') + $data_sector : array(null => ' -- Ninguno -- '),
        'asDropDownList' => true,
        'options' => array(
            'tokenSeparators' => array(',', ' '),
            'width' => '100%',
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
            'tokenSeparators' => array(',', ' '),
            'width' => '100%',
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
        'data' => $data_rama_actividad ? array(null => ' -- Seleccione -- ') + $data_rama_actividad : array(null => ' -- Ninguno -- '),
        'asDropDownList' => true,
        'options' => array(
            'tokenSeparators' => array(',', ' '),
            'width' => '100%',
        )
    )
        )
);
?>

<?php
echo $form->select2Group(
        $model, 'actividad_id', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-8',
    ),
    'widgetOptions' => array(
        'data' => $data_actividad ? array(null => ' -- Seleccione -- ') + $data_actividad : array(null => ' -- Ninguno -- '),
        'asDropDownList' => true,
        'options' => array(
            'tokenSeparators' => array(',', ' '),
            'width' => '100%',
        )
    )
        )
);
?>
<?php echo $form->textAreaGroup($model, 'direccion', array('rows' => 3, 'cols' => 50)) ?>

<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Registrarse') : Yii::t('AweCrud.app', 'Save'),
        ));
        ?>
        <?php $this->endWidget(); ?>
    </div>
</div>