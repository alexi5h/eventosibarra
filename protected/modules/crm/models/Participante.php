<?php

Yii::import('application.modules.crm.models._base.BaseParticipante');

class Participante extends BaseParticipante
{
    
    /**
     * @return Participante
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Participante|Participantes', $n);
    }

}