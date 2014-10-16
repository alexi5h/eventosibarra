<?php

Yii::import('application.modules.eventos.models._base.BaseEvento');

class Evento extends BaseEvento
{

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
Yii
    /**
     * @return Evento
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Evento|Eventos', $n);
    }

    public function relations()
    {
        return array();
    }

    public function scopes()
    {
        return array(
            'activos' => array(
                'condition' => 't.estado = :estado',
                'params' => array(
                    ':estado' => self::ESTADO_ACTIVO,
                ),
            ),
        );
    }

    public function getEventos()
    {
        //select * from evento t 
        //  where t.fecha_inicio >= now() or t.fecha_fin>=now() and t.estado='ACTIVO'
        //order by t.fecha_inicio, t.fecha_fin
        $command = Yii::app()->db->createCommand()
            ->select('*')
            ->from('evento t')
            ->where('t.fecha_inicio >= :fecha_inicio or t.fecha_fin>=:fecha_fin and t.estado=:estado', array(
                ':fecha_inicio' => Util::FormatDate(Util::FechaActual(), 'Y-m-d') . ' 00:00:00',
                ':fecha_fin' => Util::FormatDate(Util::FechaActual(), 'Y-m-d') . ' 23:59:59',
                ':estado' => self::ESTADO_ACTIVO))
            ->order('t.fecha_inicio, t.fecha_fin');
        return $command->queryAll();
    }

}
