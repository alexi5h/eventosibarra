<?php
/** @var EventoController $this */
/** @var Evento $model */
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
    <div class="panel-heading"><?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Evento::label(2) ?> </div>
    <div class="panel-body">
        <div style='overflow:auto'> 

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'id' => 'evento-grid',
                'type' => 'striped  hover advance',
                'template' => "{items} {summary} {pager}",
                'dataProvider' => $model->activos()->search(),
                'columns' => array(
                    'nombre',
                    array(
                        'name' => 'fecha_inicio',
                        'value' => 'Util::FormatDate($data->fecha_inicio, "d/m/Y")'
                    ),
                    array(
                        'name' => 'fecha_fin',
                        'value' => 'Util::FormatDate($data->fecha_fin, "d/m/Y")'
                    ),
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{view} {update} {delete}',
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