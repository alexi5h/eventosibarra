<?php

/**
 * This is the model base class for the table "participante".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Participante".
 *
 * Columns in table "participante" available as properties of the model,
 * followed by relations of table "participante" available as properties of the model.
 *
 * @property integer $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $tipo
 * @property string $telefono
 * @property string $email
 * @property string $direccion
 * @property string $cedula
 * @property string $celular
 * @property string $estado
 * @property string $fecha_creacion
 * @property integer $sector_id
 * @property integer $subsector_id
 * @property integer $rama_actividad_id
 * @property integer $actividad_id
 *
 * @property Actividad $actividad
 * @property RamaActividad $ramaActividad
 * @property Sector $sector
 * @property Subsector $subsector
 * @property Evento[] $eventos
 */
abstract class BaseParticipante extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'participante';
    }

    public static function representingColumn() {
        return 'nombres';
    }

    public function rules() {
        return array(
            array('nombres, apellidos, tipo, cedula, sector_id, subsector_id', 'required'),
            array('sector_id, subsector_id, rama_actividad_id, actividad_id', 'numerical', 'integerOnly'=>true),
            array('email', 'email'),
            array('nombres, apellidos', 'length', 'max'=>128),
            array('tipo', 'length', 'max'=>3),
            array('telefono, email, celular', 'length', 'max'=>45),
            array('cedula', 'length', 'max'=>20),
            array('estado', 'length', 'max'=>8),
            array('direccion', 'safe'),
            array('tipo', 'in', 'range' => array('N','E','CIA','COO','ASO')), // enum,
            array('estado', 'in', 'range' => array('ACTIVO','INACTIVO')), // enum,
            array('telefono, email, direccion, celular, estado, rama_actividad_id, actividad_id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, nombres, apellidos, tipo, telefono, email, direccion, cedula, celular, estado, fecha_creacion, sector_id, subsector_id, rama_actividad_id, actividad_id', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'actividad' => array(self::BELONGS_TO, 'Actividad', 'actividad_id'),
            'ramaActividad' => array(self::BELONGS_TO, 'RamaActividad', 'rama_actividad_id'),
            'sector' => array(self::BELONGS_TO, 'Sector', 'sector_id'),
            'subsector' => array(self::BELONGS_TO, 'Subsector', 'subsector_id'),
            'eventos' => array(self::MANY_MANY, 'Evento', 'participante_has_evento(participante_id, evento_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'nombres' => Yii::t('app', 'Nombres'),
                'apellidos' => Yii::t('app', 'Apellidos'),
                'tipo' => Yii::t('app', 'Tipo'),
                'telefono' => Yii::t('app', 'Telefono'),
                'email' => Yii::t('app', 'Email'),
                'direccion' => Yii::t('app', 'Direccion'),
                'cedula' => Yii::t('app', 'Cedula'),
                'celular' => Yii::t('app', 'Celular'),
                'estado' => Yii::t('app', 'Estado'),
                'fecha_creacion' => Yii::t('app', 'Fecha Creacion'),
                'sector_id' => Yii::t('app', 'Sector'),
                'subsector_id' => Yii::t('app', 'Subsector'),
                'rama_actividad_id' => Yii::t('app', 'Rama Actividad'),
                'actividad_id' => Yii::t('app', 'Actividad'),
                'actividad' => null,
                'ramaActividad' => null,
                'sector' => null,
                'subsector' => null,
                'eventos' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nombres', $this->nombres, true);
        $criteria->compare('apellidos', $this->apellidos, true);
        $criteria->compare('tipo', $this->tipo, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('direccion', $this->direccion, true);
        $criteria->compare('cedula', $this->cedula, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('sector_id', $this->sector_id);
        $criteria->compare('subsector_id', $this->subsector_id);
        $criteria->compare('rama_actividad_id', $this->rama_actividad_id);
        $criteria->compare('actividad_id', $this->actividad_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'fecha_creacion',
                'updateAttribute' => null,
                'timestampExpression' => new CDbExpression('NOW()'),
            )
        ), parent::behaviors());
    }
}