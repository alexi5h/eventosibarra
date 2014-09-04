<?php
/** @var ParticipanteController $this */
/** @var Participante $model */
$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create'), 'icon' => 'plus', 'url' => array('create'),
    //'visible' => (Util::checkAccess(array('action_incidenciaPrioridad_create')))
    ),
);
?>
<div id="flashMsg"  class="flash-messages">

</div> 
<br/>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Participante::label(2) ?></div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'id' => 'participante-grid',
            'type' => 'striped bordered hover advance',
            'dataProvider' => $model->search(),
            'columns' => array(
                'nombres',
                'apellidos',
                array(
                    'name' => 'tipo',
                    'filter' => array('N' => 'N', 'E' => 'E', 'CIA' => 'CIA', 'COO' => 'COO', 'ASO' => 'ASO',),
                ),
                'telefono',
                'email',
                'direccion',
                /*
                  array(
                  'name' => 'sector_id',
                  'value' => 'isset($data->sector) ? $data->sector : null',
                  'filter' => CHtml::listData(Sector::model()->findAll(), 'id', Sector::representingColumn()),
                  ),
                  array(
                  'name' => 'subsector_id',
                  'value' => 'isset($data->subsector) ? $data->subsector : null',
                  'filter' => CHtml::listData(Subsector::model()->findAll(), 'id', Subsector::representingColumn()),
                  ),
                  array(
                  'name' => 'rama_actividad_id',
                  'value' => 'isset($data->ramaActividad) ? $data->ramaActividad : null',
                  'filter' => CHtml::listData(RamaActividad::model()->findAll(), 'id', RamaActividad::representingColumn()),
                  ),
                  array(
                  'name' => 'actividad_id',
                  'value' => 'isset($data->actividad) ? $data->actividad : null',
                  'filter' => CHtml::listData(Actividad::model()->findAll(), 'id', Actividad::representingColumn()),
                  ),
                 */
                array(
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{update} {delete}',
                    'afterDelete' => 'function(link,success,data){ 
                    if(success) {
                         $("#flashMsg").empty();
                         $("#flashMsg").css("display","");
                         $("#flashMsg").html(data).animate({opacity: 1.0}, 5500).fadeOut("slow");
                    }
                    }',
                    'buttons' => array(
                        'update' => array(
                            'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
                            'options' => array('title' => 'Actualizar'),
                            'imageUrl' => false,
                        //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_update"))'
                        ),
                        'delete' => array(
                            'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
                            'options' => array('title' => 'Eliminar'),
                            'imageUrl' => false,
                        //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_delete"))'
                        ),
                    ),
                    'htmlOptions' => array(
                        'width' => '80px'
                    )
                ),
            ),
        ));
        ?>
    </div>
</div>