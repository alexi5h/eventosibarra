<?php

Yii::import('application.modules.crm.models._base.BaseSector');

class Sector extends BaseSector
{
    /**
     * @return Sector
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Sector|Sectors', $n);
    }

}