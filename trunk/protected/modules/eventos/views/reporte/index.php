<?php Util::tsRegisterAssetJs('index.js') ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Evento::label(2) ?> </div>
    <div class="panel-body">
        <?php
        $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
            'type' => 'inline',
            'id' => 'reporte-form',
            'enableAjaxValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
            'enableClientValidation' => false,
        ));
        ?>
        <?php
        $data_evento = CHtml::listData(Evento::model()->getEventos(), 'id', 'nombre');

        $data_sector = CHtml::listData(Sector::model()->activos()->findAll(), 'id','nombre');
        $data_subsector = CHtml::listData(Subsector::model()->activos()->findAll(), 'id', 'nombre');
        $data_rama_actividad = CHtml::listData(RamaActividad::model()->activos()->findAll(), 'id','nombre');
        $data_actividad = CHtml::listData(Actividad::model()->activos()->findAll(), 'id','nombre');
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
                'data' => $data_rama_actividad ? array(null => ' -- Rama Atividad -- ') + $data_rama_actividad : array(null => ' -- Ninguno -- '),
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
                'class'=>'btn-sm btn-danger',
                'onclick' => 'js:update()')
        ));
        ?>
        <?php $this->endWidget(); ?>

        <div style='overflow:auto;width:auto' > 
            <?php
            $this->widget('ext.booster.widgets.TbGridView', array(
                'id' => 'reporte-grid',
                'type' => 'striped bordered hover advance',
                'dataProvider' => new CArrayDataProvider($data),
                'columns' => array(
//        array(
//            'value' => '$data["id"]',
//            'type' => 'raw',
////            'header' => 'Contacto'
//        ),
                    array(
                        'value' => '$data["nombre_completo"]',
                        'type' => 'raw',
                        'header' => 'Nombre'
                    ),
                    array(
                        'value' => '$data["cedula"]',
                        'type' => 'raw',
                        'header' => 'Cédula'
                    ),
                    array(
                        'value' => '$data["celular"]',
                        'type' => 'raw',
                        'header' => 'Celular'
                    ),
                    array(
                        'value' => '$data["telefono"]',
                        'type' => 'raw',
                        'header' => 'Telefono'
                    ),
                    array(
                        'value' => '$data["email"]',
                        'type' => 'raw',
                        'header' => 'Email'
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
                        'value' => '$data["rama_actividad"]',
                        'type' => 'raw',
                        'header' => 'Rama de actividad',
                    ),
                    array(
                        'value' => '$data["actividad"]',
                        'type' => 'raw',
                        'header' => 'Actividad'
                    ),
                    array(
                        'value' => '$data["direccion"]',
                        'type' => 'raw',
                        'header' => 'Dirección',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
