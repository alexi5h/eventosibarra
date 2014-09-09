<?php

Yii::import('application.modules.crm.models._base.BaseParticipante');

class Participante extends BaseParticipante
{
    //estado: ACTIVO,INACTIVO
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    public $evento_id;
    /**
     * @return Participante
     */
    
    public function scopes() {
        return array(
            'activos' => array(
                'condition' => 't.estado = :estado',
                'params' => array(
                    ':estado' => self::ESTADO_ACTIVO,
                ),
            ),
        );
    }
    
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'telefono' => Yii::t('app', 'Teléfono'),
            'email' => Yii::t('app', 'E-mail'),
            'rama_actividad_id'=> Yii::t('app', 'Rama de Actividad'),
            'direccion' => Yii::t('app', 'Dirección'),
        ));
    }
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Participante|Participantes', $n);
    }

}