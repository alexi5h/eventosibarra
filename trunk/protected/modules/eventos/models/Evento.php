<?php

Yii::import('application.modules.eventos.models._base.BaseEvento');

class Evento extends BaseEvento {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';

    /**
     * @return Evento
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Evento|Eventos', $n);
    }

    public function relations() {
        return array(
            
        );
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

}
