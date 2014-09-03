<?php
/** @var ParticipanteController $this */
/** @var Participante $data */
?>
<div class="view">
                    
        <?php if (!empty($data->nombres)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->nombres); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->apellidos)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('apellidos')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->apellidos); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tipo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tipo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->telefono)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->telefono); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->email)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::mailto($data->email); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->direccion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->direccion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->sector->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('sector_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->sector->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->subsector->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('subsector_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->subsector->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ramaActividad->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('rama_actividad_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ramaActividad->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->actividad->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('actividad_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->actividad->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>