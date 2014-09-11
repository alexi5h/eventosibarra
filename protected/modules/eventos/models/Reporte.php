<?php

/**
 * Description of Reporte
 *
 */
class Reporte extends CFormModel {

    //put your code here
    public $evento_id;
    public $sector_id;
    public $subsector_id;
    public $rama_actividad_id;
    public $actividad_id;

    public function attributeLabels() {
        return array(
            'evento_id' => Yii::t('app', 'Evento'),
            'sector_id' => Yii::t('app', 'Sector'),
            'subsector_id' => Yii::t('app', 'Subsector'),
            'rama_actividad_id' => Yii::t('app', 'Rama de actividad'),
            'actividad_id' => Yii::t('app', 'Actividad'),
        );
    }

    //    public function relations() {
    //        return array(
    //            'actividad' => array(self::BELONGS_TO, 'Actividad', 'actividad_id'),
    //            'ramaActividad' => array(self::BELONGS_TO, 'RamaActividad', 'rama_actividad_id'),
    //            'sector' => array(self::BELONGS_TO, 'Sector', 'sector_id'),
    //            'subsector' => array(self::BELONGS_TO, 'Subsector', 'subsector_id'),
    //            'evento' => array(self::BELONGS_TO, 'Evento', 'evento_id'),
    //        );
    //    }

    public function search($evento_id = null, $sector_id = null, $subsector_id = null, $rama_actividad_id = null, $actividad_id = null) {
//         select  
        //t.id as id, concat(t.nombres,' ', t.apellidos) as nombre_completo,
        //t.cedula as cedula,t.celular as celular,
        //t.telefono as telefono,t.email as email, 
        //t.direccion as direccion , s.nombre  as sector,sb.nombre as subsector, ra.nombre as rama_actividad, a.nombre as actividad
// from participante t
        //inner join (participante_has_evento pe inner join evento e on e.id=pe.evento_id and e.estado='ACTIVO') on pe.participante_id=t.id
        //inner join sector s on s.id=t.sector_id 
        //inner join subsector sb on sb.id=t.subsector_id
        //left join rama_actividad ra on ra.id=t.rama_actividad_id
        //left join actividad a on a.id=t.actividad_id
        //where t.estado='ACTIVO';
        $command = Yii::app()->db->createCommand()
                ->select("
                    t.id as id, concat(t.nombres,' ', t.apellidos) as nombre_completo,
                    t.cedula as cedula,t.celular as celular,
                    t.telefono as telefono,t.email as email, 
                    t.direccion as direccion , s.nombre  as sector,
                    sb.nombre as subsector, ra.nombre as rama_actividad, 
                    a.nombre as actividad
                        ")
                ->from('participante t')
                ->join('(participante_has_evento pe inner join evento e on e.id=pe.evento_id and e.estado=:estado_evento)', 'pe.participante_id=t.id', array(':estado_evento' => Evento::ESTADO_ACTIVO))
                ->join('sector s', 's.id=t.sector_id')
                ->join('subsector sb', 'sb.id=t.subsector_id')
                ->leftJoin('rama_actividad ra', 'ra.id=t.rama_actividad_id')
                ->leftJoin('actividad a', 'a.id=t.actividad_id')
                ->where('t.estado=:estado_participante', array(':estado_participante' => Participante::ESTADO_ACTIVO))

        ;
        if ($evento_id) {
            $command->andWhere('e.id=:evento_id', array(':evento_id' => $evento_id));
        }
        if ($sector_id) {
            $command->andWhere('t.sector_id=:sector_id', array(':sector_id' => $sector_id));
        }
        if ($subsector_id) {
            $command->andWhere('t.subsector_id=:subsector_id', array(':subsector_id' => $subsector_id));
        }
        if ($rama_actividad_id) {
            $command->andWhere('t.rama_actividad_id=:rama_actividad_id', array(':rama_actividad_id' => $rama_actividad_id));
        }
        if ($actividad_id) {
            $command->andWhere('t.actividad_id=:actividad_id', array(':actividad_id' => $actividad_id));
        }
        return $command->queryAll();
    }

}
