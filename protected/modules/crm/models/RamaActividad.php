<?php

Yii::import('application.modules.crm.models._base.BaseRamaActividad');

class RamaActividad extends BaseRamaActividad {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';

    public $sector_id;

    public function relations() {
        return array_merge(parent::relations(), array(
            'participantes' => array(self::HAS_MANY, 'Participante', 'rama_actividad_id'),
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

    public function attributeLabels() {

        return array_merge(parent::attributeLabels(), array(
            'sector_id' => Yii::t('app', 'Sector'),
        ));
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('sector_id', 'required')
        ));
    }

    /**
     * @return RamaActividad
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'RamaActividad|RamaActividads', $n);
    }

}
