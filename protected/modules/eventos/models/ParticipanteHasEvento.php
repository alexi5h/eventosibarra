<?php

Yii::import('application.modules.eventos.models._base.BaseParticipanteHasEvento');

class ParticipanteHasEvento extends BaseParticipanteHasEvento
{
    /**
     * @return ParticipanteHasEvento
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'ParticipanteHasEvento|ParticipanteHasEventos', $n);
    }

}