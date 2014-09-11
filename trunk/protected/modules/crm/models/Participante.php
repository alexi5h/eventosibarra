<?php

Yii::import('application.modules.crm.models._base.BaseParticipante');

class Participante extends BaseParticipante {

    //estado: ACTIVO,INACTIVO
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    
    //tipo: NATURAL, EMPRESA, COMPAÑÍA LIMITADA, COOPERATIVA, ASOCIACIÓN
    const TIPO_NATURAL = 'Natural';
    const TIPO_EMPRESA= 'Empresa';
    const TIPO_COMPANIA_LTDA = 'Compañía Limitada';
    const TIPO_COOPERATIVA = 'Cooperativa';
    const TIPO_ASOCIACION = 'Asociación';

    public $evento_id;

    /**
     * @return Participante
     */
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

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'telefono' => Yii::t('app', 'Teléfono'),
            'email' => Yii::t('app', 'E-mail'),
            'rama_actividad_id' => Yii::t('app', 'Rama de Actividad'),
            'direccion' => Yii::t('app', 'Dirección'),
            'evento_id' => Yii::t('app', 'Evento'),
            'cedula' => Yii::t('app', 'Cédula'),
        ));
    }
    //Retorna el nombre del campo tipo
    public function tipoParticipante($ident) {
        if($ident=='N'){
            return self::TIPO_NATURAL;
        }elseif($ident=='E'){
            return self::TIPO_EMPRESA;
        }elseif($ident=='CIA'){
            return self::TIPO_COMPANIA_LTDA;
        }elseif($ident=='COO'){
            return self::TIPO_COOPERATIVA;
        }elseif($ident=='ASO'){
            return self::TIPO_ASOCIACION;
        }
        return null;
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Participante|Participantes', $n);
    }
    
//    public function rules() {
//    return array_merge(parent::rules(), array(
//        array('evento_id', 'required'),
//    ));}

}
