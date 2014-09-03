<?php
/** @var ParticipanteController $this */
/** @var Participante $model */

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Participante::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" .  Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
    //array('label' => Yii::t('AweCrud.app', 'View'), 'icon' => 'eye-open', 'itemOptions'=>array('class'=>'active')),
    //array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    //array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View'); ?> </legend>

<?php $this->widget('booster.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
                  'nombres',
             'apellidos',
             'tipo',
             'telefono',
             array(
                'name' => 'email',
                'type' => 'email'
            ),
             'direccion',
             array(
			'name' => 'sector_id',
			'value'=>($model->sector !== null) ? CHtml::link($model->sector, array('/sector/view', 'id' => $model->sector->id)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'subsector_id',
			'value'=>($model->subsector !== null) ? CHtml::link($model->subsector, array('/subsector/view', 'id' => $model->subsector->id)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'rama_actividad_id',
			'value'=>($model->ramaActividad !== null) ? CHtml::link($model->ramaActividad, array('/ramaActividad/view', 'id' => $model->ramaActividad->id)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'actividad_id',
			'value'=>($model->actividad !== null) ? CHtml::link($model->actividad, array('/actividad/view', 'id' => $model->actividad->id)).' ' : null,
			'type' => 'html',
		),
	),
)); ?>
</fieldset>