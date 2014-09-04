<?php

Yii::import('application.modules.crm.models._base.BaseActividad');

class Actividad extends BaseActividad {

    public $sector_id;
    public $subsector_id;
    
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';

    public function rules() {
        return array_merge(parent::rules(), array(
            array('sector_id', 'required'),
            array('subsector_id', 'required')
        ));
    }
    
    public function relations() {
        return array_merge(parent::relations(), array(
            'participantes' => array(self::HAS_MANY, 'Participante', 'actividad_id'),
        ));
    }
    
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'sector_id' => Yii::t('app', 'Sector'),
            'subsector_id' => Yii::t('app', 'Subsector'),
        ));
    }
    
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

    /**
     * @return Actividad
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Actividad|Actividads', $n);
    }

}
