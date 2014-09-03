<?php

Yii::import('application.modules.crm.models._base.BaseSubsector');

class Subsector extends BaseSubsector
{
    /**
     * @return Subsector
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Subsector|Subsectors', $n);
    }

}