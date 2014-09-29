<?php Util::tsRegisterAssetJs('index.js') ?>
<div class="panel panel-default">
    <div class="panel-heading">Gestionar Reportes</div>
    <div class="panel-body">
        <?php
        $this->widget('ext.booster.widgets.TbButton', array(
            'label' => Yii::t('AweCrud.app', 'Exportar'),
            'htmlOptions' => array(
                'class' => 'btn-sm btn-danger',
                'onclick' => 'ExporCont()',
            //'style'=>'margin-left:12px'
            )
        ));
        ?>
        <hr>
        <?php
        $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
            'type' => 'inline',
            'id' => 'reporte-form',
            'enableAjaxValidation' => true,
            'action' => Yii::app()->createUrl('/eventos/reporte/exportExcel'),
            'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
            'enableClientValidation' => false,
        ));
        ?>
        <?php
        $data_evento = CHtml::listData(Evento::model()->getEventos(), 'id', 'nombre');

        $data_sector = CHtml::listData(Sector::model()->activos()->findAll(), 'id', 'nombre');
        $data_subsector = CHtml::listData(Subsector::model()->activos()->findAll(), 'id', 'nombre');
        $data_rama_actividad = CHtml::listData(RamaActividad::model()->activos()->findAll(), 'id', 'nombre');
        $data_actividad = CHtml::listData(Actividad::model()->activos()->findAll(), 'id', 'nombre');
        ?>
        <?php
        echo $form->select2Group(
                $model, 'evento_id', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-8',
            ),
            'widgetOptions' => array(
                'data' => $data_evento ? array(null => ' -- Evento -- ') + $data_evento : array(null => ' -- Ninguno -- '),
                'asDropDownList' => true,
                'options' => array(
                    'tokenSeparators' => array(',', ' ')
                ),
                'htmlOptions' => array(
                    'data-toogle' => 'tooltip'
                )
            )
                )
        );
        ?>
        <?php
        echo $form->select2Group(
                $model, 'sector_id', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-8',
            ),
            'widgetOptions' => array(
                'data' => $data_sector ? array(null => ' -- Sector -- ') + $data_sector : array(null => ' -- Ninguno -- '),
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
                'data' => $data_subsector ? array(null => ' -- Subsector -- ') + $data_subsector : array(null => ' -- Ninguno -- '),
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
                'data' => $data_rama_actividad ? array(null => ' -- Rama Actividad -- ') + $data_rama_actividad : array(null => ' -- Ninguno -- '),
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
                $model, 'actividad_id', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-8',
            ),
            'widgetOptions' => array(
                'data' => $data_actividad ? array(null => ' -- Actividad -- ') + $data_actividad : array(null => ' -- Ninguno -- '),
                'asDropDownList' => true,
                'options' => array(
                    'tokenSeparators' => array(',', ' ')
                )
            )
                )
        );
        ?>
        <?php
        $this->widget('ext.booster.widgets.TbButton', array(
            'label' => Yii::t('AweCrud.app', 'Generar'),
            'htmlOptions' => array(
                'class' => 'btn-sm btn-danger',
                'onclick' => 'js:update()',
            //'style'=>'margin-left:12px'
            )
        ));
        ?>
        <?php $this->endWidget(); ?>
        <div style='overflow:auto;width:auto' > 
            <?php
            $this->widget('ext.booster.widgets.TbGridView', array(
                'id' => 'reporte-grid',
                'type' => 'striped  hover advance',
                'template' => "{items} {summary} {pager}",
                'dataProvider' => new CArrayDataProvider($data),
                'columns' => array(
//        array(
//            'value' => '$data["id"]',
//            'type' => 'raw',
////            'header' => 'Contacto'
//        ),
                    array(
//                        'value' => '$data["nombre_completo"]',
                        'value' => 'CHtml::link($data["nombre_completo"], Yii::app()->createUrl("crm/participante/view",array("id"=>$data["id"])))',
                        'type' => 'raw',
                        'header' => 'Nombre'
                    ),
                    array(
                        'value' => '$data["cedula"]',
                        'type' => 'raw',
                        'header' => 'Cédula'
                    ),
                    array(
                        'value' => '$data["celular"] ? $data["celular"] : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">--vacío--</span>"',
                        'type' => 'raw',
                        'header' => 'Celular'
                    ),
//                    array(
//                        'value' => '$data["telefono"]',
//                        'type' => 'raw',
//                        'header' => 'Teléfono'
//                    ),
                    array(
                        'value' => '$data["email"] ? $data["email"] : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">--vacío--</span>"',
                        'type' => 'raw',
                        'header' => 'E-mail'
                    ),
                    array(
                        'value' => '$data["sector"]',
                        'type' => 'raw',
                        'header' => 'Sector'
                    ),
                    array(
                        'value' => '$data["subsector"]',
                        'type' => 'raw',
                        'header' => 'Subsector'
                    ),
                    array(
                        'value' => '$data["rama_actividad"] ? $data["rama_actividad"] : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">--vacío--</span>"',
                        'type' => 'raw',
                        'header' => 'Rama de actividad',
                    ),
                    array(
                        'value' => '$data["actividad"] ? $data["actividad"] : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">--vacío--</span>"',
                        'type' => 'raw',
                        'header' => 'Actividad'
                    ),
                    array(
                        'value' => '$data["direccion"] ? $data["direccion"] : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">--vacío--</span>"',
                        'type' => 'raw',
                        'header' => 'Dirección',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
<form id='reporte' method='POST' action="<?php echo Yii::app()->createUrl('/eventos/reporte/exportExcel')?>">
    <input id="rep_evento_id" type="hidden" name='Report[evento_id]' value=''/>
    <input id="rep_sector_id" type="hidden" name='Report[sector_id]' value=''/>
    <input id="rep_subsector_id" type="hidden" name='Report[subsector_id]' value=''/>
    <input id="rep_rama_actividad_id" type="hidden" name='Report[rama_actividad_id]' value=''/>
    <input id="rep_actividad_id" type="hidden" name='Report[actividad_id]' value=''/>
</form>