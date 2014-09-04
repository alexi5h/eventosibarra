<?php

Yii::import('application.modules.crm.models._base.BaseSector');

class Sector extends BaseSector {

    //estado: ACTIVO,INACTIVO
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';

    public function relations() {
        return array_merge(parent::relations(), array(
            'participantes' => array(self::HAS_MANY, 'Participante', 'sector_id'),
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
     * @return Sector
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Sector|Sectors', $n);
    }

}
