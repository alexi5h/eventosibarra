<?php

Yii::import('application.modules.crm.models._base.BaseActividad');

class Actividad extends BaseActividad
{
    /**
     * @return Actividad
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Actividad|Actividads', $n);
    }

}