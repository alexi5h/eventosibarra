<?php

Yii::import('application.modules.eventos.models._base.BaseEventoParticipante');

class EventoParticipante extends BaseEventoParticipante
{
    /**
     * @return EventoParticipante
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'EventoParticipante|EventoParticipantes', $n);
    }

}