<?php

Yii::import('application.modules.crm.models._base.BaseRamaActividad');

class RamaActividad extends BaseRamaActividad {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';

    public $sector_id;

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
        return array(
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
            'sector_detalle_id' => Yii::t('app', 'Subsector'),
            'sector_id' => Yii::t('app', 'Sector'),
            'actividads' => null,
            'participantes' => null,
            'sectorDetalle' => null,
        );
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
