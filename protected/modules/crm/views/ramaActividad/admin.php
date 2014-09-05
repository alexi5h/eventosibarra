<?php
/** @var RamaActividadController $this */
/** @var RamaActividad $model */
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
    <div class="panel-heading"> <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo RamaActividad::label(2) ?> </div>
    <div class="panel-body">
        <div style='overflow:auto'> 

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'id' => 'rama-actividad-grid',
                'type' => 'striped bordered hover advance',
                'dataProvider' => $model->activos()->search(),
                'columns' => array(
                    'nombre',
//                array(
//                    'name' => 'estado',
//                    'filter' => array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',),
//                ),
                    array(
                        'name' => 'sector_id',
                        'value' => 'isset($data->subsector->sector) ? $data->subsector->sector : null',
                        'filter' => CHtml::listData(Subsector::model()->findAll(), 'id', Subsector::representingColumn()),
                    ),
                    array(
                        'name' => 'subsector_id',
                        'value' => 'isset($data->subsector) ? $data->subsector : null',
                        'filter' => CHtml::listData(Subsector::model()->findAll(), 'id', Subsector::representingColumn()),
                    ),
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
</div>
