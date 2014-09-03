<?php

Yii::import('application.modules.crm.models._base.BaseRamaActividad');

class RamaActividad extends BaseRamaActividad
{
    /**
     * @return RamaActividad
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'RamaActividad|RamaActividads', $n);
    }

}